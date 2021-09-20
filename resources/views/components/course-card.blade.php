@props(['course'])
<article class="bg-white shadow-xs rounded-2xl overflow-hidden flex flex-col md:max-w-xs md:mx-auto">
    <div class="relative cursor-pointer " x-data="{$open : false}"  @mouseenter="$open = !$open" @mouseleave="$open = !$open">
        <div class="w-full h-full items-center flex justify-center absolute">
            <div x-show="$open"  wire:click="coursePreview({{$course->id}})" x-on:click="document.documentElement.classList.add('overflow-hidden');" class="hidden sm:flex w-full h-full items-center justify-center absolute bg-gray-900 bg-opacity-75"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-end="opacity-0">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 33 32"><path fill="#fff" d="M16.682 26.367c-5.495 0-10.887-3.060-16.021-9.098-0.399-0.468-0.433-1.145-0.086-1.651 0.28-0.409 6.945-9.983 16.301-9.983 5.543 0 10.743 3.352 15.451 9.962 0.329 0.464 0.337 1.081 0.022 1.55-0.254 0.376-6.302 9.22-15.666 9.22zM3.453 16.324c4.364 4.856 8.812 7.318 13.229 7.318 6.436 0 11.25-5.273 12.839-7.267-3.999-5.32-8.249-8.018-12.648-8.018-6.438 0.001-11.666 5.772-13.421 7.967z"></path><path fill="#fff" d="M16.457 9.444c-3.622 0-6.557 2.936-6.557 6.557s2.935 6.557 6.557 6.557c3.621 0 6.556-2.938 6.556-6.557 0-3.622-2.935-6.557-6.556-6.557zM18.805 16.098c-1.459 0-2.643-1.184-2.643-2.641 0-1.461 1.184-2.644 2.643-2.644s2.641 1.182 2.641 2.644c0.001 1.458-1.182 2.641-2.641 2.641z"></path></svg>
                <span class="font-link text-white ml-2 font-bold">Ver Trailer</span>
            </div>
            <div  x-show="!$open" class="hidden sm:flex items-center justify-center rounded-full w-8 h-8 bg-primary-400 bg-opacity-75">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 12L5.5 21.5263L5.5 2.47372L22 12Z" fill="#ffffff"></path></svg>
            </div>
            <a href="{{route('courses.show', $course)}}" class=" sm:hidden w-full h-full absolute top-0 left-0 z-10"></a>
        </div>
        <div>
            <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}">
        </div>
    </div>
    <div class="px-6 py-4 flex flex-col flex-1">
        <div class="flex-1 flex flex-col">
            <a href="{{route('courses.show', $course)}}" class="block">
                <h2 class="text-x1 text-gray-700 mb-2 leading-6 font-bold">{{Str::limit($course->title, '40', '...')}}</h2>
            </a>
            <p class="text-gray-500 text-sm mb-2 mt-auto hidden md:block">Creado por: {{$course->teacher->name}}</p>
            <div class="flex items-center">
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
                <p class="text-sm text-gray-500 "><i class="fas fa-users mr-2"></i>{{$course->students_count}}</p>
            </div>
            <div class="mt-2 flex items-center">
                @if ($course->discount)
                    <p class="text-lg text-gray-700 font-bold">{{$course->final_price}} US$</p>
                    <span class=" text-sm ml-2 line-through text-gray-400">{{$course->price->name}}</span>
                @else
                    <p class="text-lg font-bold text-gray-700">{{$course->price->name}}</p>
                @endif
            </div>
        </div>
        <a href="{{route('courses.show', $course)}}"class="block transition-all ease-in-out text-center w-full mt-4 bg-secundary-700 border border-secundary-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700">
            Ver más información
        </a>
    </div>
</article>