<div class="mt-4">
    <header>
        <h3 class="font-bold text-3xl leading-tight mb-2">Opiniones de este curso</h3>
        <div class="my-8 flex items-center flex-wrap">
            <x-stars-svg/>
            <ul class="flex text-sm items-center w-full md:w-auto">
                <li class="mb-2 md:mb-0 md:mr-1 flex md:flex-col items-center">
                    <p class=" mr-1 text-accent-400 font-extrabold text-6xl leading-10">{{number_format($course->rating, 1)}}</p>
                    <div class="ml-4 md:ml-0">
                        <div class="w-full text-center">
                            <svg class="h-10 w-36">
                                <use xlink:href="#stars-{{round($course->rating / $nearest = 5, 1)* $nearest}}-star">
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-accent-400 ">Valoración del curso</p>
                    </div>
                </li>
            </ul>
            <ul class="flex-1 md:ml-6">
                <li class="flex items-center mb-2">
                    <div class="relative flex-1 mr-4">
                        <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                            <div style="width:{{(($course->reviews->where('rating', 5)->count() * 100) / $course->reviews->count()).'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100"></div>
                        </div>
                    </div>
                    <ul class="flex items-center mr-4">
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 "></i>
                    </ul>
                    <p class="text-gray-400 text-sm w-14">{{ number_format((($course->reviews->where('rating', 5)->count() * 100) / $course->reviews->count()),1) }} % </p>
                </li>
                <li class="flex items-center mb-2">
                    <div class="relative flex-1 mr-4">
                        <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                            <div style="width:{{(($course->reviews->where('rating', 4)->count() * 100) / $course->reviews->count()).'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100"></div>
                        </div>
                    </div>
                    <ul class="flex items-center mr-4">
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 "></i>
                    </ul>
                    <p class="text-gray-400 text-sm w-14">{{ number_format((($course->reviews->where('rating', 4)->count() * 100) / $course->reviews->count()),1) }} % </p>
                </li>
                <li class="flex items-center mb-2">
                    <div class="relative flex-1 mr-4">
                        <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                            <div style="width:{{(($course->reviews->where('rating', 3)->count() * 100) / $course->reviews->count()).'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100"></div>
                        </div>
                    </div>
                    <ul class="flex items-center mr-4">
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 "></i>
                    </ul>
                    <p class="text-gray-400 text-sm w-14">{{ number_format((($course->reviews->where('rating', 3)->count() * 100) / $course->reviews->count()),1) }} % </p>
                </li>
                <li class="flex items-center mb-2">
                    <div class="relative flex-1 mr-4">
                        <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                            <div style="width:{{(($course->reviews->where('rating', 2)->count() * 100) / $course->reviews->count()).'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100"></div>
                        </div>
                    </div>
                    <ul class="flex items-center mr-4">
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 "></i>
                    </ul>
                    <p class="text-gray-400 text-sm w-14">{{ number_format((($course->reviews->where('rating', 2)->count() * 100) / $course->reviews->count()),1) }} % </p>
                </li>
                <li class="flex items-center mb-2">
                    <div class="relative flex-1 mr-4">
                        <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                            <div style="width:{{(($course->reviews->where('rating', 1)->count() * 100) / $course->reviews->count()).'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100"></div>
                        </div>
                    </div>
                    <div class="flex items-center mr-4">
                        <i class="fas fa-star text-yellow-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 mr-1"></i>
                        <i class="fas fa-star text-gray-300 "></i>
                    </div>
                    <p class="text-gray-400 text-sm w-14">{{ number_format((($course->reviews->where('rating', 1)->count() * 100) / $course->reviews->count()),1) }} % </p>
                </li>
            </ul>
        </div>
        @can('enrolled', $course)
            <article class="mb-4">
                @can('reviewed', $course)
                    <div>
                        <h2 class="mb-2 text-gray-900 text-lg font-bold">¿Cómo calificarias este curso?</h2>
                        <div>
                            <div class="flex items-center mb-2">
                                <div class="flex items-center" x-data="{ rating: 'Elije tu calificación' }" >
                                    <ul class="flex text-2xl">
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)" x-on:click="rating = 'Malo'">
                                            <i class="fas fa-star text-{{$rating >=1 ? 'yellow' : 'gray'}}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)" x-on:click="rating = 'Regular'">
                                            <i class="fas fa-star text-{{$rating >=2 ? 'yellow' : 'gray'}}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)" x-on:click="rating = 'Bueno'">
                                            <i class="fas fa-star text-{{$rating >=3 ? 'yellow' : 'gray'}}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)" x-on:click="rating = 'Muy bueno'">
                                            <i class="fas fa-star text-{{$rating >=4 ? 'yellow' : 'gray'}}-300"></i>
                                        </li>
                                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)" x-on:click="rating = 'Excelente'">
                                            <i class="fas fa-star text-{{$rating ==5 ? 'yellow' : 'gray'}}-300"></i>
                                        </li>
                                    </ul>
                                    <span class="ml-2 text-sm font-semibold @error('rating') text-red-500 @enderror " x-text="rating"></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <textarea wire:model="comment" class="form-input w-full @error('comment') border border-red-500 @enderror " rows="2" placeholder="Escribe tu reseña..."></textarea>
                            @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <button class=" outline-zero mt-4 mx-auto text-center inline-block font-bold px-8 py-2 text-lg border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700" wire:click="store">Publicar reseña</button>
                    </div>
                @else
                    <div x-data="{$open : @entangle('showUpdate')}">
                        <div class="flex items-center bg-gray-200 text-gray-500 border border-gray-300 rounded-md text-sm font-semibold px-2 md:px-4 py-3" role="alert">
                            <div class="flex items-center flex-1">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                            <p>Ya has valorado este curso.</p>
                            </div>
                            <button class="text-xs md:text-sm align-self-end outline-zero transition ease-in-out duration-300 bg-gray-300 md:bg-transparent  hover:bg-gray-300 hover:text-cool-gray-900 font-semibold px-4 py-2 rounded-full" wire:click="setReview({{$course->reviews->where('user_id', auth()->user()->id )->where('course_id', $course->id)->first()}})" x-on:click="$open = true" >Editar reseña</button>
                        </div>
                        <div class="mt-4"  x-show.transition.inout.opacity.duration.300ms="$open" >
                            <h2 class="mb-2 text-gray-900 text-lg font-bold">¿Cómo calificarias este curso?</h2>
                            <div>
                                <div class="flex items-center mb-2">
                                    <div class="flex items-center" x-data="{ rating: 'Elije tu calificación' }" >
                                        <ul class="flex text-2xl">
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)" x-on:click="rating = 'Malo'">
                                                <i class="fas fa-star text-{{$rating >=1 ? 'yellow' : 'gray'}}-300"></i>
                                            </li>
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)" x-on:click="rating = 'Regular'">
                                                <i class="fas fa-star text-{{$rating >=2 ? 'yellow' : 'gray'}}-300"></i>
                                            </li>
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)" x-on:click="rating = 'Bueno'">
                                                <i class="fas fa-star text-{{$rating >=3 ? 'yellow' : 'gray'}}-300"></i>
                                            </li>
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)" x-on:click="rating = 'Muy bueno'">
                                                <i class="fas fa-star text-{{$rating >=4 ? 'yellow' : 'gray'}}-300"></i>
                                            </li>
                                            <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)" x-on:click="rating = 'Excelente'">
                                                <i class="fas fa-star text-{{$rating ==5 ? 'yellow' : 'gray'}}-300"></i>
                                            </li>
                                        </ul>
                                        <span class="ml-2 text-sm font-semibold @error('rating') text-red-500 @enderror " x-text="rating"></span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <textarea wire:model="comment" class="form-input w-full @error('comment') border border-red-500 @enderror " rows="2" placeholder="Escribe tu reseña..."></textarea>
                                @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:flex items-center mt-4 mx-auto text-center">
                                <button class=" w-full md:w-auto block outline-zero text-center font-bold px-8 py-2 text-lg border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700" wire:click="update({{$course->reviews->where('user_id', auth()->user()->id )->where('course_id', $course->id)->first()}})">Actualizar reseña</button>

                                <button x-on:click="$open = false" class="mt-6 md:mt-0 md:ml-6 text-gray-400 outline-zero transition ease-in-out duration-300 hover:underline hover:text-gray-700" >Cancelar, no quiero actualizar</button>
                            </div>
                        </div>
                    </div>
                @endcan
            </article>
        @endcan
    </header>
    <div class="max-w-7xl mx-auto ">
        <div class="bg-white px-2 py-6">
            @foreach ($course->reviews->reverse() as $review)
                <article class="flex flex-col mb-8 text-gray-800 border-b border-gray-200">
                    <div class="flex items-center">
                        <figure class="mr-4">
                            <img class="h-12 w-12 object-cover rounded-full shadow-xs" src="{{$review->user->profile_photo_url}}" alt="">
                        </figure>
                        <div>
                            <p class=" font-semibold">{{$review->user->name}}</p>
                            <ul class="flex">
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                                    <i class=" text-xs fas fa-star text-{{$review->rating >=1 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                                    <i class=" text-xs fas fa-star text-{{$review->rating >=2 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                                    <i class=" text-xs fas fa-star text-{{$review->rating >=3 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                                    <i class=" text-xs fas fa-star text-{{$review->rating >=4 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                                <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                                    <i class=" text-xs fas fa-star text-{{$review->rating ==5 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="max-w-7xl flex flex-col flex-1">
                        <div class="mt-2 mb-4">
                            <p>{{$review->comment}}</p>
                            <p class="mt-1 text-gray-400">
                                <small>
                                @if ($review->updated_at)
                                    {{$review->updated_at->diffForHumans() }}
                                @else
                                    {{$review->created_at->diffForHumans() }}
                                @endif
                            </small>
                        </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</div>
