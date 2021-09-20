<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url, $duration;

    protected $rules = [
        'lesson.name' =>  'required',
        'lesson.platform_id' => 'required',
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        'lesson.duration' => 'required'
    ];

    public function mount(Section $section){
        $this->section = $section;
        $this->lesson = new Lesson();
        $this->platforms = Platform::all();
    }

    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }
    public function edit (Lesson $lesson){
        $this->resetValidation();
        $this->lesson = $lesson;
    }
    public function update (){
        if ($this->lesson->platform_id == 1) {
            $this->rules['lesson.url'] = ['required', 'regex:/(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:video\/|)(\d+)(?:|\/\?)/'];
        }
        $this->validate();
        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);
    }
    public function cancel(){
        $this->lesson = new Lesson();
    }
    public function store(){
        $rules = [
            'name' =>  'required',
            'platform_id' => 'required',
            'url' => ['required', 'regex:/(http|https)?:\/\/(www\.|player\.)?vimeo\.com\/(?:video\/|)(\d+)(?:|\/\?)/'],
            'duration' => 'required'
        ];

        if ($this->platform_id == 2) {
            $rules['url'] = ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'];
        }
        $this->validate($rules);
        
        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'duration' => $this->duration,
            'section_id' => $this->section->id
        ]);

        $this->reset(['name','platform_id','url', 'duration']);
        $this->section = Section::find($this->section->id);
    }
    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->section = Section::find($this->section->id);
    }
}
