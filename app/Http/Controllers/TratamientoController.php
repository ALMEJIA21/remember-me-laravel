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

        $tratamientos = Tratamiento::all();
        return view('tratamiento', compact('tratamientos'));
    }

    public function destroy($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->delete();

        return back()->with('success', '¡Tratamiento eliminado correctamente!');
    }

    public function edit($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        return view('tratamiento_edit', compact('tratamiento'));
    }

    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        
        $tratamiento->update([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'fechaInicio' => $request->input('fechaInicio'),
            'fechaFinal' => $request->input('fechaFinal'),
            'estado' => $request->input('estado'),
        ]);

        return redirect('/tratamiento')->with('success', '¡Tratamiento actualizado correctamente!');
    }
}