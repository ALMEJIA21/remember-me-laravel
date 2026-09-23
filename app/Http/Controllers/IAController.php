<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IAController extends Controller
{
    public function analizarInteraccion(Request $request)
    {
        $medicamentos = $request->input('medicinas', []);
        if (empty($medicamentos)) {
            return response()->json(['estado' => 'seguro', 'mensaje' => 'No hay medicamentos para analizar.'], 200);
        }

        $textoMedicinas = implode(", ", $medicamentos);
        $prompt = "Actúa como un médico farmacólogo. ¿Existe una interacción peligrosa o contraindicación grave si un paciente toma simultáneamente: $textoMedicinas? Responde ESTRICTAMENTE con un formato JSON plano, sin bloques de código markdown ni comillas invertidas, exactamente así: {\"estado\": \"peligro\" o \"seguro\", \"mensaje\": \"explicación breve de máximo dos líneas\"}";

        $apiKey = env('GEMINI_API_KEY');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->post($url, [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ]
            ]);

        if ($response->successful()) {
            $data = $response->json();
            $textoIA = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';
            $textoIA = trim(str_replace(['```json', '```'], '', $textoIA));
            
            return response($textoIA)->header('Content-Type', 'application/json');
        }

        return response()->json(['estado' => 'error', 'mensaje' => 'No se pudo conectar con el servicio de IA.'], 500);
    }
}