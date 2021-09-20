<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseFeatured extends Component
{
    public $course_data = "";
    public $show_preview = "false";

    public function render()
    {
        $courses = Course::where('status', 3)->orderBy('students_count', 'DESC')->get()->take(4);

        return view('livewire.course-featured', compact('courses'));
    }
    public function coursePreview($course_id){
        $this->course_data = Course::find($course_id);
        $this->tooglePreview();
    }

    public function tooglePreview(){
        ($this->show_preview == "true") ? $this->show_preview ="false" : $this->show_preview ="true";
    }
}
