<div>
    @foreach ($section->lessons as $item)
    <article class="bg-white rounded-sm shadow-xs mt-4 mb-6" x-data="{$open:false}">
        <div class=" px-4 py-6 bg-white">   
            @if ($lesson->id == $item->id)
                <form wire:submit.prevent="update">
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="lesson.name" class="form-input w-full">
                    </div>
                    @error('lesson.name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center mt-4">
                        <label class="w-32">Url:</label>
                        <input wire:model="lesson.url" class="form-input w-full">
                    </div>
                    @error('lesson.url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Duración en segundos:</label>
                        <input wire:model="lesson.duration" class="form-input w-full">
                    </div>
                    @error('lesson.duration')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror


                    <div class="mt-4 flex justify-end">
                        <button type="button" class="mr-2" wire:click="cancel">Cancelar</button>
                        <button type="submit">Actualizar</button>
                    </div>
                </form>
            @else    
                <header>
                    <h2 class="cursor-pointer" x-on:click="$open = !$open"><i class="far fa-play-circle text-blue-500 mr-1"></i> Lección {{$item->name}}</h2>
                </header>
                <div x-show="$open">
                    <hr class="my-2">
                    <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                    <p class="text-sm">Enlace: <a href="{{$item->url}}" target="_blank" class="text-blue-500">{{$item->url}}</a></p>
                    <div class="mt-2">
                        <button class="btn btn-primary text-sm mr-2" wire:click="edit({{$item}})">Editar</button>
                        <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                    </div>
                    <div class="my-4">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-'.$item->id))
                    </div>
                    <div>
                        @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-'.$item->id))
                    </div>
                </div>
            @endif
        </div>
    </article>
    @endforeach
    <div  x-data="{$open: false}">
        <a x-show="!$open" class="flex items-center cursor-pointer" x-on:click="$open = true">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i> Agregar nueva lección
        </a>
        <article class="bg-white rounded-sm shadow-xs mb-6 mt-2" x-show="$open">
            <div class="px-4 py-6 bg-white">
                <h2 class="text-xl font-bold mb-4">Agregar nueva lección</h2>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input wire:model="name" class="form-input w-full">
                    </div>
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Plataforma:</label>
                        <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Url:</label>
                        <input wire:model="url" class="form-input w-full">
                    </div>
                    @error('url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Duración en segundos:</label>
                        <input wire:model="duration" class="form-input w-full">
                    </div>
                    @error('duration')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
    
                    <div class="mt-4 flex justify-end">
                        <button class="mr-2" x-on:click="$open = false">Cancelar</button>
                        <button wire:click="store">Agregar</button>
                    </div>
                </div>
            </div>
        </article>
    </div>
    
</div>
