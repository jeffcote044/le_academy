<div  x-data="{$payMethod: 'payu', $route : '{{route('payment.payu', $course)}}' }">
    <div class="max-w-6xl px-6 mx-auto md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-8 mt-8 md:min-h-screen">
        <div class="md:col-span-5" >

            @if (auth()->user())

            @else
            <section class="mt-4">

                @if (session('status'))
                    <div class="bg-accent-400 text-gray-50 px-8 py-4 mb-8 rounded-xl font-bold text-xl">
                        {{ session('status') }}
                    </div>
                @endif

                <header class=" mb-2 md:mb-4 ">
                    <h3 class="text-2xl font-bold text-gray-800 mb-1"><span class="text-red-500">Paso 1:</span> Crea tus datos de acceso a la página</h3>
                    <p class="text-gray-600 font-medium lowercase text-xs italic">Los datos que escribas aquí serán los que vas a usar para ingresar a la página una vez realices la compra</p>
                </header>

                    <form>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                            Nombre Completo
                          </label>
                          <input wire:model="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Escribe tu nombre"
                          @error('name') autofocus="autofocus" @enderror>
                          @error('name')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Correo electrónico
                          </label>
                          <input wire:model="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="text" placeholder="Escribe tu correo"
                          @error('email') autofocus="autofocus" @enderror>
                          @error('email')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full  px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-email">
                            Verifica tu correo
                          </label>
                          <input wire:model="email_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-re-email" type="text" placeholder="Escribe tu correo otra vez"
                          @error('email_confirmation') autofocus="autofocus" @enderror>
                          @error('email_confirmation')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Crear Contraseña de ingreso
                            <p class="text-gray-600 font-medium lowercase text-xs italic">Esta será la contraseña con la que entrarás a la página</p>
                          </label>
                          <input wire:model="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************"
                          @error('password') autofocus="autofocus" @enderror>
                          @error('password')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-re-password">
                            Verificar contraseña
                          </label>
                          <input wire:model="password_confirmation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-re-password" type="password" placeholder="******************"
                          @error('password_confirmation') autofocus="autofocus" @enderror>
                          @error('password_confirmation')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                        </div>
                    </div>

                </form>
            </section>
            @endif

            <div class="mt-4 md:mt-6">
                <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-red-500"> @if (auth()->user())
                    Paso 1:
                    @else
                    Paso 2:
                @endif
                </span> Elige tu medio de pago</h3>



                <ul class=" mb-4 flex flex-col lg:flex-row w-full items-center justify-between sm:justify-start flex-wrap">

                    <li class=" lg:mr-2 w-full  md:w-auto">
                        <div
                            x-on:click="$payMethod = 'payu' ; $dispatch('route-change', { value: '{{route('payment.payu', $course)}}' }) "
                            :class="{ ' border-gray-100 bg-gray-900 text-blue-50 ': $payMethod === 'payu' }"
                            class="border rounded h-20 w-full cursor-pointer text-gray-900 bg-gray-50 flex justify-between px-4 items-center hover:text-gray-900 hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400  transition ease-in-out duration-300"
                            name="Paga con PayU">
                            <img class="h-10 object-cover hidden" src="{{asset('/img/checkout/payu_logo.png')}}" alt="">
                            <h2 class="flex-1 mr-4 font-semibold">Tarjeta de crédito / PSE</h2>
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </li>

                    <li class=" flex-1 lg:ml-2 mt-6 lg:mt-0 w-full md:w-auto">
                        <div
                            x-on:click="$payMethod = 'paypal' ; $dispatch('route-change', { value: '{{route('payment.paypal', $course)}}' }) "
                            :class="{ 'border-gray-100 bg-gray-900 text-blue-50 ': $payMethod === 'paypal' }"
                            class="border rounded h-20 cursor-pointer bg-gray-50 text-gray-900 flex justify-between px-4 items-center hover:text-gray-900 hover:bg-blue-50 hover:border-blue-200 focus:bg-gray-100 focus:border-blue-400 w-full transition ease-in-out duration-300"
                            name="Paga con PayPal">
                            <img class="h-6 object-cover hidden" src="{{asset('/img/checkout/paypal_logo.png')}}" alt="">
                            <h2 class="flex-1 mr-4 font-semibold" >PayPal</h2>
                            <i class="fab fa-paypal"></i>
                        </div>
                    </li>

                </ul>

                <div class=" mt-6 md:mt-8">

                    <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-red-500">
                    @if (auth()->user())
                        Paso 2:
                        @else
                        Paso 3:
                    @endif
                    </span> Pagar</h3>


                    @if ($course->id == 9999999999999 )

                        <section>
                            <div  class="flex flex-col lg:flex-row justify-center px-4 py-8 my-8 lg:max-w-5xl mx-auto mb-12 border-yellow-400 border-dashed border-2 relative">
                                <figure class=" hidden lg:block mr-4 w-auto flex-1">
                                    <img src="{{asset('/img/billboards/banner_dkp.jpg')}}" alt="Método DKP">
                                </figure>
                                <div class="w-full lg:w-7/12">
                                    <h3 class="text-xl font-bold">¡Ahorrar más! Adquiere el <b class="text-red-500">Método DKP</b> 4 fases hoy por solo <span class="text-red-500">99 US$</span></h3>
                                    <p class="text-sm text-gray-800  my-2">Adquiere hoy el course Premium del Método DKP y obtendrás</p>
                                    <ul class="text-sm">
                                        <li> <i class="fas fa-check-circle text-red-500 mr-2"></i>Acceso inmediato a las 4 fases</li>
                                        <li> <i class="fas fa-check-circle text-red-500 mr-2"></i>Acceso 30 días al chat</li>
                                        <li> <i class="fas fa-check-circle text-red-500 mr-2"></i>Curso cómo leer las etiquetas</li>
                                    </ul>

                                    <p class="mt-1 text-base font-semibold">Precio normal <span class=" line-through">299 US$</span></p>

                                    <div class="flex w-full mt-4">

                                        <style>
                                            /* Toggle  */
                                            input:checked ~ .dot {
                                            transform: translateX(100%);
                                            background-color: #48bb78;
                                            }


                                        </style>

                                        <label
                                        for="tooglePromo"
                                        class="flex items-center cursor-pointer"
                                        >
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input id="tooglePromo" wire:model="toogle_promo" wire:click="tooglePromo" type="checkbox" class="sr-only" />
                                            <!-- line -->
                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="dot absolute w-6 h-6 bg-red-500 rounded-full shadow -left-1 -top-1 transition"></div>
                                        </div>
                                        <!-- label -->
                                        <div class="ml-3 text-gray-700 font-semibold">
                                            Hoy solo pagas 99 US$
                                        </div>
                                        </label>

                                    </div>
                                </div>

                            </div>

                        </section>

                    @endif


                    <div class="flex items-center flex-wrap md:flex-no-wrap py-8 bg-gray-50 pl-4 rounded-xl mt-4">
                        <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                        <div class="md:ml-4">
                            @if ($course->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($course->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                <div class="ml-auto flex items-center">
                                    <p class="text-4xl md:text-2xl font-bold text-accent-400">{{round($course->finalPrice)}} US$</p>
                                    <span class=" text-base ml-2 line-through text-gray-500">{{$course->price->name}}</span>
                                </div>
                            @else
                                <p class="text-4xl md:text-2xl font-bold text-accent-400">{{$course->price->name}}</p>
                            @endif
                        </div>
                    </div>

                        @can('enrolled', $suscription)
                            <div class="flex flex-col justify-start w-full mt-2">
                                <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-blue-400"></i>Ya estás inscrito a este course</h3>
                            </div>
                            <a
                            class="disabled w-full mt-2 cursor-default bg-gray-300 rounded-lg font-bold text-white text-center inline-block px-8 py-4 text-lg ">No puedes comprar este course</a>
                        @else
                            <div class="my-6">
                                <label class="inline-flex items-center text-sm">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-secundary-400 " checked disabled><span class="ml-2 text-gray-700">Al completar la compra, aceptas estos <a href="#" class="text-secundary-400 font-bold underline"> Términos y condiciones</a></span>
                                </label>
                            </div>
                            @if ($can_continued)
                            <div>

                                <div x-show="$payMethod == 'payu'" >
                                    <form action="{{config('services.payu.base_uri')}}" method="post">
                                        @csrf

                                        <x-payu-form :course="$course" :dataSend="$data_send" :flashSale=null />

                                        <button type="submit"
                                        class=" bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Ya puedes continuar tu compra con PayU</button>

                                    </form>
                                </div>
                                <div x-show="$payMethod == 'paypal'" >

                                    <form action="{{config('services.paypal.base_uri')}}" method="post">
                                        @csrf
                                        <x-paypal-form :course="$course" :dataSend="$data_send" :flashSale=null />
                                        <button type="submit"
                                        class="bg-blue-700 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-blue-800  text-lg w-full">Ya puedes continuar tu compra con PayPal</button>
                                    </form>

                                </div>
                            </div>
                            @else
                                <button
                                wire:click="confirmData"
                                class=" bg-red-500 rounded-lg font-bold text-white cursor-pointer text-center inline-block px-8 py-4 text-base lg:text-lg w-full">{{$error_button}}</button>
                                @if($errors->all())
                                    <span class="text-red-500 text-sm mt-2 inline-block font-semibold ">{{$error_message}}</span>
                                @endif
                            @endif
                        @endcan

                    <div class="mt-8 flex items-center cursor-default mb-8">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Tu pago es 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>

                    <div class="my-12 cursor-default  text-center w-full">
                        <p class="text-secundary-400 text-2xl lg:text-3xl  font-bold text-center">Si tuviste problemas con tu compra o tu tarjeta escríbenos</p>
                        <div class="my-4">
                            <a href="https://wa.me/573153122025" target="_blank" class=" inline-flex items-center px-6 py-4 rounded-full text-white font-bold bg-green-500 text-xl lg:text-4xl">
                                <i class="fab fa-whatsapp mr-4"></i>
                                <p class="">+57 315 312 2025</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="md:col-span-4 my-6 md:my-0" id="sticky-card">
            <div class="bg-white md:shadow md:px-8 py-4 sticky top-2">
                <article class="flex flex-wrap md:flex-no-wrap items-start text-gray-600">
                    <img class="md:h-28 md:w-auto w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <div class="ml-4 mt-4 md:mt-0">
                        <span class=" font-medium text-sm">Estás comprando el curso:</span>
                        <h2 class="text-lg font-bold leading-none mb-1 text-accent-400">{{$course->title}}</h2>
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

</div>
