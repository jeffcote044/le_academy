<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use App\Models\Course;
use App\Models\Section;
use  Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{

    use AuthorizesRequests;

    public $course, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Course $course){
        $this->course = $course;
        $this->resetSection();
        $this->authorize('dictated', $course);
    }
    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor.course', ['course' => $this->course]);
    }
    public function resetSection(){
        $this->section = new Section();
    }
    public function refreshCourse(){
        $this->course = Course::find($this->course->id);
    }
    public function edit(Section $section){
        $this->section = $section;
    }
    public function store(){
        $this->validate([
            'name' => 'required'
        ]);
        Section::create([
            'name' => $this->name,
            'course_id' => $this->course->id
        ]);
        $this->reset('name');
        $this->refreshCourse();
    }
    public function update(){
        $this->validate();
        $this->section->save();
        $this->resetSection();
        $this->refreshCourse();
    }
    public function destroy(Section $section){
        $section->delete();
        $this->refreshCourse();
    }
   
}
