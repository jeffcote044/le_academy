@props(['course', 'current','self'])
<div>
    <div class="pb-6 md:p-6">
        <h2 class="text-xl leading-6 mb-4 font-extrabold">{{$course->title}}</h2>
        <div class="items-center hidden">
            <figure class="mr-4">
                <img class="w-12 h-12 object-cover rounded-full" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
            </figure>
            <div class="mb-4">
                <p>{{$course->teacher->name}}</p>
                <a class="text-secundary-100 text-sm" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
            </div>
        </div>
        <div>
            <span class="text-sm text-gray-600 mb-2"> {{ $self->completed }} / {{ $course->lessons->count() }} Completados ({{$self->advance.'%'}} )</span>
            <div class="relative pt-1">
                <div class="overflow-hidden h-2  text-xs flex rounded bg-gray-200">
                    <div style="width:{{$self->advance.'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-secundary-100 transition-all duration-300"></div>
                </div>
            </div>
        </div>
    </div>

    @if ($self->advance >= '0')
        <div class="mb-6 md:px-6">
            <a class="bg-primary-100 border border-primary-100 hover:bg-transparent hover:text-primary-100 transition ease-in-out duration-300 cursor-pointer text-gray-900 font-bold py-2 md:px-4 rounded flex items-center justify-center" href="{{route('courses.certificate', $course)}}" target="_blank" title="Descarga tu Certificado">
                <svg class="w-8 h-8 mr-2 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="none" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path fill="none" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                  </svg>
                <span class="font-bold">Obterner certificado</span>
              </a>
        </div>
    @endif

    {{--@if ($course->discount)
        <div    x-data="{$open : true}"
                x-show="$open"
                x-cloak
                id="promoAd">
        </div>
    @endif--}}

    <ul>

        @foreach ($course->sections as $key => $section)
            <li class="text-gray-600 md:mx-4 shadow-xs rounded-xl overflow-hidden mb-3" x-data="{$open : 1}">
                <div class="font-bold text-sm px-4 py-3  bg-gray-50 text-gray-700 flex items-center hover:bg-gray-100 cursor-pointer" x-on:click="$open = !$open">
                    <div>
                        <div> <span class="mr-1 text-xs">{{$key + 1}}.</span> {{$section->name}}</div>
                        <span class="text-sm font-normal text-gray-400 ">{{$section->lessons_count}} Lecciones</span>
                    </div>
                    <i class="fas  ml-auto text-base text-gray-700" :class="{ 'fa-sort-up' : $open , 'fa-sort-down' : !$open}"></i>
                </div>
                <ul class="bg-gray-50 transition-all ease-in-out max-h-0 duration-500 relative overflow-hidden" style="" x-ref="container{{$key + 1}}" x-bind:style="$open == true ? 'max-height: ' + $refs.container{{$key + 1}}.scrollHeight + 'px' : ''">
                    @foreach ($section->lessons as $index => $lesson)

                        <li class="flex py-3 px-4 {{($lesson->id == $current->id) ? "bg-secundary-100 bg-opacity-10" : ""}} hover:bg-secundary-100 hover:bg-opacity-15">
                            <div wire:click="ToogleCompleted({{$lesson}})" class="cursor-pointer mr-1">
                                    <i class="{{($lesson->completed) ? "fas fa-check-square  text-secundary-100" : "far fa-square text-gray-400"}} text-lg inline-block mr-2 mt-1 bg-white"></i>
                            </div>
                            <a class="cursor-pointer text-sm leading-tight w-full flex items-center" href="{{route('courses.lesson', [$course , $lesson])}}" >
                                <div class="flex-1">
                                    <div class="pb-2 text-gray-900 ">{{$lesson->name}}</div>
                                    <div class="text-xs text-gray-400">
                                        <i class="fas fa-play-circle mr-1 {{($lesson->id == $current->id) ? "text-secundary-100" : ""}} "></i><span>{{ gmdate("i:s", $lesson->duration)}} min</span>
                                    </div>
                                </div>
                                @if ($lesson->resource)
                                    <div>
                                        <a wire:click="download({{$lesson}})"  class="cursor-pointer flex text-xs items-center border border-gray-400 px-2 py-1 bg-white"><i class="fas fa-download text-gray-500 mr-2 "></i>Recursos</a>
                                    </div>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>
