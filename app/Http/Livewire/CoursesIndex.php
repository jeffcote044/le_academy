<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;

use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    
    public $category_id;
    public $category_name = 'Categoría';
    public $level_id;
    public $level_name = 'Nivel';
    public $course_data = "";
    public $show_preview = "false";
    public $perPage = 8;
    public $lastPage = 999;
    protected $listeners = [
        'load-more' => 'loadMore',
    ];

    public function render()
    {   
        $categories = Category::all();
        $levels = Level::all();
        $courses = Course::where('status', 3)
                            ->category($this->category_id)
                            ->level($this->level_id)
                            ->latest('id')
                            ->paginate($this->perPage);
        
        $this->lastPage = $courses->lastPage();

        return view('livewire.courses-index', compact('courses', 'categories', 'levels'));

    }
    public function loadMore() {
        
        $this->perPage = $this->perPage + 8;

    }

    public function coursePreview($course_id){
        $this->course_data = Course::find($course_id);
        $this->tooglePreview();
    }

    public function tooglePreview(){
        ($this->show_preview == "true") ? $this->show_preview ="false" : $this->show_preview ="true";
    }

    public function resetFilters()
    {
        $this->reset('category_id', 'level_id','category_name', 'level_name');
    }

    public function setLevelFilter($level_id, $level_name)
    {
        $this->level_id = $level_id;
        $this->level_name = $level_name;
    }

    public function setCategoryFilter($category_id, $category_name)
    {
        $this->category_id = $category_id;
        $this->category_name = $category_name;
    }

}
