<x-app-layout>
    <div class="container md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-8 mt-8 md:min-h-screen">
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
                x-data="{$payMethod: 'payu', $route : '{{route('payment.payu', $course)}}' }"    
                class="mt-4 md:mt-6">
                <h3 class="text-base font-bold mb-2 md:mb-8 text-gray-800">Elige tu medio de pago</h3>
                <ul class=" mb-4 flex w-full items-center justify-between sm:justify-start">

                    <li class="max-w-200 mr-4 ">
                        <div 
                            x-on:click="$payMethod = 'payu' ; $dispatch('route-change', { value: '{{route('payment.payu', $course)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'payu' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            title="Paga con PayU">
                            <img class="h-10 object-cover" src="{{asset('/img/checkout/payu_logo.png')}}" alt="">
                        </div>
                    </li>

                    <li class="max-w-200 mr-4 ">
                        <div 
                            x-on:click="$payMethod = 'paypal' ; $dispatch('route-change', { value: '{{route('payment.paypal', $course)}}' }) " 
                            :class="{ 'border-blue-200 bg-blue-100': $payMethod === 'paypal' }"
                            class="border rounded h-20 w-40 cursor-pointer bg-gray-50 flex justify-center items-center hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 "
                            title="Paga con PayPal">
                            <img class="h-6 object-cover" src="{{asset('/img/checkout/paypal_logo.png')}}" alt="">
                        </div>
                    </li>
                   
                   
                </ul>
                <div class=" mt-6 md:mt-8">
                        @can('enrolled', $course)
                            <a 
                            class="disabled w-full cursor-default bg-gray-300 rounded-lg font-bold text-white text-center inline-block px-8 py-4 text-lg md:w-80">Comprar ahora</a>
                            <div class="flex flex-col justify-start w-full mt-2">
                                <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-blue-400"></i>Ya est??s inscrito a este curso</h3>
                            </div>
                        @else

                            <div x-show="$payMethod == 'payu'" >
                                <form action="{{config('services.payu.base_uri')}}" method="post">
                                    @csrf

                                    <x-payu-form :course="$course"/>
                                
                                    <div class="my-6">
                                        <label class="inline-flex items-center text-sm">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> T??rminos y condiciones</a></span>
                                        </label>
                                    </div>
                            
                                    <button type="submit"
                                    class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-400 mr-6text-lg w-full">Comprar ahora con PayU</button> 

                                </form>
                            </div>
                            <div x-show="$payMethod == 'paypal'" >
                                
                                <form action="{{config('services.paypal.base_uri')}}" method="post">
                                    @csrf

                                    <x-paypal-form :course="$course"/>

                                    <div class="my-6">
                                        <label class="inline-flex items-center text-sm">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> T??rminos y condiciones</a></span>
                                        </label>
                                    </div>
                                    

                                    <button type="submit"
                                    class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-400 mr-6text-lg w-full">Comprar ahora con PayPal</button> 

                                </form>

                                <a  href="" 
                                x-on:route-change.window="
                                $route = $event.detail.value"
                                x-bind:href="$route"
                                class="bg-accent-400  rounded-lg font-bold text-white text-center inline-block hidden px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-400 mr-6text-lg w-full">Comprar ahora</a> 
                        </div>
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
                    <p class="text-xs ml-4">Si tu experiencia con la compra no es lo que esperabas, te haremos un reembolso del 100% de tu pago. Por favor revisar nuestras <a href="#" class="text-accent-400 font-bold underline ">Pol??ticas de Reembolso</a></p>
                </div>
                <p class="text-xs my-4">Los precios base que manejamos son en d??lares americanos.</p>
                <p class="text-xs">(1) Acepto expresamente todos los T??rminos y Condiciones de Membres??as. Del mismo, modo acepto las Pol??ticas y Avisos de Protecci??n y Tratamiento de Datos Personales de {{env('BUSINESS_NAME')}}</p>
            </div>
        </div>
    </div>
    


</x-app-layout>