<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class WebinarController extends Controller
{
    public function index(){
        return view('webinar.index');
    }

    public function replay(Course $course){
        $this->authorize('published', $course);

        return view('webinars.replay', compact('course'));
    }

}
