<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Events\NewCommentEvent;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class NotificationController extends Controller
{
    public function index()
    {

        return view('notifications.index');

    }
    public function send(Request $request)
    {
        event(new NewCommentEvent("message"));
        return ["success" => true];
    }

    public function read(Request $request)
    {
        $notification = auth()->user()->notifications->find($request->id);
        $data = $notification->data;
        $course = Course::find($data['course']);
        $lesson = Lesson::find($data['lesson']);
        $notification->markAsRead();

        return redirect()->route('courses.lesson', [$course, $lesson]);
    }
}
