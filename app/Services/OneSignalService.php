<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    public static function enviar(string $titulo, string $mensaje): bool
    {
        $appId = config('services.onesignal.app_id');
        $restApiKey = config('services.onesignal.rest_api_key');

        if (empty($appId) || empty($restApiKey)) {
            Log::warning('OneSignal: faltan credenciales en el .env');
            return false;
        }

        try {
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => 'Key ' . $restApiKey,
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ])->post('https://onesignal.com/api/v1/notifications', [
                'app_id'            => $appId,
                'included_segments' => ['All'], // Cambiado a 'All' para forzar la llegada a cualquier suscripción activa
                'headings'          => ['en' => $titulo, 'es' => $titulo],
                'contents'          => ['en' => $mensaje, 'es' => $mensaje],
            ]);

            if ($response->failed()) {
                Log::error('OneSignal Falló: ' . $response->body());
                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('OneSignal Excepción: ' . $e->getMessage());
            return false;
        }
    }
}