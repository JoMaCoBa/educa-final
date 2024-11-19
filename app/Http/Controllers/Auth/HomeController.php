<?php

namespace App\Http\Controllers\Auth;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;

class HomeController extends Controller
{

    public function __construct ()
    {
        $this->middleware('auth');
    }

    public function index (Request $request) {

        $courseController = new CourseController;
        $courses = $courseController->showCoursesByUserCategories($request);
        $featuredCourses = Course::orderByDesc('likes')->take(3)->get();

        return view('auth.dashboard.home', compact('courses', 'featuredCourses'));

    }
    
}
