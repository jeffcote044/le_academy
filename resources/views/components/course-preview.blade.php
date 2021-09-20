@props(['course', 'show'])
@if ($course)
<div class="flex inset-0 z-50 w-auto max-w-max ml-0" x-data="{$open : {{$show}}}"  x-show="$open"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-end="opacity-0">
    <div class="fixed inset-0 bg-gray-900 opacity-50 -z-1"></div>
    <div class="h-screen fixed inset-0">
        <div class="absolute inset-0 h-screen">
            <div class="w-full mx-auto px-4 flex relative h-screen items-center justify-center z-1 focus:outline-none">
                <div class="flex -mx-4 h-screen items-center">
                    <div class="px-4" x-on:click.away="$wire.tooglePreview(); document.documentElement.classList.remove('overflow-hidden'); new Vimeo.Player(document.querySelector('.embed-responsive iframe')).pause();">
                        <div class="relative overflow-y-auto overflow-x-hidden bg-white text-base max-h-90vh sm:h-auto sm:min-h-0 sm:max-h-90vh">
                            <div class="bg-white rounded-sm" style="width: 90vw; max-width: 568px;">
                                <div class="w-full relative bg-gray-900 bg-no-repeat bg-center bg-auto" style="background-image: url('{{asset('img/gfx/loading-gif.svg')}}')">
                                    <div class="w-full -z-1 embed-responsive">
                                       {!!$course->trailer!!}
                                    </div>
                                </div>
                                <div class="flex flex-col" style="max-height: 186px;">
                                    <div class="p-4 w-full flex justify-between bg-white">
                                        <div class="flex flex-col items-start w-4/6 pr-4">
                                            <div class="mb-1">
                                                <div class="mr-1 flex items-center">
                                                    @if (! $course->rating == 0)
                                                        <ul class="flex text-sm items-center">
                                                            <li class="mr-1 flex items-center">
                                                                <p class="text-base mr-1 text-accent-400 font-extrabold">{{number_format($course->rating, 1)}}</p>
                                                                <svg class="h-4 w-20">
                                                                    <use xlink:href="#stars-{{round($course->rating / $nearest = 5, 1)* $nearest}}-star">
                                                                </svg>
                                                                <span class="text-gray-400 text-sm ml-1 mr-2">({{$course->reviews_count}})</span>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                </div>
                                                <h2 class="text-x1 text-gray-700 mb-1 font-extrabold leading-5">
                                                    <a href="{{route('courses.show', $course)}}">
                                                        {{Str::limit($course->title, '40', '...')}}
                                                    </a>
                                                </h2>
                                                <p class="text-gray-500 text-sm mb-2">Creado por: {{$course->teacher->name}}</p>
                                                <small class="inline py-1 px-2 items-center justify-center flex-grow bg-accent-400 text-white text-xs rounded-sm">Nivel {{$course->level->name}}</small>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-start items-end w-1/2">
                                            <div class="mt-2 mb-3 flex items-center w-full">

                                                @can('enrolled', $course)
                                                <div class="flex flex-col justify-start w-full">
                                                    <h3 class="text-base font-bold text-gray-600"> <i class="fas fa-info-circle mr-1 text-primary-100"></i> Ya estás inscrito</h3>
                                                </div>
                                                @else
                                                    @if ($course->discount)
                                                        <p class="text-2xl text-accent-400 font-bold">{{$course->final_price}} US$</p>
                                                        <span class="text-lg ml-2 line-through text-gray-500">{{$course->price->name}}</span>
                                                    @else
                                                        <p class="text-2xl text-center w-full text-accent-400 font-bold">{{$course->price->name}}</p>
                                                    @endif
                                                @endcan

                                                
                                            </div>
                                            @can('enrolled', $course)
                                            <a class="w-full text-center border border-primary-100 bg-primary-100 text-white rounded-full px-8 py-3 mb-2 transition duration-500 ease select-none hover:bg-transparent hover:text-primary-100 focus:outline-none focus:shadow-outline font-extrabold" href="{{route('courses.status', $course )}}">Continuar curso</a>
                                        @else
                                            @if ($course->price->value == 0)
                                                <form action="{{route('courses.enrolled', $course)}}" method="POST" class="w-full">
                                                    @csrf
                                                    <button class="w-full text-center border border-primary-100 bg-primary-100 text-white rounded-full px-8 py-3 mb-2 transition duration-500 ease select-none hover:bg-transparent hover:text-primary-100 focus:outline-none focus:shadow-outline font-extrabold" >Adquirir ahora</button>
                                                </form>
                                            @else
                                                <a href="{{route('payment.checkout', $course)}}"  class="w-full text-center border border-primary-100 bg-primary-100 text-white rounded-full px-8 py-3 mb-2 transition duration-500 ease select-none hover:bg-transparent hover:text-primary-100 focus:outline-none focus:shadow-outline font-extrabold" >Comprar curso</a>
                                            @endif
                                        @endcan



                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif