<div>

    <h2 class="text-2xl font-bold"> Lecciones del curso</h2>
    <hr class="mt-2 mb-6">
    @foreach ($course->sections as $item)
        <article class="bg-white rounded-sm shadow-xs mb-6">
            <div class=" px-4 py-6 bg-gray-100">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="form-input w-full block" placeholder="Ingrese el nombre de la sección">
                        @error('section.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center" >
                        <h2><strong>Sección:</strong> {{$item->name}}</h2>
                        <div>
                            <i class="fas fa-edit cursor-pointer mr-2" wire:click="edit({{$item}})"></i>
                            <i class="fas fa-eraser cursor-pointer" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <div>
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </article>
    @endforeach
    <div  x-data="{$open: false}">
        <a x-show="!$open" class="flex items-center cursor-pointer" x-on:click="$open = true">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i> Agregar nueva sección
        </a>
        <article class="bg-white rounded-sm shadow-xs mb-6 mt-2" x-show="$open">
            <div class="px-4 py-6 bg-gray-100">
                <h2 class="text-xl font-bold mb-4">Agregar nueva sección</h2>
                <div>
                    <input wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la sección">
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end mt-2">
                    <button class="btn btn-danger" x-on:click="$open = false">Cancerlar</button>
                    <button class="btn btn-primary ml-4" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
