<!-- resources/views/quiz/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Quiz para el curso: {{ $course->name }}</h2>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('courses.quiz.submit', $course->id) }}" method="POST">
            @csrf
            @foreach ($questions as $question)
                <div class="mb-4">
                    <h4>{{ $question->text }}</h4>
                    @foreach ($question->options as $option)
                        <div>
                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" id="{{ $question->id }}-{{ $option }}">
                            <label for="{{ $question->id }}-{{ $option }}">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Enviar respuestas</button>
        </form>
    </div>
@endsection
