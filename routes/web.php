<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndividualCourseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\WebinarController;
use App\Http\Livewire\CourseMasterclass;
use App\Http\Livewire\CourseStatus;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

use App\Mail\PurchasedCourse;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/old', HomeController::class)->name('home'); // middleware('subscription')

Route::get('/', function () {
    $course = Course::find(1);
    return redirect()->route('courses.buy', compact('course'));
})->name('home');

Route::get('blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('resources', function () {
    return view('resources.index');
})->name('resources.index');

Route::get('one-on-one', IndividualCourseController::class)->name('individual.courses');

Route::get('read-notification', [NotificationController::class, 'read'])->middleware(['auth' , 'verified'])->name('notifications.read');

Route::get('notify', [NotificationController::class, 'index'])->name('notifications.index');

Route::post('send-notification', [NotificationController::class, 'send'])->name('notifications.send');

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');

Route::get('{course}', [CourseController::class, 'show'])->name('courses.show');

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware(['auth' , 'verified'])->name('courses.enrolled');

Route::get('course/{course}',CourseStatus::class)->middleware(['auth' , 'verified'])->name('courses.status');

Route::get('course/{course}/lessons/{lesson}', CourseStatus::class)->middleware(['auth' , 'verified'])->name('courses.lesson');

Route::get('course/{course}/lessons/{lesson}/download', [CourseStatus::class, 'download'])->middleware(['auth' , 'verified'])->name('courses.resource');

Route::get('course/{course}/certificate', [PdfController::class, 'generatePdf'])->middleware(['auth' , 'verified'])->name('courses.certificate');

Route::get('{course}/comprar', [CourseController::class, 'buy'])->name('courses.buy');

Route::get('masterclass/{course}/replay', [CourseMasterclass::class, 'replay'])->name('masterclass.replay');
Route::get('masterclass/{course}/register', CourseMasterclass::class)->name('masterclass.register');
Route::get('masterclass/{course}/thanks', [CourseMasterclass::class, 'thanks'])->name('masterclass.thanks');


Route::get('x/send/{email}/{course}', function ($email, $course){

    $course = Course::find($course);

    $user = User::where('email', $email)->first();

    if($user){
        //Enviar Correo
        $mail = new PurchasedCourse($course, $user);
        Mail::to($user->email)->bcc('compras@pediatraleonardoescobar.com', 'Compras Leonardo Escobar')->send($mail);
        return 'Mensaje enviado';
    }else{
        return 'Usuario no encontrado';
    }
    //return view('mail.approved-purchase', compact('plan','user'));
})->name('sendmail');
