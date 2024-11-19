@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Certification Quiz for {{ $course->name }}</h2>
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
            <button type="submit" class="btn btn-success">Submit Quiz</button>
        </form>
    </div>
@endsection
