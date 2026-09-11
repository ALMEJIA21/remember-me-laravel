<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;

class TratamientoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            Tratamiento::create([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'fechaInicio' => $request->input('fechaInicio'),
                'fechaFinal' => $request->input('fechaFinal'),
                'estado' => $request->input('estado'),
            ]);

            return back()->with('success', '¡Tratamiento guardado correctamente!');
        }

        return view('tratamiento');
    }
}