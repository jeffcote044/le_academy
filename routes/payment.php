<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Livewire\CourseCheckout;
use App\Http\Livewire\CourseFlashSale;
use App\Http\Livewire\CourseOffer;

Route::get('{course}/checkout', CourseCheckout::class )->withoutMiddleware(['auth'])->name('checkout');
Route::get('{course}/checkout/flash-sale', CourseFlashSale::class)->withoutMiddleware(['auth'])->name('flashsale');
Route::get('{course}/checkout/oferta', CourseOffer::class)->withoutMiddleware(['auth'])->name('oferta');

Route::get('{course}/pay/paypal', [PaymentController::class, 'paypal'] )->middleware(['auth' , 'verified'])->name('paypal');
Route::get('{course}/pay/paypal/response', [PaymentController::class, 'responsePaypal'] )->middleware(['auth' , 'verified'])->name('paypal.response');
Route::post('/pay/paypal/approved', [PaymentController::class, 'approvedPaypal'] )->name('paypal.approved');

Route::post('{course}/pay/payu', [PaymentController::class, 'payu'] )->middleware(['auth' , 'verified'])->name('payu');
Route::get('{course}/pay/payu/response', [PaymentController::class, 'responsePayu'] )->middleware(['auth' , 'verified'])->name('payu.response');
Route::post('pay/payu/approved', [PaymentController::class, 'approvedPayu'] )->name('payu.approved');

Route::get('billing', [BillingController::class, 'index'])->middleware(['auth' , 'verified'])->name('billing.index');

Route::get('invoice/{invoice}', function (Request $request, $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId, [
        'vendor' => env('APP_NAME'),
        'product' => 'Media Social Academy',
    ]);
})->middleware(['auth' , 'verified'])->name('invoice.index');;

Route::post('stripe/webhook',[WebhookController::class, 'handleWebhook']);

