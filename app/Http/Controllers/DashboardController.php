<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Medicamento;
use App\Models\Tratamiento;
use App\Models\Recordatorio;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard correspondiente al rol del usuario autenticado.
     */
    public function index()
    {
        $user = Auth::user();

        return match ($user->role) {
            'administrador' => $this->administrador(),
            'cuidador' => $this->cuidador(),
            default => $this->paciente(),
        };
    }

    private function administrador()
    {
        $usuarios = User::orderByDesc('created_at')->get();

        $stats = [
            'total_cuentas' => User::count(),
            'pacientes' => User::where('role', 'paciente')->count(),
            'cuidadores' => User::where('role', 'cuidador')->count(),
            'administradores' => User::where('role', 'administrador')->count(),
            'medicamentos' => Medicamento::count(),
            'tratamientos' => Tratamiento::count(),
            'recordatorios' => Recordatorio::count(),
        ];

        return view('dashboard_administrador', compact('usuarios', 'stats'));
    }

    private function cuidador()
    {
        $pacientes = Usuario::where('cuidador_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('dashboard_cuidador', compact('pacientes'));
    }

    private function paciente()
    {
        $medicamentosCount = Medicamento::count();
        $tratamientosCount = Tratamiento::count();
        $recordatorios = Recordatorio::orderBy('hora', 'asc')->take(5)->get();
        $proximaDosis = Recordatorio::orderBy('hora', 'asc')->value('hora') ?? 'Sin definir';

        return view('dashboard_paciente', compact('medicamentosCount', 'tratamientosCount', 'recordatorios', 'proximaDosis'));
    }

    /**
     * Guarda un paciente nuevo vinculado al cuidador autenticado.
     */
    public function storePaciente(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255', 'unique:usuarios,correo'],
            'telefono' => ['required', 'string', 'max:30'],
            'fechaNacimiento' => ['required', 'date'],
        ]);

        Usuario::create([
            'cuidador_id' => Auth::id(),
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'telefono' => $data['telefono'],
            'fechaNacimiento' => $data['fechaNacimiento'],
            'tipoUsuario' => 'paciente',
        ]);

        return back()->with('success', '¡Paciente agregado correctamente!');
    }

    /**
     * Elimina un paciente, solo si pertenece al cuidador autenticado.
     */
    public function destroyPaciente($id)
    {
        $paciente = Usuario::where('cuidador_id', Auth::id())->findOrFail($id);
        $paciente->delete();

        return back()->with('success', '¡Paciente eliminado correctamente!');
    }
}