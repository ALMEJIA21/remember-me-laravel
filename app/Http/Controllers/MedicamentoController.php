<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamentos', compact('medicamentos'));
    }

    public function store(Request $request)
    {
        Medicamento::create([
            'nombre' => $request->input('nombre'),
            'dosis' => $request->input('dosis'),
            'frecuencia' => $request->input('frecuencia'),
            'cantidad' => $request->input('cantidad'),
            'observaciones' => $request->input('observaciones'),
        ]);

        return back()->with('success', '¡Medicamento guardado correctamente!');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        return back()->with('success', '¡Medicamento eliminado correctamente!');
    }
}