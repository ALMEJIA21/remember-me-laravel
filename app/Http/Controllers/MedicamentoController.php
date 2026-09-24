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

        $medicamentos = Medicamento::all();
        return view('medicamentos', compact('medicamentos'));
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        return back()->with('success', '¡Medicamento eliminado correctamente!');
    }

    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        return view('medicamentos_edit', compact('medicamento'));
    }

    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);
        
        $medicamento->update([
            'nombre' => $request->input('nombre'),
            'dosis' => $request->input('dosis'),
            'frecuencia' => $request->input('frecuencia'),
            'cantidad' => $request->input('cantidad'),
            'observaciones' => $request->input('observaciones'),
        ]);

        return redirect('/medicamentos')->with('success', '¡Medicamento actualizado correctamente!');
    }
}