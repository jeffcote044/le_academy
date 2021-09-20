<x-app-layout>
    <section class="bg-fixed bg-cover min-h-screen" style="background-image: url({{asset('img/backgrounds/ea857aff-1a05-4f66.jpg')}})">

        <div class="py-6 md:py-12 max-w-4xl mx-auto">
            <div class="">
                <header class="leading-tight text-center">
                    <h1 class="text-3xl md:text-5xl font-bold leading-none pt-2">Curso online de {{$course->title}}</h1>
                    <h2 class="text-base md:text-2xl">Pediatra Leonardo Escobar</h2>
                </header>
                <div class="my-8">
                    <figure>
                        <img src="{{asset('img/billboards/banner_masterclass_thanks.jpg')}}" alt="">
                    </figure>
                </div>
                <div class="my-4 text-center">
                    <p class="text-gray-700 text-sm md:text-base px-2">
                        {!!$course->description!!}
                    </p>
                    <p class="my-4 text-xl px-2 md:text-2xl leading-tight">Accede al curso online que te enseñará el <b>qué, cómo y cuándo</b> de la Alimentación complementaria de la mano y con toda la experiencia de tu <b>pediatra Leonardo Escobar</b></p>
                </div>
                <div class="my-2 px-1"><a href="{{route('payment.checkout', compact('course'))}}" class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-100  text-lg w-full" >
                    ¡Sí, quiero el curso de alimentación complementaria ya!
                    <small class="block text-xs font-medium">Acceso inmediato con el {{$course->discount->name}} - <span class=" line-through">${{round($course->price->name)}} USD </span>  <span class="ml-2 font-bold">${{round($course->finalPrice)}} USD</span> </small>
                </a></div>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="max-w-4xl mx-auto ">
            <h2 class="text-xl md:text-4xl font-bold leading-tight text-center mb-12">¿En cuál de estas situaciones prefieres estar?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 ">
                <div class="border-r px-4 md:px-8" >
                    <figure class="mb-12 px-4">
                        <img src="{{asset('img/billboards/banner_situacion_1.jpg')}}" alt="">
                    </figure>
                    <ul class="text-sm md:text-base">
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>Crees que el proceso de alimentación complementaria es muy difícil.</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>No sabes cuál es el mejor método de alimetnación para tu bebé</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>La hora de comer se ha convertido en una batalla.</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>No sabes a que edad debe comenzar la alimentación complementaria</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>Aún no sabes cuanta cantidad de comida debes darle cada día</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>No tienes recetas ni la lista de alimentos que puedes ofrecer</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>Tu hijo(a) no te recibe los alimentos</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>Te da miedo las alergias al huevo, pescados y demás alimentos</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-times-circle mr-2 absolute text-accent-400 top-1 left-0"></i>
                            <span>No sabes que hacer si tu hijo se atora</span>
                        </li>
                    </ul>
                </div>
                <div class="px-4 md:px-8 mt-8 md:mt-0" >
                    <figure class="mb-12 px-4">
                        <img src="{{asset('img/billboards/banner_situacion_2.jpg')}}" alt="">
                    </figure>
                    <ul class="text-sm md:text-base">
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Sientes la seguridad y la confianza de iniciar la alimentación complementaria.</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Ya sabes cuál es el método de alimetación adecuado para tu bebé</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Tienes las herramientas adecuadas y una guía paso a paso que te acompañará en el proceso.</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Reconoces las señales de apetito y saciedad de tu hijo(a)</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Tienes la lista de alimentos completa con ejemplos de recetas fáciles de preparar y nutritivas</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Sabes cuales son los diferentes grupos de alimentos y como debes presentar cada uno según la edad de tu hijo(a)</span>
                        </li>
                        <li class="mb-4 relative pl-6 leading-tight">
                            <i class="fas fa-check-circle mr-2 absolute text-blue-700 top-1 left-0"></i>
                            <span>Conoces los factores de riesgo y como manejar el atoramiento y/o alergias.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-xl md:text-3xl font-bold leading-tight">Tu y yo sabemos lo importante que es esta etapa en el crecimiento y el bienestar de tu bebé.</h2>
            <p class="my-4 text-lg md:text-xl leading-tight">Consigue todo lo que necesitas para llevar este proceso de la mejor manera con mi curso:</b></p>
            <h2 class="text-3xl md:text-5xl font-bold leading-tight text-accent-400">{{$course->title}}</h2>
            <h3 class="text-sm md:text-lg">{{$course->subtitle}}</h3>
            <figure class="my-8">
                <img src="{{asset('img/billboards/banner_venta_ac.jpg')}}" alt="Curso Alimentación Complementaria">
            </figure>
            <div class="my-2 px-1"><a href="{{route('payment.checkout', compact('course'))}}" class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-100  text-lg w-full" >¡Sí, quiero el curso de alimentación complementaria ya!</a></div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-xl md:text-3xl font-bold leading-tight max-w-2xl mx-auto">Un curso completo con <span class="text-accent-400">12</span> módulos y más de <span class="text-accent-400">50</span> lecciones en video</h2>
        </div>

        <div class="max-w-4xl  my-8 grid grid-cols-1 md:grid-cols-2 mx-4 md:mx-auto gap-x-10">
            @foreach ($course->sections as $key => $section)
                <article class="mb-6" x-data="{$open : false}">
                    <header class="flex items-center  px-8 py-4 cursor-pointer bg-white shadow-lg rounded-xl" x-bind:class="{ ' rounded-b-none' : $open , ' rounded-b-xl' : !$open}"  x-on:click="$open = !$open">
                        <h2 class="font-semibold text-base text-gray-700 flex-1">
                            <span class="block text-accent-400"> <i class="far fa-play-circle mr-1"></i> Módulo {{$key+1}}</span>
                            {{$section->name}}
                        </h2>
                        <i class="fas ml-auto text-2xl text-accent-400" x-bind:class="{ 'fa-sort-up' : $open , 'fa-sort-down' : !$open}"></i>
                    </header>
                    <div class="bg-gray-100 rounded-b-xl shadow-md px-4 overflow-hidden transition-all ease-in-out max-h-0 duration-75" x-bind:class="{ 'py-2  mt-0' : $open}" x-ref="container{{$key+1}}" x-bind:style="$open == true ? 'max-height: ' + $refs.container{{$key+1}}.scrollHeight + 'px' : ''">
                        <ul class="py-4">
                            @foreach ($section->lessons as $lesson)
                            <li class="text-gray-700 text-sm mb-2 w-full flex items-center">
                                <p class="inline-block">{{$lesson->name}}</p>
                                <i class="fas fa-lock inline-block ml-auto text-gray-400 text-sm align-self-end"></i>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <section class="py-8 bg-gray-50">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-2xl md:text-4xl font-bold leading-tight max-w-2xl mx-auto mb-8">Únete hoy al curso de {{$course->title}} y obtendrás:</h2>
            <div class="px-2 md:px-8 my-12 mx-4 md:mx-auto md:max-w-2xl py-8 border-4 border-accent-400 rounded-xl shadow-lg">
                <figure class="">
                    <img src="{{asset('img/billboards/banner_venta_ac.jpg')}}" alt="Curso Alimentación Complementaria">
                </figure>
                <div class=" text-left mt-12">
                    <h3 class=" font-semibold"><i class="fas fa-desktop text-accent-400 mr-2 text-lg"></i> Curso online de alimentación complementaria</h3>
                    <ul class="ml-2 md:ml-8 mt-4 text-sm">
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>11 módulos completos</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>+50 lecciones en video</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>Videos prácticos de alimentos y ejemplos de recetas</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>Acceso inmediato</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>Recursos descargabless</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>Acceso a las actualizaciones de por vida sin pagar más</span>
                        </li>
                        <li class="mb-2 relative pl-6">
                            <i class="fas fa-chevron-right text-accent-400 mr-2 absolute top-1 left-0"></i>
                            <span>Certificado de finalización</span>
                        </li>
                    </ul>
                    <div class=" text-center">
                        <p class="text-accent-400 font-semibold mt-8 mb-2">El precio real de este curso es <span class="text-base font-medium line-through  ml-auto ">{{$course->price->name}}</span></p>
                        <p class="text-xl mb-4 font-semibold leading-tight">Pero <span class="underline">HOY</span>, puedes acceder a todo este contenido con un precio especial de:</p>
                        <p class=" text-5xl md:text-6xl font-bold leading-none">${{round($course->finalPrice)}} USD</p>
                        <p class=" leading-none"><small>Pago único y en dólares</small></p>
                        <p class="mt-6 text-secundary-400 font-semibold px-8 mx-auto">Aprovecha y optén el descuento con esta oferta especial de lanzamiento.</p>
                        <div class="my-2 px-1"><a href="{{route('payment.checkout', compact('course'))}}" class="bg-accent-400 rounded-lg font-bold text-white text-center inline-block md:px-8 py-4 transition duration-300 ease-in-out hover:bg-accent-100  text-lg w-full" >
                            ¡Sí, quiero el curso de alimentación complementaria ya!
                            <small class="block text-xs font-medium">Acceso inmediato por solo ${{round($course->finalPrice)}} USD</small>
                        </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1  md:grid-cols-3 gap-x-6">
        <div class=" md:col-span-2 mt-4 md:mt-0">
            @livewire('courses-reviews', ['course' => $course])
        </div>
        <div id="sticky-card" class="relative pt-4 mb-4 row-start-auto">
            <div class="sticky top-4 z-5 shadow-sm">
                <section class="bg-white shadow mb-6 pb-4">
                    <div>
                        <img class="h-48 w-full object-cover" src="{{Storage::url($course->image->url)}}">
                    </div>
                    <div class="px-4">
                        <div class="flex flex-col">
                            <div class="py-4 w-full flex flex-col justify-between bg-white">
                                @can('enrolled', $course)
                                    <div class="flex flex-col justify-start w-full">
                                        <h3 class="text-lg font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-secundary-100 opacity-75"></i>Ya estás inscrito a este curso</h3>
                                    </div>
                                @else
                                    <div class="flex flex-col justify-start w-full">
                                        <div class="mt-2 mb-3 leading-tight ">
                                            @if ($course->discount)
                                                @if ($course->discount->value != 0)
                                                    <div class="text-gray-500 text-lg mb-2">Valor real: <span class="line-through">{{$course->price->name}}</span> <span class="text-accent-400">({{$course->discount->name}})</span></div>
                                                    <h2 class="font-bold text-xl" >Precios en oferta</h2>
                                                    <div class="flex items-center">
                                                        <p class="text-5xl md:text-4xl text-accent-400 font-bold">${{round($course->final_price)}} <span class="text-3xl">dólares</span></p>
                                                    </div>
                                                    <p class="text-xs text-gray-700 mb-2 ">* Pago único y en dólares</p>
                                                    <p class="text-sm text-accent-400 "> <i class="far fa-clock"></i> ¡Oferta disponible por tiempo limitado</b>! </p>
                                                    <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta terminará en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($course->discount->expires_at))->diffForHumans() }}</b>! </p>
                                                    @else
                                                    <p class="text-4xl text-accent-400 font-bold text-center">{{$course->price->name}}</p>
                                                @endif
                                            @else
                                                <p class="text-4xl text-accent-400 font-bold text-center">{{$course->price->name}}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @can('enrolled', $course)
                            <a class="btn btn-default block w-full border border-secundary-400 py-3 text-center bg-secundary-400 transition ease-in-out duration-500 hover:bg-transparent hover:text-secundary-400  text-white font-bold rounded-md text-lg " href="{{route('courses.status', $course )}}">Continuar curso</a>
                        @else
                            @if ($course->price->value == 0)
                                <form action="{{route('courses.enrolled', $course)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-default transition ease-in-out duration-500 hover:bg-transparent hover:text-secundary-700 block w-full  py-3 text-center bg-secundary-700 text-white font-bold  rounded-md text-lg border border-secundary-700" >Inscribirse a este curso</button>
                                </form>
                            @else
                                <a href="{{route('payment.checkout', $course)}}"  class="btn btn-default transition ease-in-out duration-500 hover:bg-transparent hover:text-accent-400 block rounded-md text-lg  py-3 text-center bg-accent-400 border border-accent-400 text-white font-bold " >Comprar este curso</a>
                            @endif
                        @endcan
                        <div class="mt-4">
                            @if ($course->price->value != 0)
                                <p class="block text-center text-xs ">Garantia de reembolso de 14 días</p>
                            @endif
                            <div>
                                <h3 class="text-base font-bold text-gray-800 mb-2 mt-4">Este curso incluye</h3>
                                <ul class="text-sm">
                                    <li class="text-gray-700 mb-2"><i class="w-4 fas fa-play-circle mr-4"></i>{{$course->lessons->count()}} clases online ¡a tu ritmo!</li>
                                    <li class="text-gray-700 mb-2"><i class="w-4 fas fa-video mr-4"></i>Más de {{ floor($course->lessons->sum('duration')/ 3600) }} horas de videoclases</li>
                                    <li class="text-gray-700 mb-2"><i class="w-4 fas fa-file-download mr-4"></i>Recursos descargables</li>
                                    <li class="text-gray-700 mb-2"><i class="w-4 fas fa-infinity mr-4"></i>Acceso de por vida</li>
                                    <li class="text-gray-700 mb-2"><i class="w-4 fas fa-award mr-4"></i>Certificado de finalización</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
    @push('footerText')
        <div class="leading-none">
            <small class="italic text-gray-100 font-thin text-xs" >This site is not a part of the Facebook website or Facebook Inc. Additionally, This site is NOT endorsed by Facebook in any way. FACEBOOK is a trademark of FACEBOOK, Inc.</small>
        </div>
    @endpush
</x-app-layout>

