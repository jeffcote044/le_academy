<?php

namespace App\Http\Livewire;

use Epayco\Epayco;
use Livewire\Component;
use Laravel\Cashier\Exceptions\IncompletePayment;

class Subscriptions extends Component
{
    protected $listeners =['render'];

    public $price, $style, $coupon;
    public $name = "Suscripción Marketing Médico en Instagram";
    public $errorCoupon, $successCoupon;
    public $incompletePayment, $subscription;

    public function mount($price, $style){
        $this->price = $price;
        $this->style = $style;
        
        $this->incompletePayment = auth()->user()->hasIncompletePayment($this->name);
        $this->subscription = auth()->user()->subscription($this->name);

        // $epayco = new Epayco(array(
        //     "apiKey" => env("EPAYCO_PUBLIC_KEY"),
        //     "privateKey" => env("EPAYCO_PRIVATE_KEY"),
        //     "lenguage" => "ES",
        //     "test" => true
        // ));

        // $plan = $epayco->plan->create(array(
        //     "id_plan" => "coursereactjs",
        //     "name" => "Course react js",
        //     "description" => "Course react and redux",
        //     "amount" => 300,
        //     "currency" => "usd",
        //     "interval" => "month",
        //     "interval_count" => 1,
        //     "trial_days" => 0
        // ));

        // $token = $epayco->token->create(array(
        //     "card[number]" => '4575623182290326',
        //     "card[exp_year]" => "2017",
        //     "card[exp_month]" => "07",
        //     "card[cvc]" => "123"
        // ));

        // $customer = $epayco->customer->create(array(
        //     "token_card" => $token->id,
        //     "name" => "Paola",
        //     "last_name" => "Centeno", //This parameter is optional
        //     "email" => "paola_cen044@hotmail.com",
        //     "default" => true,
        //     //Optional parameters: These parameters are important when validating the credit card transaction
        //     "city" => "Floridablanca",
        //     "address" => "Autopista Floridablanca 149 - 164",
        //     "phone" => "3173596771",
        //     "cell_phone"=> "3173596771",
        // ));

        // $sub = $epayco->subscriptions->create(array(
        //     "id_plan" => "coursereactjs",
        //     "customer" => "06d36e3fdf8647e703497f2",
        //     "token_card" => $token->id,
        //     "doc_type" => "CC",
        //     "doc_number" => "1098724121",
        //     "url_confirmation" => "http://academy.mediasocial.co/payment/pay/approvedSubscription",
        //     "url_response" => "http://academy.mediasocial.co/gracias",
        //      "method_confirmation" => "POST"
        //   ));

        // $pay = $epayco->subscriptions->charge(array(
        //     "id_plan" => "coursereactjs",
        //     "customer" => "06d36e3fdf8647e703497f2",
        //     "token_card" => $token->id,
        //     "doc_type" => "CC",
        //     "doc_number" => "1098724121",
        //     "address" => "Autopista Floridablanca 149 - 164",
        //     "phone"=> "3173596771",
        //     "cell_phone"=> "3173596771",
        //     "ip" => "190.000.000.000"  // This is the client's IP, it is required
        // ));

        // dd($pay);
    }

    public function render()
    {
        return view('livewire.subscriptions');
    }
    public function newSubscription(){

        try {
            if ($this->successCoupon) {
                auth()->user()->newSubscription($this->name, $this->price)    
                                ->withCoupon($this->coupon)            
                                ->create("",[
                                    'metadata' => ['name' => $this->name],
                                ]); //->trialDays(7)
            }else{
                auth()->user()->newSubscription($this->name, $this->price)              
                                ->create("",[],[
                                    'metadata' => ['name' => $this->name],
                                ]); //->trialDays(7)
            }
            $this->emitTo('invoices', 'render');
            $this->emitTo('subscriptions', 'render');
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('payment.billing.index')]
            );
        }
        
    }
    public function changePlans(){
        
        try {
            auth()->user()->subscription($this->name)->swap($this->price);
            $this->emitTo('invoices', 'render');
            $this->emitTo('subscriptions', 'render');
        }
        catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('payment.billing.index')]
            );
        }

        
    }
    public function cancelSubscription(){
        auth()->user()->subscription($this->name)->cancel();
        $this->emitTo('subscriptions', 'render');
    }
    public function resumeSubscription(){
        auth()->user()->subscription($this->name)->resume();
        $this->emitTo('subscriptions', 'render');
    }
    
    public function clearCoupon(){
        $this->successCoupon = "";
        $this->coupon = "";
    }

    public function retrieveCoupon(){

        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );

        try {
            $coupon = $stripe->coupons->retrieve($this->coupon, []);
            if ($coupon->valid == false) {
                $this->errorCoupon = "Cupón invalido: ".$this->coupon;
            }else{
                $this->errorCoupon ="";
                $this->successCoupon = "Cupón aplicado: ".$coupon->name;
                $this->emit('successCoupon');
            }
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            if ($e->getError()->code == "resource_missing") {
                $this->errorCoupon = "No existe el cupón: ".$this->coupon;
            }
        }catch (\Stripe\Exception\InvalidArgumentException $e) {
            $this->errorCoupon = __($e->getMessage());
        }
        
    }

}
