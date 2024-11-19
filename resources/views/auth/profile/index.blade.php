@extends('layouts.app')

@section('title', 'EduCA - Perfil')

@section('content')
<main class="w-full h-screen bg-gray-100 flex justify-center items-center">
    <div class="m-4 w-full h-3/4 md:w-1/2 bg-white shadow-lg rounded-lg overflow-hidden flex flex-col items-center ">
        <div class="flex justify-center py-8">
            @if(auth()->user()->profile_photo_path)
                <img src="{{ asset(auth()->user()->profile_photo_path) }}" alt="Foto de Perfil de {{ $user->username }}" class="w-48 h-48 md:w-64 md:h-64 rounded-full">
            @else
                <img src="{{ asset('images/usuario.svg') }}" alt="Foto de Perfil Predeterminada" class="w-48 h-48 md:w-64 md:h-64 rounded-full">
            @endif
        </div>
        <div class="px-6 py-4 text-center md:text-left">
            <p class="text-xl font-semibold">{{ $user->name }}</p>
            <p class="text-gray-600">{{ "@" . $user->username }}</p>
            <div class="mt-4">
                <p class="text-lg font-semibold">Categorías:</p>
                <div class="grid grid-cols-2 gap-2 md:flex flex-wrap justify-center">
                    @foreach ($user->categories as $category)
                        <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $category->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="mt-6">
                <a href="{{ route('profile.edit', $user->username) }}" class="Primary-Button w-full">Editar</a>
            </div>
        </div>
    </div>
</main>
@endsection

