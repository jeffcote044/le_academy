<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!--Include the Vimeo API Library-->
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
        @isset($headJs)
            {{$headJs}}
        @endisset
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @livewire('navigation-dropdown')
            <!-- Page Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-2 relative">
                <div class="relative">
                    <aside class="sticky top-2 z-5 md:flex flex-col md:flex-row md: min-h-screen w-full mt-4">
                        <div @click.away="open = false" class="flex flex-col w-full md:w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
                        <div class="flex-shrink-0 px-4 py-4 flex flex-row items-center justify-between">
                            <a  class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Editar Curso</a>
                            <button class=" md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            </button>
                        </div>
                        <nav :class="{'block': open, 'hidden': !open}" class=" pb-4 md:block px-4 md:pb-0 md:overflow-y-auto">
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 @routeIs ('instructor.courses.edit', $course) bg-gray-200  @endif   rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('instructor.courses.edit', $course)}}">Información</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent  @routeIs ('instructor.courses.curriculum', $course) bg-gray-200  @endif  rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('instructor.courses.curriculum', $course)}}">Lecciones</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent @routeIs ('instructor.courses.goals', $course) bg-gray-200  @endif rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('instructor.courses.goals', $course)}}">Metas</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent @routeIs ('instructor.courses.students', $course) bg-gray-200  @endif rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('instructor.courses.students', $course)}}">Estudiantes</a>
                            @if ($course->observation)
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent @routeIs ('instructor.courses.observation', $course) bg-gray-200  @endif rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('instructor.courses.observation', $course)}}">Observaciones</a>
                            @endif
                        </nav>
                       <div class="px-4 mt-4">
                        @switch($course->status)
                            @case(1)
                                <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-400 font-bold rounded-md py-2 text-white w-full">Solicitar revisión</button>
                                </form>
                            
                                @break
                            @case(2)
                                <p class="bg-gray-400 font-bold rounded-md py-2 text-white w-full text-center">En revisión</p>
                                @break
                            @case(3)
                            <p class="bg-green-400 font-bold rounded-md py-2 text-white w-full text-center">Publicado</p>
                                @break
                            @default
                                
                        @endswitch
                       </div>
                        </div>
                    </aside>
                </div>
                <div class=" col-span-3">
                    <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                        <main class="p-6 text-gray-600" >
                           {{$slot}}
                        </main>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @stack('modals')
        @livewireScripts

        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
