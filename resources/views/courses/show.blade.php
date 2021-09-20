<x-app-layout>
    <section class="bg-gradient-to-bl from-secundary-100 via-secundary-400 to-secundary-700 py-8 mb-8" id="header">
        <div class="container">
            <div class="max-w-3xl px-4">
                <div class="text-gray-100">
                    <hgroup class="mb-3">
                        <h1 class="text-xl md:text-3xl font-bold leading-none md:leading-8">Curso de {{$course->title}}</h1>
                        <h3 class="text-sm md:text-lg mt-1">{{$course->subtitle}}</h3>
                    </hgroup>

                    <div class="flex items-center mb-6">
                        <figure class=" mr-4">
                            <img class="h-10 w-10 md:h-16 md:w-16 object-cover rounded-full shadow-sm" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        </figure>
                        <div class="flex-1">
                            <h3 class="text-lg md:text-2xl font-bold ">{{$course->teacher->name}}</h3>
                            @if ($course->teacher->profile)
                                <p class="">{{$course->teacher->profile->title}}</p>
                                @else
                                <p class="text-xs md:text-sm">Profesor de este curso</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center text-xs flex-wrap">
                        <p class="text-xs md:text-sm mr-2 md:mr-4"><i class="mr-2 fas fa-star text-yellow-300 text-base"></i>{{$course->rating}} <span class="text-gray-400">({{$course->reviews_count}})</span></p>
                        <p class="text-xs md:text-sm mr-2 md:mr-4"><i class="mr-2 fas fa-user text-secundary-100 text-base"></i>{{$course->students_count}} Estudiantes</p>
                        <p class="text-xs md:text-sm text-gray-400 mt-2 md:mt-0 w-full md:w-auto">Actualizado {{$course->lastUpdate}} </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1  md:grid-cols-3 gap-x-6 ">
        <div class="md:col-span-2 mt-4 md:mt-0">
             <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">Acerca del curso</h3>
                </header>
                <div>
                    <p class="text-gray-700 text-base">
                        {!!$course->description!!}
                    </p>
                </div>
            </section>

            <section class="my-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">¿Qué vas a aprender?</h3>
                </header>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                    @foreach ($course->goals as $goal)
                        <li class="text-gray-700 text-sm"><i class="fas fa-check mr-2 text-secundary-100 text-xs"></i>{{$goal->name}}</li>
                    @endforeach
                </ul>
            </section>



            <section class="my-8">
                <div class="w-full -z-1 embed-responsive">
                    {!!$course->trailer!!}
                 </div>
            </section>
            <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">Contenido del curso</h3>
                </header>
                <div>
                    @foreach ($course->sections as $key => $section)
                        <article class="mb-4" @if ($loop->first)
                            x-data="{$open : true}"
                            @else
                            x-data="{$open : false}"
                        @endif
                        >
                            <header class="flex items-center  px-4 py-2 cursor-pointer bg-gray-100" x-on:click="$open = !$open">
                                <h2 class="font-semibold text-base text-gray-700 flex-1">{{$section->name}}</h2>
                                <i class="fas  ml-auto text-base text-gray-700" x-bind:class="{ 'fa-sort-up' : $open , 'fa-sort-down' : !$open}"></i>
                            </header>
                            <div class="bg-white px-4 overflow-hidden transition-all ease-in-out max-h-0 duration-300" x-bind:class="{ 'py-2  mt-2' : $open}" x-ref="container{{$key+1}}" x-bind:style="$open == true ? 'max-height: ' + $refs.container{{$key+1}}.scrollHeight + 'px' : ''">
                                <ul>
                                    @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base mb-4 w-full flex items-center">
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
            <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-4">¿Qué necesitas?</h3>
                </header>
                <div>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement)
                            <li class="text-gray-700 text-base list-none mb-2"><i class="fas fa-check mr-2 text-secundary-100 text-xs"></i> {{$requirement->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="my-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">¿Para quién es este curso?</h3>
                </header>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                    @foreach ($course->audiences as $audience)
                        <li class="text-gray-700 text-sm"><i class="fas fa-check mr-2 text-secundary-100 text-xs"></i>{{$audience->name}}</li>
                    @endforeach
                </ul>
            </section>

            @livewire('courses-reviews', ['course' => $course])

            @if ($similares->count() < 0)
                <aside class="md:mt-2 md:px-4 mb-12">
                    <header>
                        <h3 class="text-gray-700 font-bold mb-8 text-3xl">Tal vez te interesa esto</h3>
                    </header>
                    @foreach ($similares as $similar)
                        <article class="flex mb-6
                        @if (!$loop->last)
                            border-b pb-4
                        @endif
                         border-gray-200">
                            <img class="h-16 w-20 object-cover rounded-sm overflow-hidden" src="{{Storage::url($similar->image->url)}}" alt="">
                            <div class="ml-4 flex flex-col md:flex-row flex-1">
                                <div class="flex-1 mr-4">
                                    <h2>
                                        <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show', $similar)}}">{{Str::limit($similar->title, 40)}}</a>
                                    </h2>
                                    <div class="md:flex items-center mb-2 hidden">
                                        <img class="h-8 w-8 object-cover rounded-full shadow-sm" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">
                                        <p class="text-sm text-gray-700 ml-2">{{$similar->teacher->name}}</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    @if ($similar->rating)
                                        <p class="text-sm mr-4 font-semibold"><i class="fas fa-star mr-2 text-yellow-300"></i>{{$similar->rating}}</p>
                                    @endif
                                    <p class="mr-4"><i class="mr-2 fas fa-user text-secundary-100 text-base"></i>{{$similar->students_count}}</p>

                                    @if ($similar->discount)
                                        @if ($similar->discount->value != 0)
                                        <div class="flex md:flex-col items-center ml-auto flex-1">
                                            <p class="text-base text-accent-400 font-bold">{{$similar->final_price}} US$</p>
                                            <span class=" hidden md:inline-block text-sm ml-2 line-through text-gray-500">{{$similar->price->name}}</span>
                                        </div>
                                        @else
                                            <p class="text-base text-accent-400 font-bold ml-auto flex-1">{{$similar->price->name}}</p>
                                        @endif
                                    @else
                                        <p class="text-base text-accent-400 font-bold ml-auto flex-1">{{$similar->price->name}}</p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @endforeach
                </aside>
            @endif
        </div>
        <div id="sticky-card" class="relative md:-mt-64 mb-4 row-start-1 md:row-start-auto">
            <div class="sticky top-2 z-5 shadow-sm">
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
                                                    <p class="text-sm text-accent-400 hidden"> <i class="far fa-clock"></i> ¡Esta oferta termina en <b>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($course->discount->expires_at))->diffForHumans() }}</b>! </p>
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
                        <div class="py-4">
                            <h3 class="text-base md:text-lg text-gray-700 text-center font-bold mb-4">Recomienda este curso a tus amigos</h3>
                            <div class="flex items-center justify-center">
                                <a class=" inline-block mr-4" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank" title="Compartir en Facebook">
                                    <i class="text-4xl fab fa-facebook-square text-blue-700"></i>
                                    <span class="text-gray-dark hidden">Facebook</span>
                                </a>
                                <a class=" inline-block mr-4" href="https://twitter.com/share?url={{url()->current()}}/&amp;amp;text=&amp;amp;via=mediasocialco" target="_blank" title="Compartir en Twitter">
                                    <i class="text-4xl fab fa-twitter-square text-blue-400 "></i>
                                    <span class="text-gray-dark hidden">Twitter</span>
                                </a>
                                <a class=" inline-block mr-4" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->current()}}/&title=&summary=&source=" target="_blank" title="Compartir en Linkedin">
                                    <i class="text-4xl fab fa-linkedin text-blue-500"></i>
                                    <span class="text-gray-dark hidden">Linkedin</span>
                                </a>
                                <div class="inline-block relative" x-data="{ input: '{{url()->current()}}' }">
                                    <button type="button" x-on:click="$clipboard(input)" title="Copiar enlace">
                                        <i class="text-4xl fas fa-link text-gray-400"></i>
                                        <span class="text-gray-dark hidden">Copiar enlace</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>


            </div>
        </div>
    </section>

    <x-slot name="css">
        <style></style>
    </x-slot>


    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-clipboard@1.x.x/dist/alpine-clipboard.ie11.js"></script>
    @endpush

</x-app-layout>

