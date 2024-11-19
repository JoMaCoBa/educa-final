@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="quiz-container" style="max-width: 600px; margin-right: 15%; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 20px; background: #fff; border-radius: 8px;">
        <h2 class="text-center mb-4" style="color: #333;">Quiz para certificación de: {{ $course->name }}</h2>
        <form action="{{ route('course.certification.submit', $course->id) }}" method="POST">
            @csrf
            @foreach($questions as $index => $question)
                <div class="mb-4">
                    <h4>{{ $index + 1 }}. {{ $question['question'] }}</h4>
                    @foreach($question['options'] as $option)
                        <div>
                            <input type="radio" name="questions[{{ $index }}][user_answer]" value="{{ $option }}" required>
                            <label>{{ $option }}</label>
                        </div>
                    @endforeach
                    <input type="hidden" name="questions[{{ $index }}][correct_answer]" value="{{ $question['answer'] }}">
                </div>
            @endforeach
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-cyan" style="background-color: #00d1b2; color: white; border: none; padding: 10px 20px; border-radius: 5px;">
                    Submit Quiz
                </button>
            </div>
        </form>
    </div>
</div>
@endsection