<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;

class MedicamentoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            Medicamento::create([
                'nombre' => $request->input('nombre'),
                'dosis' => $request->input('dosis'),
                'frecuencia' => $request->input('frecuencia'),
                'cantidad' => $request->input('cantidad'),
                'observaciones' => $request->input('observaciones'),
            ]);

            return back()->with('success', '¡Medicamento guardado correctamente!');
        }

        return view('medicamentos');
    }
}