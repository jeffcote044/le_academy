<div>
    <div class="bg-gray-200 py-4">
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex relative md:static">
            <button class="bg-white text-xs md:text-base shadow h-12 px-4 rounded-lg outline-zero text-gray-700 mr-4 focus:outline-none" wire:click="resetFilters">
                <i class="fas fa-list text-sm  md:mr-2"></i>
                <span class="hidden md:inline">Todos los cursos</span>
            </button>
            <!-- Dropdown Categories-->
            <div class="md:relative mr-4" x-data="{$open : false}">
                <button class="overflow-hidden nowrap overflow-ellipsis px-4 text-xs md:text-base text-gray-700 block h-12 rounded-lg outline-zero  focus:outline-none bg-white shadow" x-on:click="$open = !$open">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    <span class="">{{$category_name}}</span>
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-full md:w-56 mt-4 md:mt-2 py-0 bg-white border rounded shadow-xl z-20" x-show="$open" x-on:click.away="$open = false">   
                    @foreach ($categories as $category)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-secundary-700 hover:text-white" wire:click="setCategoryFilter({{ $category->id }}, '{{ $category->name }}')" x-on:click="$open = false"><i class="far fa-circle text-gray-300 mr-2"></i> {{$category->name}}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown Categories-->
             <!-- Dropdown Level-->
             <div class="md:relative" x-data="{$open : false}">
                <button class="overflow-hidden nowrap overflow-ellipsis px-4 text-xs md:text-base text-gray-700 block h-12 rounded-lg outline-zero  focus:outline-none bg-white shadow" x-on:click="$open = !$open">
                    <i class="fas fa-signal text-sm mr-2"></i>
                    <span class="">{{$level_name}}</span>
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-full md:w-56 mt-4 md:mt-2 py-0 bg-white border rounded shadow-xl z-20" x-show="$open" x-on:click.away="$open = false">   
                    @foreach ($levels as $level)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-secundary-700 hover:text-white" wire:click="setLevelFilter({{ $level->id }}, '{{ $level->name }}')" x-on:click="$open = false"><i class="far fa-circle text-gray-300 mr-2"></i>{{$level->name}}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->
        </div>
    </div>
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 md:gap-x-6 gap-y-8 ">
            <x-stars-svg/>
            @forelse ($courses as $course)
                <x-course-card :course="$course"/>
                @empty
                <p class="text-base -text-gray-700 whitespace-no-wrap">Opps! no encontramos lo que buscabas intenta con otro filtro</p>
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 text-center">
            @if ($lastPage && $lastPage != 1)
                <button wire:click="loadMore()" class="inline-block text-center text-xl mt-4 outline-zero border-secundary-700 text-secundary-700 font-bold py-2 px-4 rounded-full transition duration-300 ease select-none hover:bg-secundary-700 border hover:text-gray-50" >Mostrar más cursos</button> 
            @endif
            {{--$courses->links()--}}
        </div>
    </section>
    <x-course-preview :course="$course_data" :show="$show_preview"/>

    <script type="text/javascript">
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight -1) {
                window.livewire.emit('load-more');
            }
        };
    </script>

</div>