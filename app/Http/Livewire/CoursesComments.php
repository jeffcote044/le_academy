<?php

namespace App\Http\Livewire;

use App\Events\NewCommentEvent;
use App\Events\NewResponseEvent;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Reaction;
use App\Models\User;
use App\Notifications\CommentNotification;
use Livewire\Component;

class CoursesComments extends Component
{
    public $lesson_id , $lessonComment , $commentResponse;

    public $reaction_id , $likes, $dislikes, $liked, $disliked, $comment_id, $comment;

    protected $validationAttributes = [
        'commentResponse.*.name' => 'Respuesta',
        'lessonComment.name' => 'Pregunta'
    ];

    public function updated($field){
        $this->validateOnly($field,[
            'lessonComment.name' => 'required|min:2'
        ]);
    }

    public function mount(Lesson $lesson){
        $this->lesson_id = $lesson->id;
        
    }

    public function render()
    {
        
        $lesson = Lesson::find($this->lesson_id);
        return view('livewire.courses-comments', compact('lesson'));
    }

    public function storeComment(){

        $this->validate([
            'lessonComment.name' => 'required|min:2'
        ]);


       

        $lesson = Lesson::find($this->lesson_id);
        $comment = $lesson->comments()->create([
            'name' => $this->lessonComment['name'],
            'user_id' => auth()->user()->id
        ]);
    
        /**
         * Notify Event
         */ 
        event(new NewCommentEvent($comment));
        $this->reset('lessonComment');
    }

    public function storeResponse(Comment $comment){
        
        
        if ($this->commentResponse) {

            foreach ($this->commentResponse as $response) {

                $this->validate([
                    'commentResponse.*.name' => 'required|min:6'
                ]);
    
                $commentResponse = $comment->comments()->create([
                    'name' => $response['name'],
                    'user_id' => auth()->user()->id
                ]);

                
            }
            /**
             * Notify Event
             */ 
            event(new NewResponseEvent($commentResponse, $comment->commentable->section->course->teacher));

            $this->reset('commentResponse');
        }
        
    }

    public function like(Comment $comment){
        

        
        $this->liked = true;
        
        $this->resetReactions($comment);
        
        $comment->reactions()->create([
            'value' => 1,
            'reactionable_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        $this->likes = $comment->reactions()->where('value', 1)->count();
    }

    public function dislike(Comment $comment){
        

        $this->disliked = true;
        
        $this->resetReactions($comment);

        $comment->reactions()->create([
            'value' => 2,
            'reactionable_id' => $comment->id,
            'user_id' => auth()->user()->id
        ]);
        $this->dislikes = $comment->reactions()->where('value', 2)->count();
    }

    public function undoLike(Comment $comment){
        $this->resetReactions($comment);
        $this->liked = false;
        $this->likes = $comment->reactions()->where('value', 1)->count();
    }

    public function undoDislike(Comment $comment){
        $this->resetReactions($comment);
        $this->disliked = false;
        $this->dislikes = $comment->reactions()->where('value', 2)->count();
    }
    public function resetReactions(Comment $comment){
        $comment->reactions()->where('user_id', auth()->user()->id)
        ->where('reactionable_id', $comment->id)->delete();
    }
}
