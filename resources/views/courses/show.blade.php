<!-- resources/views/courses/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $course->name }}</h1>
        <p>{{ $course->description }}</p>

        <a href="{{ route('courses.quiz', $course->id) }}" class="btn btn-primary">
            Iniciar Certificación
        </a>
    </div>
@endsection
