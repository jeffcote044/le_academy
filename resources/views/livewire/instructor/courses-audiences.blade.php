<section>
    <h2 class="text-2xl font-bold">Audiencia del Curso</h2>
    <hr class="mt-2 mb-6">

    @foreach ($course->audiences as $item)
        <article class="shadow rounded-sm bg-white mb-4">
            <div class="bg-gray-100 px-2 py-6">
                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full" />
                        @error('audience.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h2>{{$item->name}}</h2>
                    <div>
                            <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{$item}})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                    </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach
    <article class="shadow rounded-sm bg-white mb-4">
        <div class="bg-gray-100 px-2 py-6">
            <form wire:submit.prevent="store">
                <input wire:model="name" class="form-input w-full" placeholder="Escribe algo...">
                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </article>
</section>