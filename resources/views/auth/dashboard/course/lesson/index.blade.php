{{-- @extends('layouts.app')

@section('title', 'Reproduciendo curso')

@section('content')

    <main class="w-full h-auto px-4 py-8">

        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

            <!-- Video Player -->
            <div class="aspect-w-16 aspect-h-9">
                <video class="w-full h-full object-cover" controls>
                    <source src="{{ asset($lesson->video_url) }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>

            <!-- Course Information -->
            <div class="p-6">
                <h1 class="text-xl font-semibold mb-2">{{ $course->name }}</h1>

                <!-- Lesson List -->
                <div>
                    <p class="text-lg font-semibold mb-2">Lección: {{ $lesson->name }}</p>
                    <div>
                        <div class="mb-4">
                            <p class="text-lg font-semibold mb-2">Lecciones</p>
                            <ul>
                                @foreach ($course->lessons as $lesson)
                                    <li class="mb-2">
                                        <a href="{{ route('lesson.index', ['course' => $course->slug, 'lesson' => $lesson->id]) }}" class="text-primary hover:underline">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </main>

@endsection --}}


@extends('layouts.app')

@section('title', 'Reproduciendo curso')

@section('content')

    <main class="w-full h-auto px-4 py-8">

        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">

            <!-- Video Player -->
            <div class="aspect-w-16 aspect-h-9">
                <iframe class="w-full h-full" src="{{ $lesson->video_url }}" title="{{ $lesson->name }}" frameborder="0" allowfullscreen style="min-height: 400px;"></iframe>
            </div>

            <!-- Course Information -->
            <div class="p-6">
                <h1 class="text-xl font-semibold mb-2">{{ $course->name }}</h1>

                <!-- Lesson List -->
                <div>
                    <p class="text-lg font-semibold mb-2">Lección: {{ $lesson->name }}</p>
                    <p class="text-lg font-semibold mb-2">Descripción: <span class="text-primary">{{ $lesson->description }}</span></p>
                    <div>
                        <div class="mb-4">
                            <p class="text-lg font-semibold mb-2">Lecciones</p>
                            <ul>
                                @foreach ($course->lessons as $lesson)
                                    <li class="mb-2">
                                        <a href="{{ route('lesson.index', ['course' => $course->slug, 'lesson' => $lesson->id]) }}" class="text-primary hover:underline">{{ $lesson->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </main>

@endsection

