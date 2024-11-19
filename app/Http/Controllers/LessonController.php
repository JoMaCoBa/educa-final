<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ($courseSlug, $lessonId)
    {   
        $course = Course::where('slug', $courseSlug)->firstOrFail();
        $lesson = Lesson::findOrFail($lessonId);
        return view('auth.dashboard.course.lesson.index', compact('course', 'lesson'));
    }
}
