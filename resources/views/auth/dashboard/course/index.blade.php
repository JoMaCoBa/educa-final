@extends('layouts.app')

@section('title', 'Detalles del Curso')

@section('content')

    <header class="w-full lg:h-64 flex flex-col md:flex-row bg-slate-200 relative">
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-start space-y-8 text-primary shadow-md">
            <h2 class="text-3xl font-bold">{{ $course->name }}</h2>
            <p class="text-sm text-gray-600">{{ $course->description }}</p>
            <div class="flex items-center mt-4">
                <span class="text-sm font-semibold mr-2">{{ $course->likes }} likes</span>
                <form action="{{ route('course.like', $course->slug) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit"
                        class="text-white bg-primary hover:bg-red-800 rounded-md py-2 px-4 focus:outline-none">
                        @if ($userHasLikedCourse)
                            Dislike
                        @else
                            Like
                        @endif
                    </button>
                </form> 
            </div>
        </div>
        <img src="{{ asset($course->image_url) }}" alt="{{ $course->name }}"
            class="w-full md:w-1/2 h-64 md:h-auto object-cover object-center rounded-l-md shadow-lg md:block hidden">
    </header>

    <main class="w-full h-auto mt-9 p-6 mb-10">

        <h1 class="text-primary text-3xl font-bold">Lecciones</h1>
        <div class="flex items-center mt-4">
                <span class="text-sm font-semibold mr-2">Obtener Certificado</span>
                <form action="{{ route('course.certification.start', $course->id) }}" method="GET">
                    @csrf
                    @method('POST')
                    <button type="submit"
                        class="text-white bg-primary hover:bg-red-800 rounded-md py-2 px-4 focus:outline-none">
                            Realizar Quiz
                    </button>
                </form> 
            </div>
        <div class="flex flex-col items-center mt-9 space-y-8 h-auto">

            @foreach ($course->lessons as $lesson)
                <a href="{{ route('lesson.index', ['course' => $course->slug, 'lesson' => $lesson->id]) }}"
                    class="block bg-white shadow-md rounded-md overflow-hidden w-full lg:w-3/5 lg:max-w-xl mb-6 transition-all transform hover:-translate-y-4 hover:shadow-xl">
                    <div class="relative">
                        <img src="{{ asset($lesson->img_url) }}" alt="{{ $lesson->name }}"
                            class="w-full h-48 object-cover" />
                        <div class="absolute inset-0 flex items-center justify-center">
                            <p class="text-2xl font-bold text-primary">{{ $lesson->name }}</p>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-600">{{ $lesson->description }}</p>
                    </div>
                </a>
            @endforeach





        </div>

    </main>

@endsection
