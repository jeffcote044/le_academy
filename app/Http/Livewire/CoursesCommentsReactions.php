<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Reaction;
use Livewire\Component;

class CoursesCommentsReactions extends Component
{
    public $reaction_id , $likes, $dislikes, $liked, $disliked, $comment_id, $comment;

    public function mount(Comment $comment){

        $this->comment_id = $comment->id;
         
        $this->comment = $comment::find($this->comment_id);

        $this->likes = $this->comment->reactions()->where('value', 1)->count();
        $this->dislikes = $this->comment->reactions()->where('value', 2)->count();

        $this->liked = $this->comment->reactions->where('value', 1)->contains('user_id', auth()->user()->id);
        $this->disliked = $this->comment->reactions->where('value', 2)->contains('user_id', auth()->user()->id);

    }

    public function render()
    {
        return view('livewire.courses-comments-reactions');
    }

    public function like(){
        

        if ($this->liked) {
            return false;
        }else{
            $this->liked = true;
        }
        
        if($this->disliked){
            $this->undoDislike();
        }
        

        $this->comment->reactions()->create([
            'value' => 1,
            'reactionable_id' => $this->comment_id,
            'user_id' => auth()->user()->id
        ]);
        $this->likes = $this->comment->reactions()->where('value', 1)->count();
    }

    public function dislike(){
        

        if ($this->disliked) {
            return false;
        }else{
            $this->disliked = true;
        }
        
        if($this->liked){
            $this->undoLike();
        }

        $this->comment->reactions()->create([
            'value' => 2,
            'reactionable_id' => $this->comment_id,
            'user_id' => auth()->user()->id
        ]);
        $this->dislikes = $this->comment->reactions()->where('value', 2)->count();
    }

    public function undoLike(){
        $this->comment->reactions()->where('user_id', auth()->user()->id)
            ->where('reactionable_id', $this->comment_id)->delete();
            $this->liked = false;
            $this->likes = $this->comment->reactions()->where('value', 1)->count();
    }

    public function undoDislike(){
        $this->comment->reactions()->where('user_id', auth()->user()->id)
            ->where('reactionable_id', $this->comment_id)->delete();
            $this->disliked = false;
            $this->dislikes = $this->comment->reactions()->where('value', 2)->count();
    }

}
