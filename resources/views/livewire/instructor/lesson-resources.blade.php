<div class="bg-white rounded-sm shadow" x-data="{$open: false}">
    <div class="px-4 py-6 bg-gray-100">
       <header>
            <h2 class="cursor-pointer" x-on:click="$open = !$open">Recursos de la lección</h2>
       </header>
       <div x-show="$open">
           <hr class="my-2">
           @if ($lesson->resource)
                <div class="flex justify-between items-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
                </div>
           @else
               <form wire:submit.prevent="save">
                <div class="flex items-center">
                    <input wire:model="file" type="file" class="form-input flex-1">
                    <button type="submit" class="ml-2"><span wire:loading.remove wire:target="file">Guardar</span> <span wire:loading wire:target="file">Cargando...</span></button>
                </div>
                @error('file')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>
           @endif
       </div>
    </div>
</div>
