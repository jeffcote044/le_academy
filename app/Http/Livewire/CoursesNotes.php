<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use App\Models\Note;
use Livewire\Component;

class CoursesNotes extends Component
{

    public $lesson_id , $note;

    protected $validationAttributes = [
        'note' => 'Nota'
    ];

    public function mount(Lesson $lesson){
        $this->lesson_id = $lesson->id;
        
    }

    public function render()
    {
        $lesson = Lesson::find($this->lesson_id);
        return view('livewire.courses-notes', compact('lesson'));
    }

    public function store(){

        $this->validate([
            'note' => 'required|min:6'
        ]);

        $lesson = Lesson::find($this->lesson_id);
        $lesson->notes()->create([
            'name' => $this->note,
            'user_id' => auth()->user()->id
        ]);
        $this->reset('note');
    }
    
    public function destroy(Note $note){
        $note->delete();
    }

}
