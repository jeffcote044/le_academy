<div  x-data="{$payMethod: 'payu', $route : '{{route('payment.payu', $course)}}' }">



    <div class="max-w-6xl px-6 mx-auto md:px-8 grid grid-cols-1 md:grid-cols-9 md:gap-8 mt-8 md:min-h-screen">
        <div class="md:col-span-5" >

            @if (auth()->user())

            @else
            <section class="mt-0">

                @if ($flash_sale)

                        <section>
                            <div  class="flex flex-col items-center lg:flex-row justify-center px-4 py-8 lg:max-w-5xl mx-auto mb-12 border-accent-400 border-dashed border-2 relative">
                                <figure class=" hidden lg:block mr-4 w-auto flex-1">
                                    <img src="{{asset('/img/billboards/banner_flash_sale.jpg')}}" alt="Método DKP">
                                </figure>
                                <div class="w-full lg:w-7/12">
                                    <p class="font-bold">¡Oferta exclusiva!</p>
                                    <h3 class="text-lg font-medium leading-tight mb-4">
                                        @if ($last_chance)
                                            Esta es tu última oportunidad <b>aprovecha antes que se acabe el tiempo.</b>
                                        @else
                                            Compra el curso de <b class="text-accent-400">{{$course->title}}</b> por solo <b class="bg-secundary-400 px-2 text-gray-50" >{{round($flash_sale)}} $US</b></span>
                                        @endif

                                    </h3>
                                    <p class="text-sm text-gray-800 my-2">🎁 Si compras el curso hoy obtendrás</p>
                                    <ul class="text-sm">
                                        <li> <i class="fas fa-check-circle text-accent-400 mr-2"></i>Acceso inmediato y de por vida</li>
                                        <li> <i class="fas fa-check-circle text-accent-400 mr-2"></i>Recursos descargables</li>
                                        <li> <i class="fas fa-check-circle text-accent-400 mr-2"></i>Certificado de finalización</li>
                                    </ul>
                                    <div class="mt-1">
                                        <h3 class="font-bold mt-2">Esta oferta termina en:</h3>
                                        <div id="promoAd">
                                            <div data-countdown="" id="countdown" class="font-bold text-2xl mt-1 grid grid-cols-4 gap-x-2 h-16"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </section>

                    @endif

                <header class=" mb-2 md:mb-4 ">
                    <h3 class="text-2xl font-bold text-gray-800 mb-1"><span class="text-accent-400">Paso 1:</span> Crea tus datos de acceso a la página</h3>
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
                <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-accent-400"> @if (auth()->user())
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

                    <h3 class="text-2xl font-bold mb-2 md:mb-8 text-gray-800"> <span class="text-accent-400">
                    @if (auth()->user())
                        Paso 2:
                        @else
                        Paso 3:
                    @endif
                    </span> Pagar</h3>

                    <div class="flex items-center flex-wrap md:flex-no-wrap py-8 bg-gray-50 pl-4 rounded-xl mt-4">
                        <h2 class="text-gray-700 text-3xl font-bold w-full md:w-auto">Total a pagar:</h2>
                        <div class="md:ml-4">
                            @if ($course->discount && \Carbon\Carbon::createFromTimeStamp(strtotime($course->discount->expires_at))->gt(\Carbon\Carbon::now()))
                                <div class="ml-auto flex items-center">

                                    <p class="text-4xl md:text-2xl font-bold text-accent-400">{{round($flash_sale)}} US$</p>
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

                                        <x-payu-form :course="$course" :dataSend="$data_send" :flashSale="$flash_sale"/>

                                        <button type="submit"
                                        class=" bg-green-600 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-green-700  text-lg w-full">Ya puedes continuar tu compra con PayU</button>

                                    </form>
                                </div>
                                <div x-show="$payMethod == 'paypal'" >

                                    <form action="{{config('services.paypal.base_uri')}}" method="post">
                                        @csrf
                                        <x-paypal-form :course="$course" :dataSend="$data_send" :flashSale="$flash_sale"/>
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

                    <div class="mt-8 flex  items-center cursor-default mb-8">
                        <div class="bg-gray-100 border border-gray-200 rounded-full p-3 mr-3">
                            <i class="fas fa-shield-alt text-3xl text-secundary-400"></i>
                        </div>
                        <p class="text-secundary-400 font-extrabold leading-4" >Tu pago es 100% seguro<br/><span class="text-sm text-secundary-400 font-normal">protegemos tus datos.</span></p>
                    </div>

                    <div class="my-12 cursor-default  text-center w-full">
                        <p class="text-secundary-400 text-xl lg:text-3xl  font-bold text-center">Si tuviste problemas con tu compra o tu tarjeta escríbenos</p>
                        <div class="my-4">
                            <a href="https://wa.me/573153122025" target="_blank" class=" inline-flex items-center px-6 py-4 rounded-full text-white font-bold bg-green-500 text-3xl lg:text-4xl">
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
    <script>
        let promoAdDiv = document.getElementById("promoAd");

        // Set the date we're counting down to
        let countdown = document.getElementById('countdown');
        let promoText = document.getElementById('promoText');
        let countdownData = '{{$promo_time["date"]}}'
        var countDownDate = new Date(countdownData).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = (Math.floor(distance / (1000 * 60 * 60 * 24)));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Time validate and HTML
        let daysHtml="<span class='leading-none inline-block text-center px-1 py-3 bg-accent-400 pt-4 rounded-lg text-gray-50'>"+ days.toString().padStart(2, '0') + "  <small class='block text-xs pt-1'>DÍAS</small> </span>";
        let hoursHtml = "<span class='leading-none inline-block text-center px-1 py-3 bg-accent-400 pt-4 rounded-lg text-gray-50'>"+ hours.toString().padStart(2, '0') + "  <small class='block text-xs pt-1'>HORAS</small> </span>";
        let minutesHtml = "<span class='leading-none inline-block text-center px-1 py-3 bg-accent-400 pt-4 rounded-lg text-gray-50'> "+ minutes.toString().padStart(2, '0') + "  <small class='block text-xs pt-1'>MINUTOS</small> </span>";
        let secondsHtml = "<span class='leading-none inline-block text-center px-1 py-3 bg-accent-400 pt-4 rounded-lg text-gray-50'>"+ seconds.toString().padStart(2, '0') + " <small class='block text-xs pt-1'>SEGUNDOS</small> </span>";
        // Display the result in the element with id="demo"
        countdown.innerHTML = daysHtml + hoursHtml  + minutesHtml + secondsHtml;
        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            countdown.innerHTML = "<p class='col-span-4 text-center mt-auto mb-auto text-lg text-accent-400'>Tu oferta ha expirado </p>";
            promoText.innerText = "";
        }
        }, 1000);

    </script>
</div>
