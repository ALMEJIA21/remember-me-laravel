<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Recordatorio;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class EnviarRecordatoriosNotificaciones extends Command
{
    protected $signature = 'enviar:recordatorios';
    protected $description = 'Envía las notificaciones de medicamentos a la hora programada';

    public function handle()
    {
        $horaActual = Carbon::now()->format('H:i');
        $this->info("Buscando recordatorios para la hora: " . $horaActual);

        $recordatorios = Recordatorio::where('hora', $horaActual)
                                     ->where('notificacion', 'Sí')
                                     ->get();

        if ($recordatorios->isEmpty()) {
            $this->info("No hay recordatorios para esta hora.");
            return;
        }

        foreach ($recordatorios as $recordatorio) {
            try {
                $response = Http::withoutVerifying()->withHeaders([
'Authorization' => 'Basic ' . env('ONESIGNAL_API_KEY'),                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ])->post('https://onesignal.com/api/v1/notifications', [
                    'app_id' => '27523035-a407-409e-b081-1be4f253e102',
                    'included_segments' => ['All'], // Cambiado a 'All' para asegurar alcance general
                    'headings' => [
                        'en' => 'Medication Reminder',
                        'es' => '⏰ Recordatorio de Medicamento'
                    ],
                    'contents' => [
                        'en' => 'Time to take your medication: ' . $recordatorio->medicamento,
                        'es' => 'Es hora de tomar: ' . $recordatorio->medicamento . ' a las ' . $recordatorio->hora
                    ],
                ]);

                if ($response->successful()) {
                    $this->info("¡Notificación enviada con éxito para: " . $recordatorio->medicamento . "!");
                } else {
                    $this->error("Error de OneSignal: " . json_encode($response->json()));
                }
            } catch (\Exception $e) {
                $this->error("Excepción al enviar: " . $e->getMessage());
            }
        }
    }
}