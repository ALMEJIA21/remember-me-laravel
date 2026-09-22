<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recordatorio;
use Illuminate\Support\Facades\Http;

class RecordatorioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $recordatorio = Recordatorio::create([
                'medicamento' => $request->input('medicamento'),
                'hora' => $request->input('hora'),
                'dias' => $request->input('dias'),
                'notificacion' => $request->has('notificacion') ? 'Sí' : 'No',
            ]);

            if ($request->has('notificacion')) {
                try {
                    $response = Http::withoutVerifying()->withHeaders([
                         'Authorization' => 'Basic ' . env('ONESIGNAL_API_KEY'),
                        'accept' => 'application/json',
                        'content-type' => 'application/json',
                    ])->post('https://onesignal.com/api/v1/notifications', [
                        'app_id' => '27523035-a407-409e-b081-1be4f253e102',
                        'included_segments' => ['Total Subscriptions'],
                        'headings' => [
                            'en' => 'Medication Reminder',
                            'es' => '⏰ Recordatorio de Medicamento'
                        ],
                        'contents' => [
                            'en' => 'Time to take your medication: ' . $recordatorio->medicamento,
                            'es' => 'Es hora de tomar: ' . $recordatorio->medicamento . ' a las ' . $recordatorio->hora
                        ],
                    ]);

                    if ($response->failed()) {
                        dd($response->json());
                    }
                } catch (\Exception $e) {
                    dd($e->getMessage());
                }
            }

            return back()->with('success', '¡Recordatorio guardado correctamente!');
        }

        $recordatorios = Recordatorio::all();
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