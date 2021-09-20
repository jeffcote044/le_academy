<div class=" max-w-lg">


    @php
        $buyerInfo = explode('~',$dataSend);
        if($flashSale){$course_price  = $flashSale;}
        else{$course_price  = $course->finalPrice;}
    @endphp

    <input name="merchantId"    type="hidden"  value="{{config('services.payu.merchant_id')}}">
    <input name="accountId"     type="hidden"  value="{{config('services.payu.account_id')}}">
    <input name="description"   type="hidden"  value="{{$course->title}}">
    <input name="referenceCode" type="hidden"  value="{{$reference = $course->id.'-'.Str::random(12)}}">
    <input name="extra1" type="hidden"  value="{{$dataSend}}">
    <input name="extra2" type="hidden"  value="{{$course->id}}">
    <input name="amount"        type="hidden"  value="{{$course_price}}">
    <input name="tax"           type="hidden"  value="0">
    <input name="taxReturnBase" type="hidden"  value="0">
    <input name="currency"      type="hidden"  value="{{config('services.payu.base_currency')}}">
    <input name="signature"     type="hidden"  value="{{md5(config('services.payu.key').'~'.config('services.payu.merchant_id').'~'.$reference.'~'.$course_price.'~'.config('services.payu.base_currency'))}}">
    <input name="test"          type="hidden"  value="{{config('services.payu.test')}}">
    <input name="buyerEmail"    type="hidden"  value="{{$buyerInfo[1]}}">
    <input name="buyerFullName"    type="hidden"  value="{{$buyerInfo[0]}}">
    <input name="responseUrl"    type="hidden"  value="{{route('payment.payu.response', $course)}}" >
    <input name="confirmationUrl"    type="hidden"  value="{{route('payment.payu.approved')}}">
</div>
