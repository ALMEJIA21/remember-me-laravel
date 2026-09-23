<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Http;

class TratamientoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $tratamiento = Tratamiento::create([
                'nombre' => $request->input('nombre'),
                'descripcion' => $request->input('descripcion'),
                'fechaInicio' => $request->input('fechaInicio'),
                'fechaFinal' => $request->input('fechaFinal'),
                'estado' => $request->input('estado'),
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
                        'en' => 'New Treatment Created',
                        'es' => '📋 Nuevo Tratamiento Creado'
                    ],
                    'contents' => [
                        'en' => 'Your treatment has started.',
                        'es' => 'Tu tratamiento "' . $tratamiento->nombre . '" ha comenzado.'
                    ],
                ]);

                if ($response->failed()) {
                    dd($response->json());
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }

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