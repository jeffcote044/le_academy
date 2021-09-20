<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off" wire:submit.prevent x-data="{ $show: true }" >
    <input class="w-full mt-2 bg-white h-10 px-10 rounded-full outline-zero text-base focus:outline-none focus:rounded-tr-full focus:shadow-lg"
        type="search" name="search" placeholder="Buscar cursos..." wire:model="search" x-on:input="$show = true">
        <i class="fas fa-search absolute left-0 top-6/12 ml-4 text-gray-400"></i>
   @if ($search)
        <ul class="absolute left-0 w-full bg-white mt-1 rounded-xl overflow-hidden z-10 shadow-lg" x-show="$show" x-on:click.away="$show = false">
            @foreach ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-200 whitespace-no-wrap overflow-hidden truncate">
                    <a href="{{route('courses.show', $result)}}"> <i class="fas fa-search mr-2 text-gray-400"></i> {{$result->title}}</a>
                </li>
            @endforeach
        </ul>
   @endif
</form>