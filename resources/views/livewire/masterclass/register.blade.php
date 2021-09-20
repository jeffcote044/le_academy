<div>
    <section class="bg-fixed bg-cover" style="background-image: url({{asset('img/backgrounds/ea857aff-1a05-4f66.jpg')}})">

        <div class="py-12 flex flex-col-reverse md:flex-row max-w-5xl mx-auto">
            <div>
                <iframe src="https://player.vimeo.com/video/580061972?autoplay=1&amp;loop=0&amp;autopause=0" width="" height="550" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" class="w-full -my-16 md:w-96 md:my-0"></iframe>
            </div>
            <div class="pl-4 pr-4 mb-8 md:pl-12 md:pr-0 md:mb-0 ">
                <header class="leading-tight">
                    <p class="text-sm md:text-xl inline bg-accent-400 md:px-4 text-gray-50"><b>Masterclass</b> online 100% gratuito de</p>
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">Alimentación Complementaria</h1>
                    <h2 class="text-base md:text-2xl">Método tradicional / BLW / BLISS</h2>
                </header>
                <p class="my-4 text-sm md:text-base">Descubre las claves para iniciar de manera correcta la alimentación de tu bebé a partir de los 6 meses, conocer cuáles son los diferentes métodos de alimentación complementaria y cuál se adapta mejor a tu hijo(a) y tu familia.</p>
                <div>
                    @if ($error_message)
                        <div class="px-4 py-6 bg-yellow-100 rounded-xl border border-yellow-400 text-sm">
                            <h3 class="text-lg font-bold mb-2"><i class="fas fa-exclamation-triangle text-accent-400  mr-1"></i> Opps! no hemos logrado completar la inscripción</h3>
                            <p>{{$name}}, no hemos podido registrarte al masterclass de alimentación complementaria por que tu correo <b>{{$email}}</b> ya se encuentra inscrito.</p>
                            <h3 class="mt-4 text-lg font-bold">¿Qué debes hacer?</h3>
                            <p>Revisar tu correo electrónico, ahí encontrarás toda la información para que puedas acceder al masterclass.</p>
                            <small>(Recuerda revisar la carpeta de correo no deseado o spam)</small>
                        </div>
                    @else
                        <form>
                            @csrf
                            <div class="flex flex-wrap mb-2">
                                <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                                    Nombre Completo
                                </label>
                                <input wire:model="name" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-name" type="text" placeholder="Escribe tu nombre"
                                @error('name') autofocus="autofocus" @enderror>
                                @error('name')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-2">
                                <div class="w-full">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                                    Correo electrónico
                                </label>
                                <input wire:model="email" class="appearance-none block w-full bg-gray-50 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-2 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="text" placeholder="Escribe tu correo"
                                @error('email') autofocus="autofocus" @enderror>
                                @error('email')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full">
                                    <input type="checkbox" id="grid-terms" wire:model="terms" class="form-checkbox cursor-pointer">
                                    <label for="grid-terms" >Acepto las <a href="#" class="hover:text-accent-400 hover:underline"><b>políticas de privacidad</b></a></label>
                                    @error('terms')<p class="text-red-500 text-xs italic">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <button wire:click="confirmData"
                                    wire:loading.attr="disabled"
                                    type="button"
                                    class=" bg-accent-400 rounded-lg font-bold text-white text-center inline-block px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-100  text-lg w-full">Quiero ver el masterclass</button>
                        </form>
                        <div class="mt-2 leading-none">
                            <small class="italic text-gray-500 ">* El masterclass es 100% ONLINE dictado por el <strong>Pediatra Leonardo Escobar</strong></small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="bg-secundary-400 py-12">
        <div class="max-w-3xl mx-auto flex flex-col-reverse md:flex-row">
            <div class="mt-8 md:mt-0">
                <img src="{{asset('img/billboards/banner_flash_sale.jpg')}}" alt="" class="mx-auto">
            </div>
            <div class="text-gray-50 ml-4 mr-4 md:mr-0 md:ml-10">
                <h2 class="font-bold mb-4 text-2xl leading-none">En este masterclass online aprenderás:</h2>
                <ul class="text-sm md:text-base">
                    <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span class="">Cuál es la mejor edad para comenzar</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Cuál es la mejor método de alimentación para tu bebé</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Cuáles son los primeros alimentos que puedes ofrecer</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>La importancia de comer con adecuados</span>
                    </li>
                     <li class="mb-2 relative pl-6">
                        <i class="far fa-play-circle mr-2 absolute top-1 left-0"></i>
                        <span>Identificar factores de riesgo, atoramiento y alergias</span>
                    </li>
                </ul>
                <div>
                    <hr class="my-6 block text-gray-700">
                    <p class=" uppercase">Este masterclass es <span class="font-bold">100% online <span class="text-primary-400" >y sin costo</span></span></p>
                    <small>Estará disponible por tiempo limitado.</small>
                </div>
            </div>
        </div>
    </section>

    @push('footerText')
        <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
    @endpush
</div>
