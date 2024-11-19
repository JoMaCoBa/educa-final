<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function showCoursesByUserCategories(Request $request)
    {
        // Obtener al usuario autenticado
        $user = $request->user();

        // Obtener categorias del usuario
        $userCategories = $user->categories()->pluck('categories.id');

        // Obtener los cursos asociados a las categorías del usuario y ordenarlos por likes de mayor a menor
        $courses = Course::whereIn('category_id', $userCategories)
                        ->orderByDesc('likes') // Ordenar por likes de manera descendente
                        ->get();

        return $courses;
    }

    public function index(Course $course)
    {
        $userHasLikedCourse = $course->users()->where('user_id', Auth::id())->exists();
        return view('auth.dashboard.course.index', compact('course', 'userHasLikedCourse'));
    }

    public function like(Request $request, Course $course)
    {
        // Verificar si el usuario ya ha dado like al curso
        if (!$request->user()->courses()->where('course_id', $course->id)->exists()) {
            // El usuario aún no ha dado like, registrar el like
            $request->user()->courses()->attach($course);
            $course->increment('likes');
        } else {
            // El usuario ya dio like, eliminar el like (dislike)
            $request->user()->courses()->detach($course);
            $course->decrement('likes');
        }

        // Redirigir al usuario de regreso a la página del curso
        return redirect()->route('course.index', ['course' => $course->slug]);
    }

    public function all()
    {
        $categories = Category::with('courses')->get();
        return view('index', compact('categories'));
    }

    public function all2(Request $request)
    {
        //dd($request);
        $data = $request->except(['Listo', '_token']);
        $categories = Category::with('courses')->get();

        return view('index', compact('categories','data'));
    }
    // {
    //     $courses = Course::all();
    //     return view('index', compact('courses'));
    // }
}
