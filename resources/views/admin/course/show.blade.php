<x-app-layout>
    <section class="bg-gray-500 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt=""/>
                @else
                    <img class="h-60 w-full object-cover" src="" alt=""/>
                @endif
            </figure>
            <div class="text-white">
                <hgroup class="mb-3">
                    <h1 class="text-4xl">{{$course->title}}</h1>
                    <h3 class="text-xl">{{$course->subtitle}}</h3>
                </hgroup>
                <div>
                    <p class="mb-2"><i class="mr-2 fas fa-chart-line"></i>Nivel: {{$course->level->name}}</p>
                    <p class="mb-2"><i class="mr-2 fas fa-tag"></i>Categoría: {{$course->category->name}}</p>
                    <p class="mb-2"><i class="mr-2 fas fa-users"></i>Matriculados: {{$course->students_count}}</p>
                    <p class="mb-2"><i class="mr-2 fas fa-star"></i>Calificación: {{$course->rating}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3 gap-x-6">

        @if (session('info'))
            <div class="col-span-3" x-data="{$open: true}" x-show="$open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Oops! Ocurrio un error</strong>
                        <span class="block sm:inline">{{session('info')}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg x-on:click="$open = false" class="fill-current h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            </div>
        @endif

        <div class="col-span-2">
            <section class="bg-white shadow p-8 mb-6">
                <header>
                    <h3 class="font-bold text-xl mb-2">Lo que aprenderás</h3>
                </header>
                <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                    @forelse ($course->goals as $goal)
                        <li class="text-gray-700 text-base"><i class="fas fa-check mr-2"></i>{{$goal->name}}</li>
                        @empty
                        <li class="text-gray-700 text-base"><i class="fas fa-check mr-2"></i>No se han agreado metas a este curso</li>
                    @endforelse
                </ul>
            </section>
            <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">Contenido</h3>
                </header>
                <div>
                    @foreach ($course->sections as $section)
                        <article class="mb-4 shadow" @if ($loop->first)
                            x-data="{$open : true}"
                            @else
                            x-data="{$open : false}"
                        @endif
                         >
                            <header class="border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="$open = !$open">
                                <h2 class="font-bold text-lg text-gray-600">{{$section->name}}</h2>
                            </header>
                            <div class="bg-white py-2 px-4" x-show="$open">
                                <ul>
                                    @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base mb-4 "><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{$lesson->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
            <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">Requisitos</h3>
                </header>
                <div>
                    <ul class="list-disc list-inside">
                        @foreach ($course->requirements as $requirement)
                            <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="mb-8">
                <header>
                    <h3 class="font-bold text-3xl mb-2">Descripción</h3>
                </header>
                <div>
                    <p class="text-gray-700 text-base">
                        {!!$course->description!!}
                    </p>
                </div>
            </section>
        </div>
        <div>
            <section class="bg-white shadow p-8 mb-6">
                <div class="flex items-center">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                    <div class="ml-4">
                        <h2 class="font-bold text-gray-500 text-xl">Creado por: {{$course->teacher->name}}</h2>
                        <a class="text-blue-400 text-sm font-bold" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>
                    <form action="{{route('admin.courses.approved',  $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-default block w-full px-4 py-2 mt-4 text-center bg-blue-400 text-white font-bold text-lg">Aprovar curso</button>
                    </form>
                    <div>
                        <a href="{{route('admin.courses.observation', $course)}}" class="btn btn-default block w-full px-4 py-2 mt-4 text-center bg-red-400 text-white font-bold text-lg">Hacer Obervación</a>
                    </div>
            </section>
        </div>
    </section>
</x-app-layout>