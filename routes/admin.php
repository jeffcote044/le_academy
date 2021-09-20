<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\PriceController;

Route::get('', [HomeController::class, 'index'])->middleware(['auth' , 'verified', 'can:Ver dashboard'])->name('home');

Route::get('courses', [CourseController::class, 'index'])->middleware(['auth' , 'verified'])->name('courses.index');

Route::get('courses/{course}', [CourseController::class, 'show'])->middleware(['auth' , 'verified'])->name('courses.show');

Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->middleware(['auth' , 'verified'])->name('courses.approved');

Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->middleware(['auth' , 'verified'])->name('courses.observation');

Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->middleware(['auth' , 'verified'])->name('courses.reject');

Route::resource('roles', RoleController::class)->middleware(['auth' , 'verified'])->names('roles');

Route::resource('users', UserController::class)->middleware(['auth' , 'verified'])->only(['index','edit','update',])->names('users');

Route::resource('categories', CategoryController::class)->names('categories');

Route::resource('levels', LevelController::class)->names('levels');

Route::resource('prices', PriceController::class)->names('prices');