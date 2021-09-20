<?php

namespace App\Http\Livewire;

use App\Events\NewCommentEvent;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;


class CourseStatus extends Component
{
    use AuthorizesRequests;


    public $course, $lesson, $current;

    public function mount(Course $course, Lesson $lesson){
        $this->course = $course;
        $this->lesson = $lesson;
        
        if ($this->lesson->id != null) {

            if ($course->lessons->contains($lesson)) {
                $this->current = $lesson;
            } else{
                $this->setCurrent();
            }
        }
        else{
            $this->setCurrent();
        }
        
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }


        $this->authorize('enrolled',$course);
        //$this->authorize('lessonBelongsToCourse',[$course, $lesson]);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Métodos
    
    public function setCurrent(){
        foreach($this->course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
                break;
            }
        }
        if (!$this->current) {
            $this->current = $this->course->lessons->last();
        }
    
        return redirect()->route('courses.lesson', [$this->course, $this->current]);
    }
    
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
        return redirect()->route('courses.lesson', [$this->course, $lesson]);
    }

    public function ToogleCompleted(Lesson $lesson){

        if ($lesson->completed) {
            //Eliminar Registro Completado
            $lesson->users()->detach(auth()->user()->id);
        }
        else{
            //Agregar Registro Completado
            $lesson->users()->attach(auth()->user()->id);
        }

        $lesson = Lesson::find($lesson->id);
        $this->course = Course::find($this->course->id);
    }

    public function completed(){

        if (!$this->current->completed) {
            $this->current->users()->attach(auth()->user()->id);
        }
        
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades Computadas
    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }
        else{
           return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->course->lessons->count()-1) {
           return null;
        }
        else{
           return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
       $i = 0;
       foreach ($this->course->lessons as $lesson) {
            if($lesson->completed){
                $i++;
            }
       }
       $advance = ($i*100)/($this->course->lessons->count());
       return round($advance, 2);
    }

    public function getCompletedProperty(){
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
             if($lesson->completed){
                 $i++;
             }
        }
        return $i;
     }


    public function download(Lesson $lesson){
        return response()->download(storage_path('app/public/'. $lesson->resource->url));
    }
}
