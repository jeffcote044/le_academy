<?php

namespace App\Services;

use App\Traits\ConsumesExternalServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PayUService
{
    use ConsumesExternalServices;

    protected $baseUri, $key, $secret, $baseCurrency, $merchantId, $accountId;

    public function __construct()
    {

        
        $this->baseUri = config('services.payu.base_uri');
        $this->key = config('services.payu.key');
        $this->secret = config('services.payu.secret');
        $this->baseCurrency = strtoupper(config('services.payu.base_currency'));
        $this->merchantId = config('services.payu.merchant_id');
        $this->accountId = config('services.payu.account_id');

    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $formParams['merchant']['apiKey'] = $this->key;
        $formParams['merchant']['apiLogin'] = $this->secret;
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function handlePayment(Request $request)
    {
        $request->validate([
            'payu_card' => 'required',
            'payu_cvc' => 'required',
            'payu_year' => 'required',
            'payu_month' => 'required',
            'payu_network' => 'required',
            'payu_name' => 'required',
        ]);

        $payment = $this->createPayment(
            $request->value,
            $request->user_name,
            $request->payu_name,
            $request->payu_email,
            $request->payu_card,
            $request->payu_cvc,
            $request->payu_year,
            $request->payu_month,
            $request->payu_network,
            $request->course
        );

        if ($payment->transactionResponse->state === "APPROVED") {
            $name = $request->payu_name;

            $amount = $request->value;
            $currency = strtoupper($request->currency);

            return redirect()
                ->route('home')
                ->withSuccess(['payment' => "Thanks, {$name}. We received your {$amount}{$currency} payment."]);
        }


        return redirect()
            ->route('payment.checkout', $request->course)
            ->withErrors('We were unable to process your payment. Check your details and try again, please');
    }

    public function handleApproval()
    {
        //
    }

    public function createPayment($value,  $name, $tcname, $email, $card, $cvc, $year, $month, $network, $paymentProduct, $installments = 1)
    {
        
        $makeRequest = $this->makeRequest(
            'POST',
            '/payments-api/4.0/service.cgi',
            [],
            [
                "language"=> $language = config('app.locale'),
                "command"=> "SUBMIT_TRANSACTION",
                "merchant"=> [
                   "apiKey"=> $this->key,
                   "apiLogin"=> $this->secret
                ],
                "transaction"=> [
                   "order"=> [
                      "accountId"=> $this->accountId,
                      "referenceCode"=> $reference = Str::random(12),
                      "description"=> $paymentProduct,
                      "language"=> $language,
                      "notifyUrl"=> "http=>//pruebaslap.xtrweb.com/lap/pruebconf.php",
                      "signature"=> $this->generateSignature($reference, $value),
                      "additionalValues"=> [
                         "TX_VALUE"=> [
                            "value"=> $value,
                            "currency"=> $this->baseCurrency
                      ]
                      ],
                      "buyer"=> [
                         "fullName"=> "APPROVED",
                         "emailAddress"=> $email,
                         'shippingAddress' => [
                            'street1' => '',
                            'city' => '',
                        ]
                      ]
                   ],
                   "payer"=> [
                      "fullName"=> "APPROVED",
                      "emailAddress"=> $email,
                   ],
                   "creditCard"=> [
                      "number"=> str_replace(' ', '', $card),
                      "securityCode"=> $cvc,
                      "expirationDate"=> "{$year}/{$month}",
                      "name"=> "APPROVED"
                   ],
                   "extraParameters"=> [
                      "INSTALLMENTS_NUMBER"=> $installments
                   ],
                   "type"=> "AUTHORIZATION_AND_CAPTURE",
                   "paymentMethod"=> strtoupper($network),
                   "paymentCountry"=> "MX",
                   
                   "deviceSessionId"=> session()->getId(),
                   "ipAddress"=> request()->ip(),
                   "userAgent"=> request()->header('User-Agent'),
                   
                ],
                "test"=> true
            ],
            [
                'Accept' => 'application/json',
            ],
            $isJsonRequest = true,
        );

        return $makeRequest;
    }

    public function generateSignature($referenceCode, $value)
    {
        return md5("{$this->key}~{$this->merchantId}~{$referenceCode}~{$value}~{$this->baseCurrency}");
    }
}
