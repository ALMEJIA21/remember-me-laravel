<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicamento;
use Illuminate\Support\Facades\Http;

class MedicamentoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $medicamento = Medicamento::create([
                'nombre' => $request->input('nombre'),
                'dosis' => $request->input('dosis'),
                'frecuencia' => $request->input('frecuencia'),
                'cantidad' => $request->input('cantidad'),
                'observaciones' => $request->input('observaciones'),
            ]);

            try {
                $response = Http::withoutVerifying()->withHeaders([
                    'Authorization' => 'Basic ' . env('ONESIGNAL_API_KEY'),
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ])->post('https://onesignal.com/api/v1/notifications', [
                    'app_id' => '27523035-a407-409e-b081-1be4f253e102',
                    'included_segments' => ['Total Subscriptions'],
                    'headings' => [
                        'en' => 'New Medication Registered',
                        'es' => '💊 Nuevo Medicamento Registrado'
                    ],
                    'contents' => [
                        'en' => 'Added ' . $medicamento->nombre . ' to your inventory.',
                        'es' => 'Se ha agregado ' . $medicamento->nombre . ' (' . $medicamento->dosis . ') a tu inventario.'
                    ],
                ]);

                if ($response->failed()) {
                    dd($response->json());
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

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