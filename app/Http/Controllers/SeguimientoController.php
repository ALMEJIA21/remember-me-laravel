<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;

class SeguimientoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            Seguimiento::create([
                'medicamento' => $request->input('medicamento'),
                'fecha' => $request->input('fecha'),
                'estado' => $request->input('estado'),
                'comentario' => $request->input('comentario'),
            ]);

            return back()->with('success', '¡Seguimiento guardado correctamente!');
        }

        return view('seguimiento');
    }
}