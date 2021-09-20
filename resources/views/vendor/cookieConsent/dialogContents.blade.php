<div class="js-cookie-consent cookie-consent bg-white w-full sm:w-64 rounded-lg shadow-md p-6">
    <div class="w-16 mx-auto relative -mt-10 mb-4">
        <img class="-mt-1" src="{{asset('img/svg/cookie.svg')}}" alt="cookie">
    </div>
    <span class="cookie-consent__message  w-full sm:w-58  block leading-normal text-grey-700 text-xs mb-3">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <div class="flex items-center justify-between">
        <a class="font-lf text-xs text-gray-400 mr-1 hover:text-gray-600 hover:underline" href="{{route('courses.index')}}">{{__('Privacy Policy')}}</a>
        <button class="js-cookie-consent-agree cookie-consent__agree bg-primary-400 transition text-xs hover:bg-primary-700 rounded inline-block shadow px-4 py-2 text-white font-bold cursor-pointer">
            {{ trans('cookieConsent::texts.agree') }}
        </button>
    </div>

</div>
