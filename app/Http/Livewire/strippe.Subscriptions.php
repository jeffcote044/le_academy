<?php

namespace App\Http\Livewire;

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
