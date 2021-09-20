<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\DiscountController;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;

Route::redirect('', 'instructor/courses');
Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware(['auth' , 'verified', 'can:Actualizar cursos'])->name('courses.curriculum');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->middleware(['auth' , 'verified'])->name('courses.goals');
Route::get('courses/{course}/students', CoursesStudents::class)->middleware(['auth' , 'verified', 'can:Actualizar cursos'])->name('courses.students');
Route::post('courses/{course}/status', [CourseController::class, 'status'])->middleware(['auth' , 'verified', 'can:Actualizar cursos'])->name('courses.status');
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->middleware(['auth' , 'verified', 'can:Actualizar cursos'])->name('courses.observation');
Route::resource('courses', CourseController::class)->middleware(['auth' , 'verified'])->names('courses');
Route::resource('discounts', DiscountController::class)->middleware(['auth' , 'verified'])->names('discounts');