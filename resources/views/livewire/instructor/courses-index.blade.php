<x-table-responsive>
    <div class="px-6 py-4 flex items-center bg-white">
        <input wire:model="search" wire:keydown="clear_page" class="form-input flex-1 shadow-sm" placeholder="Buscardor de cursos">
        <a class="ml-2 py-2 px-4 bg-red-500 rounded-sm text-white font-bold" href="{{route('instructor.courses.create')}}">Crear curso</a>
    </div>
    @if ($courses->count())      
        <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Curso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Alumnos
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Califición
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Estado
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <x-stars-svg/>
            @foreach ($courses as $course)    
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            @isset($course->image)
                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                            @else
                            <img class="h-10 w-10 rounded-full object-cover object-center" src="" alt="">                                    
                            @endisset
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{$course->title}}</div>
                            <div class="text-sm text-gray-500">{{$course->category->name}}</div>
                        </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 flex items-center">
                            @if (! $course->rating == 0)
                        
                            <ul class="flex text-sm items-center ml-2">
                                <li class="mr-1 flex items-center">
                                    <p class="text-base mr-1 text-red-500 font-extrabold">{{number_format($course->rating, 1)}}</p>
                                    <svg class="h-4 w-20">
                                        <use xlink:href="#stars-{{round($course->rating / $nearest = 5, 1)* $nearest}}-star">
                                    </svg>
                                    <span class="text-gray-400 text-sm ml-1 mr-2">({{$course->reviews_count}})</span>
                                </li>
                            </ul>
                            @else
                            <span class="pl-2 text-gray-400" >Sin calificaciones</span>
                        @endif
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">

                        @switch($course->status)
                            @case(1)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Borrador</span>
                                @break
                            @case(2)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Revision</span>
                                @break
                            @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Publicado</span>
                                @break
                            @default
                                
                        @endswitch
                        
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                    </td>
                </tr>
            @endforeach
            <!-- More rows... -->
        </tbody>
        </table>
        <div class="px-6 py-4">{{$courses->links()}}</div>
    @else
        <div class="px-6 py-4">
            <strong>No se contratron cursos para tu búsqueda...</strong>
        </div>
    @endif
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-8 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Ready to dive in?</span>
            <span class="block text-indigo-600">Start your free trial today.</span>
        </h2>
        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Get started
            </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                Learn more
            </a>
            </div>
        </div>
        </div>
    </div>

</x-table-responsive>