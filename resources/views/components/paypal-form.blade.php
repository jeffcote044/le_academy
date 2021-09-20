<div class=" max-w-lg h-0">
    @php
        if($flashSale){$course_price = $flashSale;}
        else{$course_price = $course->finalPrice;}
    @endphp

    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="{{config('services.paypal.business')}}">
    <input type="hidden" name="lc" value="AL">
    <input type="hidden" name="item_name" value="{{$course->title}}">
    <input type="hidden" name="item_number" value="{{$course->id}}">
    <input type="hidden" name="custom" value="{{$dataSend}}">
    <input type="hidden" name="amount" value="{{$course->course_price}}">
    <input type="hidden" name="currency_code" value="{{config('services.paypal.currency_code')}}">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="rm" value="0">
    <input type="hidden" name="return" value="{{route('payment.paypal.response', $course)}}">
    <input type="hidden" name="cancel_return" value="{{env('APP_URL')}}">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="hidden" name="notify_url" value="{{route('payment.paypal.approved', $course)}}">
    <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1" class="hidden">
</div>
