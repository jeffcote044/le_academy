<x-app-layout>
    <div class="container md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-4 mt-8 md:min-h-screen">
        <div class="md:col-span-5">
            <div class="flex items-center flex-wrap md:flex-no-wrap">
                <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                <div class="md:ml-4">
                    @if ($course->discount)
                        <div class="ml-auto flex items-center">
                            <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$course->finalPrice}} US$</p>
                            <span class=" text-base ml-2 line-through text-gray-500">{{$course->price->name}}</span>
                        </div>
                    @else
                        <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$course->price->name}}</p>
                    @endif
                </div>
            </div>
            <div 
                x-data="{$payMethod: 'paypal', $route : '{{route('payment.paypal', $course)}}' }"    
                class="mt-4 md:mt-6">
                <h3 class="text-base font-bold mb-2 md:mb-8 text-gray-800">Múltiples medios de pago</h3>
                <ul class=" mb-4 flex w-full items-center justify-between sm:justify-start">
                    
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/visa_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/mastercard_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/americanexpress_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/pse_logo.png')}}" alt="">
                    </li>
                    <li class="w-3/12 md:w-auto max-w-200 mr-4">
                        <img class="md:h-6 md:w-auto w-full object-cover" src="{{asset('/img/checkout/stores/paypal_logo.png')}}" alt="">
                    </li>

                   {{--  <li class="max-w-200 mr-4 hidden">
                        <div 
                            x-on:click="$payMethod = 'paypal' ; $dispatch('route-change', { value: '{{route('payment.paypal', $course)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'paypal' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            title="Paga con PayPal">
                            <img class="h-6 object-cover" src="{{asset('/img/checkout/paypal_logo.png')}}" alt="">
                        </div>
                    </li> --}}
                   
                </ul>
                <div class=" mt-8 md:mt-12">
                    <div class="mb-6">
                        <label class="inline-flex items-center text-sm">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> Términos y condiciones</a></span>
                        </label>
                    </div>
                    {{-- <a  href="" 
                        x-on:route-change.window="
                        $route = $event.detail.value"
                        x-bind:href="$route"
                        class="bg-blue-500 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-blue-600 mr-6text-lg w-80">Comprar ahora</a> --}}

                        @can('enrolled', $course)
                            <a 
                            class="disabled w-full cursor-default bg-gray-300 rounded-lg font-bold text-white text-center inline-block px-8 py-4 text-lg md:w-80">Comprar ahora</a>
                            <div class="flex flex-col justify-start w-full mt-2">
                                <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-blue-400"></i>Ya estás inscrito a este curso</h3>
                            </div>
                        @else
                            <a x-on:click="handler.open(data)"
                            class=" w-full cursor-pointer bg-accent-400 rounded-lg border border-accent-400 font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-transparent hover:text-accent-400 mr-6text-lg md:w-80">Comprar ahora</a>
                        @endcan

                    <div class="mt-8 flex items-center cursor-default">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Pago 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:col-span-4 my-6 md:my-0">
            <div class="bg-white md:shadow md:px-8 py-4">
                <article class="flex flex-wrap md:flex-no-wrap items-start text-gray-600">
                    <img class="md:h-28 md:w-auto w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <div class="ml-4 mt-4 md:mt-0">
                        <h2 class="text-lg font-bold">{{$course->title}}</h2>
                        <p class="text-sm text-gray-400">Por: {{$course->teacher->name}} </p>
                    </div>
                </article>
                <hr class="my-8">
                <div class="flex items-center">
                    <img src="{{asset('/img/checkout/garantia.png')}}" alt="">
                    <p class="text-xs ml-4">Si tu experiencia con la compra no es lo que esperabas, te haremos un reembolso del 100% de tu pago. Por favor revisar nuestras <a href="#" class="text-accent-400 font-bold underline ">Políticas de Reembolso</a></p>
                </div>
                <p class="text-xs my-4">Los precios base que manejamos son en dólares americanos.</p>
                <p class="text-xs">(1) Acepto expresamente todos los Términos y Condiciones de Membresías. Del mismo, modo acepto las Políticas y Avisos de Protección y Tratamiento de Datos Personales de {{env('BUSINESS_NAME')}}</p>
            </div>
        </div>
    </div>
    
<x-slot name="js">
    <script type="text/javascript" src="https://checkout.epayco.co/checkout.js"></script>
    <script>
        let handler = ePayco.checkout.configure({
            key: '{{config('services.epayco.public_key')}}',
            test: true
        })
        let data={
        //Parametros compra (obligatorio)
        name: "{{$course->title}}",
        description: "{{$course->title}}",
        invoice: "{{Str::random(8)}}",
        currency: "usd",
        amount: "{{$course->finalPrice}}",
        tax_base: "0",
        tax: "0",
        country: "co",
        lang: "es",
        external: "false",
        //Atributos opcionales
        extra1: "{{auth()->user()->id}}", //Client id
        extra2: "{{$course->id}}", // Course id
        confirmation: "{{route('payment.approved')}}",
        response: "{{route('payment.response', $course)}}",
        //atributo deshabilitación metodo de pago
        methodsDisable: ["SP","CASH", "MPD", "DP"],
        }
        
    </script>
</x-slot>

</x-app-layout>