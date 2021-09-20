<div>
    <div class="bg-white shadow-xs overflow-hidden rounded-xl px-5 py-6 mb-6" x-data="{$open : false}">
        <div class="flex">
            <figure class="">
                <img class="w-12 h-12 rounded-full overflow-hidden object-cover" src="{{auth()->user()->profile_photo_url}}" alt="">
            </figure>
            <div class="ml-4 w-full">
                <textarea id="note" wire:model="note" rows="2" class="form-input w-full max-h-60 text-sm overflow-hidden @error('note') border-red-500 @enderror" rows="3" placeholder="¿Quieres agregar una nota de esta lección?"></textarea>
                @error('note') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-end">
            <button wire:click="store" class="w-full md:w-auto ml-auto outline-zero text-center inline-block mt-2 font-bold px-8 py-2 text-sm border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700">Crear nota</button>
        </div>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold" >Tus notas de {{$lesson->name}}</h3>
        <p class="text-gray-500 text-sm"><i class="fas fa-graduation-cap mr-1"></i> Curso {{$lesson->section->course->title}}</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-6">

    @forelse ($lesson->notes->where('user_id', auth()->user()->id)->reverse() as $index => $note)
        <div class=" overflow-hidden rounded-xl shadow-xs p-6 bg-white relative">
            <i class="fas fa-times absolute right-0 top-0 mt-2 mr-4 text-gray-400 cursor-pointer" title="Borrar nota" wire:click="destroy({{$note}})"></i>
            <div>
                <small class="text-gray-500"><i class="far fa-clock mr-1"></i> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($note->created_at))->diffForHumans() }}</small>
            </div>
            <p class="mt-3 text-sm" >{{$note->name}}</p>
        </div>
    @empty
        <p class="text-sm text-gray-400">Aún no tienes notas de esta lección...</p>
    @endforelse
    </div>
</div>
