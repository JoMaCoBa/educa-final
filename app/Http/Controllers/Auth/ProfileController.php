<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return view('auth.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $username)
    {
        // Obtener el usuario con el nombre de usuario proporcionado
        $user = User::where('username', $username)->firstOrFail();

        // Obtener las categorías disponibles
        $categories = Category::all();

        // Obtener las categorías del usuario
        $userCategories = $user->categories()->pluck('categories.id')->toArray();

        return view('auth.profile.edit', compact('user', 'categories', 'userCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $username)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'sometimes|string|max:255|unique:users,username,' . $username,
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la foto de perfil
            'categories' => 'array',
            'categories.*' => 'exists:categories,id',
        ]);
    
        // Obtener el usuario con el nombre de usuario proporcionado
        $user = User::where('username', $username)->firstOrFail();
    
        // Actualizar los datos del usuario
        $user->name = $request->name;
    
        // Actualizar el nombre de usuario solo si se proporciona uno nuevo
        if ($request->filled('username')) {
            $user->username = $request->username;
        }
    
        // Actualizar la contraseña si se proporciona una nueva
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        // Procesar la foto de perfil si se ha proporcionado
        if ($request->hasFile('profile_photo')) {
            // Eliminar la foto de perfil existente si existe
            if ($user->profile_photo_path && file_exists(public_path($user->profile_photo_path))) {
                unlink(public_path($user->profile_photo_path));
            }
    
            // Guardar la nueva foto de perfil en la carpeta public
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = '/storage/' . $path;
        }
    
        // Actualizar las categorías del usuario
        $user->categories()->sync($request->categories);
    
        // Guardar los cambios en el usuario
        $user->save();
    
        return redirect()->route('profile.index', $user->username)->with('success', 'Perfil actualizado exitosamente.');
    }
    
    
}
