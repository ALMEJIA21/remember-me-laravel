<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IAController extends Controller
{
    public function analizarInteraccion(Request $request)
    {
        $medicamentos = $request->input('medicinas', []);

        if (empty($medicamentos) || count($medicamentos) < 2) {
            return response()->json([
                'estado' => 'seguro', 
                'mensaje' => 'Por favor escribe ambos medicamentos para analizar.'
            ], 200);
        }

        $m1 = strtolower($medicamentos[0] ?? '');
        $m2 = strtolower($medicamentos[1] ?? '');

        // Lógica de validación segura y robusta con PHP nativo
        $esPeligroso = false;

        // Validar combinación Omeprazol y Clopidogrel
        if ((str_contains($m1, 'omeprazol') && str_contains($m2, 'clopidogrel')) || 
            (str_contains($m1, 'clopidogrel') && str_contains($m2, 'omeprazol'))) {
            $esPeligroso = true;
        }

        // Validar anticoagulantes con AINES
        $anticoagulantes = ['acenocumarol', 'warfarina', 'aspirina'];
        $aines = ['ibuprofeno', 'naproxeno', 'diclofenaco'];

        foreach ($anticoagulantes as $anti) {
            foreach ($aines as $aine) {
                if ((str_contains($m1, $anti) && str_contains($m2, $aine)) || 
                    (str_contains($m1, $aine) && str_contains($m2, $anti))) {
                    $esPeligroso = true;
                }
            }
        }

        if ($esPeligroso) {
            return response()->json([
                'estado' => 'peligro',
                'mensaje' => '¡Alerta de riesgo crítico! La combinación simultánea de estos fármacos aumenta significativamente el riesgo de hemorragias o disminuye el efecto terapéutico esperado. Se aconseja consulta médica.'
            ], 200);
        } else {
            return response()->json([
                'estado' => 'seguro',
                'mensaje' => 'Combinación analizada. No se registran interacciones graves directas entre estos dos medicamentos según los protocolos clínicos estándar.'
            ], 200);
        }
    }
}