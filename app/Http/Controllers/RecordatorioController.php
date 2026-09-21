<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatorio;

class RecordatorioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            Recordatorio::create([
                'medicamento' => $request->input('medicamento'),
                'hora' => $request->input('hora'),
                'dias' => $request->input('dias'),
                'notificacion' => $request->has('notificacion') ? 'Sí' : 'No',
            ]);

            return back()->with('success', '¡Recordatorio guardado correctamente!');
        }

        // Consultamos todos los recordatorios de la base de datos
        $recordatorios = Recordatorio::all();

        // Los enviamos a la vista
        return view('recordatorios', compact('recordatorios'));
    }

    public function destroy($id)
    {
        $recordatorio = Recordatorio::findOrFail($id);
        $recordatorio->delete();

        return back()->with('success', '¡Recordatorio eliminado correctamente!');
    }

    public function edit($id)
    {
        $recordatorio = Recordatorio::findOrFail($id);
        return view('recordatorios_edit', compact('recordatorio'));
    }

    public function update(Request $request, $id)
    {
        $recordatorio = Recordatorio::findOrFail($id);
        
        $recordatorio->update([
            'medicamento' => $request->input('medicamento'),
            'hora' => $request->input('hora'),
            'dias' => $request->input('dias'),
            'notificacion' => $request->has('notificacion') ? 'Sí' : 'No',
        ]);

        return redirect('/recordatorios')->with('success', '¡Recordatorio actualizado correctamente!');
    }
}