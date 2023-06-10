<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class EditProfileController extends Controller
{
    public function edit()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Pasar los datos del usuario a la vista de edición
        return view('editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'User' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'Nombre' => 'required',
            'Apellido1' => 'required',
            'Apellido2' => 'required',
            'password' => 'required',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Actualizar los datos del usuario
        $user->Nombre = $request->Nombre;
        $user->email = $request->email;
        if ($request->has('password') && $request->password != '') {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Redireccionar a la página de perfil con un mensaje de éxito
        return Redirect::route('profile')->with('success', 'Perfil actualizado correctamente.');
    }
}




