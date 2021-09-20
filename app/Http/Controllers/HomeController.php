<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Review;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $reviews = Review::where('rating', '5')
        ->orWhere('rating','4')
        ->get()
        ->random(8)
        ;
        //$courses = Course::where('status', '3')->latest('id')->get()->take(8);

        return view('welcome', compact('categories', 'reviews'));
    }
}
