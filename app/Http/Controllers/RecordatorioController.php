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

        return view('recordatorios');
    }
}