@extends('layouts.app')

@section('title', 'Editar Información')

@section('content')
<main class="max-w-2xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6 sm:px-10 sm:py-8 bg-gray-100">
            <h2 class="text-2xl font-semibold mb-6">Editar Información</h2>
            <form action="{{ route('profile.update', $user->username) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-semibold mb-2">Nombre de Usuario</label>
                    <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700 text-sm font-semibold mb-2">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="confirm_password" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none">
                </div>
                <div class="mb-4">
                    <label for="profile_photo" class="block text-gray-700 text-sm font-semibold mb-2">Foto de Perfil</label>
                    <input type="file" name="profile_photo" id="profile_photo" class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:outline-none @error('profile_photo') border-red-500 @enderror">
                    @error('profile_photo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Categorías</label>
                    @foreach ($categories as $category)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ in_array($category->id, $userCategories) ? 'checked' : '' }} class="mr-2">
                            <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                    @error('categories')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
