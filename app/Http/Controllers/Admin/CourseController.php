<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::where('status', 2)->paginate(8);
        return view('admin.course.index', compact('courses'));
    }
    public function show(Course $course){
        
        $this->authorize('review', $course);

        return view('admin.course.show', compact('course'));
    }
    public function approved(Course $course){
        
        if ( $course->lessons == '[]' || $course->goals  == '[]' || $course->requirements  == '[]' || !$course->image) {
            return back()->with('info', 'No se puede publicar un curso incompleto');
        }
       
        $course->status = 3;
        $course->save();

        $mail = new ApprovedCourse($course);
        //Mail::to($course->teacher->email)->queue($mail);

        dispatch(function () use ($course, $mail) {
            Mail::to($course->teacher->email)->send($mail);
        })->afterResponse();

       return redirect()->route('admin.courses.index')->with('info', 'El curso se publicó con éxito');
    }

    public function observation(Course $course){
        return view('admin.course.observation', compact('course'));
    }

    public function reject(Request $request, Course $course){

        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());
        
        $course->status = 1;
        $course->save();

        $mail = new RejectCourse($course);
        dispatch(function () use ($course, $mail) {
            Mail::to($course->teacher->email)->send($mail);
        })->afterResponse();

       return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido rechzado con éxito');
    }
}
