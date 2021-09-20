<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndividualCourseController extends Controller
{
    public function __invoke()
    {
        return view('individual.index');
    }
}
