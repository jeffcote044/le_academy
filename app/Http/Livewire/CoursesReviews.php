<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Review;
use Livewire\Component;

class CoursesReviews extends Component
{
    public $course_id , $comment, $rating, $showUpdate = false;

    protected $rules = [
        'rating' => 'required',
        'comment' => 'required|min:6',
    ];

    public function mount(Course $course){
        $this->course_id = $course->id;
    }

    public function render()
    {
        $course = Course::find($this->course_id);

        return view('livewire.courses-reviews', compact('course'));
    }

    public function setReview($review){
        $this->rating = $review['rating'];
        $this->comment = $review['comment'];
    }

    public function store(){
        $this->validate();
        $course = Course::find($this->course_id);
        $course->reviews()->create([
            'comment' => $this->comment,
            'rating' => $this->rating,
            'user_id' => auth()->user()->id
        ]);
    }

    public function update(Review $review){
        
        $this->validate();
        $review->comment = $this->comment;
        $review->rating = $this->rating;
        $review->updated_at = date('Y-m-d G:i:s');
        $review->save();
        $this->showUpdate = false;
    }
}
