<?php

namespace App\Http\Controllers;

use App\Mail\PurchasedCourse;
use App\Models\Course;
use App\Models\User;
use App\Services\PayUService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller {

    public function responsePayu(Request $request, Course $course){
        $response = Http::acceptJson()->post(config('services.payu.api_uri'), [
            "test" => config('services.payu.test'),
            "language" => "es",
            "command" => "ORDER_DETAIL_BY_REFERENCE_CODE",
            "merchant" => [
                "apiLogin" => config('services.payu.secret'),
                "apiKey" => config('services.payu.key')
            ],
            "details" => [
                "referenceCode" => $request->input('referenceCode')
            ]
        ])->throw()->json();

        if ($response['code'] == "SUCCESS") {

            if ($response['result']['payload']) {
                if ($response['result']['payload'][0]['status'] == "CAPTURED") {
                    $user_data =  explode('~',$response['result']['payload'][0]['transactions'][0]['extraParameters']['EXTRA1']);
                    $user_name = $user_data[0];
                    $user_email = $user_data[1];
                    $user_password = $user_data[2];
                    $user_auth = $user_data[3];

                    if ($user_auth == 0) {

                        $user_exist = User::where('email', $user_email)->first();

                        if($user_exist){

                            $user_exist->password = bcrypt($user_password);
                            $user_exist->save();
                            $user = $user_exist;

                        }else{
                            $user = User::create([
                                'name' => $user_name,
                                'email' => $user_email,
                                'password' => bcrypt($user_password)
                            ]);
                        }
                    }else {
                        $user = User::where('email', $user_email)->first();
                    }

                    $user_id = $user->id;
                    if (!$course->students->contains($user_id)) {
                        $course->students()->attach($user_id);
                        $this->activeCampaign($user_email);
                        $mail = new PurchasedCourse($course, $user);
            Mail::to($user_email)->bcc('compras@pediatraleonardoescobar.com', 'Compras Leonardo Escobar')->send($mail);
                    }
                }else if($response['result']['payload'][0]['status'] == "IN_PROGRESS"){
                    //
                }
            }
        }
        $pay_data = $request;

        return view('payment.payu.approved', compact('course', 'pay_data'));

    }

    public function approvedPayu(Request $request){

        Log::info($request);
        $extra1 = $request->extra1;

        $extra2 = $request->extra2;
        $course = Course::find($extra2);

        $user_data =  explode('~',$extra1);
        $user_name = $user_data[0];
        $user_email = $user_data[1];
        $user_password = $user_data[2];
        $user_auth = $user_data[3];

        if ($user_auth == 0) {

            $user_exist = User::where('email', $user_email)->first();

            if($user_exist){

                $user_exist->password = bcrypt($user_password);
                $user_exist->save();

                $user = $user_exist;

            }else{
                $user = User::create([
                    'name' => $user_name,
                    'email' => $user_email,
                    'password' => bcrypt($user_password)
                ]);
            }
        }else {
            $user = User::where('email', $user_email)->first();
        }


        if ($request->state_pol == 4 && !$course->students->contains($user->id)) {
            $course->students()->attach($user->id);
            $this->activeCampaign($user_email);
            $mail = new PurchasedCourse($course, $user);
            Mail::to($user_email)->bcc('compras@pediatraleonardoescobar.com', 'Compras Leonardo Escobar')->send($mail);
        }

    }

    public function responseEpayco(Request $request, Course $course){

        if($request->input('ref_payco')){
            $ref_payco =  $request->input('ref_payco');
            $url = 'https://secure.epayco.co/validation/v1/reference/'.$ref_payco;
            $response = Http::get($url);
            $json = $response->json();

            if (isset($json['status']) && $json['status'] == false) {
                return abort(403);
            }else
                if ($json['success'] == "true") {

                $epayco_data = $json['data'];
                return view('payment.epayco.approved', compact('course', 'epayco_data'));
            }else{
                return abort(403);
            }
        } else{
            return abort(403);
        }
    }

    public function approvedePayco(Request $request){

        //YQAo%.6DHI-y msawebmaster mediasocialacademy

        $p_cust_id_cliente = config('services.epayco.client_id');
        $p_key             = config('services.epayco.p_key');

        $x_extra1          = $request->x_extra1; //Client id
        $x_extra2          = $request->x_extra2; // Course id

        $x_ref_payco      = $request->x_ref_payco;
        $x_transaction_id = $request->x_transaction_id;
        $x_amount         = $request->x_amount;
        $x_currency_code  = $request->x_currency_code;
        $x_signature      = $request->x_signature;

        $signature = hash('sha256', $p_cust_id_cliente . '^' . $p_key . '^' . $x_ref_payco . '^' . $x_transaction_id . '^' . $x_amount . '^' . $x_currency_code);

        $x_response     = $request->x_response;
        $x_motivo       = $request->x_response_reason_text;
        $x_id_invoice   = $request->x_id_invoice;
        $x_autorizacion = $request->x_approval_code;

        $user = User::find($x_extra1);
        $course = Course::find($x_extra2);

        //Validamos la firma
        if ($x_signature == $signature) {
            /*Si la firma esta bien podemos verificar los estado de la transacción*/
            $x_cod_response = $request->x_cod_response;
            switch ((int) $x_cod_response) {
                case 1:
                   // "transacción aceptada"
                   $course->students()->attach($user->id);
                break;
            }
        }
    }

    public function paypal(Course $course){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'), // ClientID
                config('services.paypal.client_secret') // ClientSecret
            )
        );
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($course->finalPrice);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.paypal.approved', $course))
            ->setCancelUrl(route('payment.checkout', $course));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($apiContext);
            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function responsePaypal(Request $request, Course $course){

        return view('payment.paypal.approved', compact('course'));

    }

    public function approvedPaypal(Request $request, Course $course){

        Log::info($request);
        $user_data = $request->custom;
        $course_id = $request->item_number;

        $user_data =  explode('~',$user_data);
        $user_name = $user_data[0];
        $user_email = $user_data[1];
        $user_password = $user_data[2];
        $user_auth = $user_data[3];

        if ($user_auth == 0) {

            $user_exist = User::where('email', $user_email)->first();

            if($user_exist){

                $user_exist->password = bcrypt($user_password);
                $user_exist->save();

                $user = $user_exist;

            }else{
                $user = User::create([
                    'name' => $user_name,
                    'email' => $user_email,
                    'password' => bcrypt($user_password)
                ]);
            }
        }else {
            $user = User::where('email', $user_email)->first();
        }
        $course = Course::find($course_id);

        if ($request->payment_status == "Completed") {
            $course->students()->attach($user->id);
            $this->activeCampaign($user_email);
            $mail = new PurchasedCourse($course, $user);
            Mail::to($user_email)->bcc('compras@pediatraleonardoescobar.com', 'Compras Leonardo Escobar')->send($mail);
        }

    }

    public function activeCampaign($email) {
        $response = Http::withHeaders([
            'Api-Token' => env('AC_API_KEY')
        ]);

        $getUserByEmail = $response->GET('https://mediasocial.api-us1.com/api/3/contacts/',[
            "email" => $email,
            "orders[email]" => "ASC"
        ]);

        $getUserByEmail = $getUserByEmail['contacts'];

        if($getUserByEmail){

            $tags = $response->GET($getUserByEmail[0]['links']['contactTags']);
            $contactTags = collect($tags['contactTags']);

            if(!$contactTags->contains('tag', '4')){
                $addTagUser = $response->POST('https://mediasocial.api-us1.com/api/3/contactTags',[
                    "contactTag" => [
                        "contact" => $getUserByEmail[0]['id'],
                        "tag" => 4
                    ]
                ]);
                return true;
            }
        }
    }
}
