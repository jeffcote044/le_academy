<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionCreated;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebhookController extends CashierController
{
    
    public function handleInvoicePaymentSucceeded($payload)
    {
        
    }
}