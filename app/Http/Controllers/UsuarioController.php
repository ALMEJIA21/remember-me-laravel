<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            Usuario::create([
                'nombre' => $request->input('nombre'),
                'correo' => $request->input('correo'),
                'telefono' => $request->input('telefono'),
                'fechaNacimiento' => $request->input('fechaNacimiento'),
                'tipoUsuario' => $request->input('tipoUsuario'),
            ]);

            return back()->with('success', '¡Usuario guardado correctamente!');
        }

        return view('usuario');
    }
}