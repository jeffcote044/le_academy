<div>
    @if ($liked)
    
    <button class="mr-6 outline-zero" wire:click="undoLike">
        <p> <i class="fas fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Te gustó</span>  </p>
    </button>
    @else
    <button class="mr-6 outline-zero" wire:click="like">
        <p> <i class="far fa-thumbs-up mr-1"></i> {{$likes}} <span class="ml-1"> Me gusta </span>  </p>
    </button>
    @endif

    @if ($disliked)
    <button class="mr-6 outline-zero" wire:click="undoDislike">
        <p> <i class="fas fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No te gustó</span>  </p>
    </button>
    @else
    <button class="mr-6 outline-zero" wire:click="dislike">
        <p> <i class="far fa-thumbs-down mr-1"></i> {{$dislikes}} <span class="ml-1"> No me gusta </span>  </p>
    </button>
    @endif
    
</div>
