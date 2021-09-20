<div>
    <div class="bg-white shadow-xs overflow-hidden rounded-xl px-5 py-6 mb-6" x-data="{$open : false}">
        <div class="flex">
            <figure class="">
                <img class="w-12 h-12 rounded-full object-cover" src="{{auth()->user()->profile_photo_url}}" alt="">
            </figure>
            <div class="ml-4 w-full">
                <textarea wire:model="lessonComment.name" class="form-input w-full h-10 max-h-60 text-sm overflow-hidden @error('lessonComment') border-red-500 @enderror" rows="3" placeholder="¿Quieres hacer una pregunta?"></textarea>
                @error('lessonComment.name') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex items-end">
            <button wire:click="storeComment" class="w-full md:w-auto ml-auto outline-zero text-center inline-block mt-2 font-bold px-8 py-2 text-sm border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700">Publicar pregunta</button>
        </div>
    </div>
    @forelse ($lesson->comments->reverse() as $index => $comment)
        <div class="bg-white shadow-xs overflow-hidden rounded-xl px-5 py-6 mb-6" x-data="{$open : false}">
            <div class="flex">
                <figure class="w-12 h-12 rounded-full overflow-hidden">
                    <img class="w-full" src="{{$comment->user->profile_photo_url}}" alt="">
                </figure>
                <div class="ml-4">
                    <p class="font-semibold text-gray-700">{{$comment->user->name}}</p>
                    <small class="text-gray-500">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}</small>
                </div>
            </div>
            <div class="mt-3 text-gray-600 text-base" >
                <p>{{$comment->name}}</p>
            </div>
            <div class="mt-4 flex flex-wrap items-center text-gray-500 text-sm border-t border-gray-100 pt-4">
                
                @php
                    $comment_id = $comment->id;
         
                    $commentario = $comment::find($comment_id);
            
                    $likes = $commentario->reactions()->where('value', 1)->count();
                    $dislikes = $commentario->reactions()->where('value', 2)->count();
            
                    $liked = $commentario->reactions->where('value', 1)->contains('user_id', auth()->user()->id);
                    $disliked = $commentario->reactions->where('value', 2)->contains('user_id', auth()->user()->id);
                @endphp
                <div>
                    @if ($liked)
                    
                    <button class="mr-6 outline-zero" wire:click="undoLike({{$commentario}})">
                        <p> <i class="fas fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Te gustó</span>  </p>
                    </button>
                    @else
                    <button class="mr-6 outline-zero" wire:click="like({{$commentario}})">
                        <p> <i class="far fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Me gusta </span>  </p>
                    </button>
                    @endif
                
                    @if ($disliked)
                    <button class="mr-6 outline-zero" wire:click="undoDislike({{$commentario}})">
                        <p> <i class="fas fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No te gustó</span>  </p>
                    </button>
                    @else
                    <button class="mr-6 outline-zero" wire:click="dislike({{$commentario}})">
                        <p> <i class="far fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No me gusta </span>  </p>
                    </button>
                    @endif
                    
                </div>

                <button class="mr-6 outline-zero w-full md:w-auto mt-4 md:mt-0 text-left" x-on:click="$open = !$open" >
                    <p> <i class="far fa-comment mr-1"></i> {{$comment->comments->count()}} <span class="ml-1"> Respuestas</span>  </p>
                </button>

            </div>
            <div class="mt-6" x-show="$open">
                @forelse ($comment->comments as $key => $response)
                    <div class="mt-6">
                        <div class="flex">
                            <figure class="w-8 h-8 rounded-full overflow-hidden">
                                <img class="w-full object-fill" src="{{$response->user->profile_photo_url}}" alt="">
                            </figure>
                            <div class="ml-4">
                                <div class="bg-gray-50 rounded-xl shadow-xs px-6 py-4 max-w-xl text-sm">
                                    <div class="flex items-center text-xs">
                                        <p class="font-semibold text-gray-700">{{$response->user->name}}</p>
                                        <small class="text-gray-500 ml-3">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($response->created_at))->diffForHumans() }}</small>
                                    </div>
                                    <p class="text-gray-600 mt-2">{{$response->name}}</p>
                                </div>
                                <div class="mt-1 flex items-center text-gray-500 text-xs pt-2">
                                    @php
                                        $response_id = $response->id;
                            
                                        $respuesta = $response::find($response_id);
                                
                                        $likes = $respuesta->reactions()->where('value', 1)->count();
                                        $dislikes = $respuesta->reactions()->where('value', 2)->count();
                                
                                        $liked = $respuesta->reactions->where('value', 1)->contains('user_id', auth()->user()->id);
                                        $disliked = $respuesta->reactions->where('value', 2)->contains('user_id', auth()->user()->id);
                                    @endphp
                                    <div>
                                        @if ($liked)
                                        
                                        <button class="mr-6 outline-zero" wire:click="undoLike({{$respuesta}})">
                                            <p> <i class="fas fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Te gustó</span>  </p>
                                        </button>
                                        @else
                                        <button class="mr-6 outline-zero" wire:click="like({{$respuesta}})">
                                            <p> <i class="far fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Me gusta </span>  </p>
                                        </button>
                                        @endif
                                    
                                        @if ($disliked)
                                        <button class="mr-6 outline-zero" wire:click="undoDislike({{$respuesta}})">
                                            <p> <i class="fas fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No te gustó</span>  </p>
                                        </button>
                                        @else
                                        <button class="mr-6 outline-zero" wire:click="dislike({{$respuesta}})">
                                            <p> <i class="far fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No me gusta </span>  </p>
                                        </button>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-xs text-gray-400" ><i class="far fa-comment mr-1"></i> Escribele una respuesta a {{$comment->user->name}}</div>
                @endforelse
                <div class="mt-6">
                    <div class="flex">
                        <figure class="w-8 h-8 rounded-full overflow-hidden">
                            <img class="w-full object-fill" src="{{auth()->user()->profile_photo_url}}" alt="">
                        </figure>
                        <div class="ml-4 w-full">
                            <div class="">
                                <textarea wire:model="commentResponse.{{ $index }}.name" class="form-input w-full h-10 max-h-60 text-sm overflow-hidden  @error('commentResponse.*.name') border-red-500 @enderror" rows="3" placeholder="Escribe una respuesta..."></textarea>
                                @error('commentResponse.*.name') <span class="error text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex items-end">
                                <button wire:click="storeResponse({{$comment}})" class="ml-auto outline-zero text-center inline-block mt-2 font-bold px-8 py-2 text-xs border border-secundary-700 bg-secundary-700 text-gray-50 rounded-full transition duration-300 ease select-none hover:bg-transparent hover:text-secundary-700">Responder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        
    @endforelse
</div>
