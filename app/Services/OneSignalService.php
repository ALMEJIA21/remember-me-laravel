<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OneSignalService
{
    /**
     * Envía una notificación push a todos los dispositivos suscritos.
     * Devuelve true si OneSignal la aceptó, false si falló (sin romper el flujo de la app).
     */
    public static function enviar(string $titulo, string $mensaje): bool
    {
        $appId = config('services.onesignal.app_id');
        $restApiKey = config('services.onesignal.rest_api_key');

        if (empty($appId) || empty($restApiKey)) {
            Log::warning('OneSignal: faltan ONESIGNAL_APP_ID o ONESIGNAL_REST_API_KEY en el .env, no se envió la notificación.');
            return false;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'key ' . $restApiKey,
                'Content-Type' => 'application/json',
            ]) ->post('https://api.onesignal.com/notifications', [
                'app_id' => $appId,
                'included_segments' => ['Subscribed Users'],
                'headings' => ['en' => $titulo, 'es' => $titulo],
                'contents' => ['en' => $mensaje, 'es' => $mensaje],
            ]);

            if ($response->failed()) {
                Log::error('OneSignal: la notificación no pudo enviarse.', ['response' => $response->body()]);
                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('OneSignal: excepción al enviar la notificación.', ['error' => $e->getMessage()]);
            return false;
        }
    }
}
