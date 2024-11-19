<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CategoryController;

class RegisterController extends Controller
{

    public function index()
    {
        $categoryController = new CategoryController;
        $categories = $categoryController->showCategoriesForm();

        return view('auth.register.index', compact('categories'));
    }

    public function store(Request $request)
    {

        $path_image = 'images/usuario.svg';

        //Conversión de username
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'email'      => 'required|unique:users|email|max:40',
            'name'       => 'required|min:4|max:36',
            'username'   => 'required|unique:users|min:5|max:20',
            'password'   => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'categories' => 'required',
        ]);

        // Crear el usuario
        $user = User::create([
            'email'     => $request->email,
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'profile_photo_path' => $path_image,
        ]);

        // Sincronizar las categorías seleccionadas por el usuario
        $user->categories()->sync($request->categories);

        // Autenticar usuario
        auth()->attempt([
            'email'     => $request->email,
            'password'  => $request->password,
        ]);

        // Redireccionar 
        return redirect()->route('home');

    }
}
