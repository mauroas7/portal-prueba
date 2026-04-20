<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use App\Models\Medico;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicoDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:medico']);
    }

    /**
     * Dashboard del médico
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Obtener estadísticas del médico
        $pacientesCount = Paciente::count();
        $turnosHoy = 0; // Implementar según tu modelo de turnos
        $turnosProximos = []; // Implementar según tu modelo de turnos

        return view('medicos.dashboard', compact('user', 'pacientesCount', 'turnosHoy', 'turnosProximos'));
    }

    /**
     * Listar pacientes del médico
     */
    public function pacientes()
    {
        $user = Auth::user();
        $pacientes = Paciente::all(); // O filtrar por médico asignado

        return view('medicos.pacientes', compact('user', 'pacientes'));
    }

    /**
     * Mostrar turnos próximos
     */
    public function turnos()
    {
        $user = Auth::user();
        $medico = $user->medico;

        if (!$medico) {
            return redirect()->route('medico.dashboard')->with('error', 'Perfil de médico no encontrado.');
        }

        $turnos = $medico->turnos()->with('paciente.user')->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();

        return view('medicos.turnos', compact('user', 'turnos'));
    }

    public function confirmarTurno(Turno $turno)
    {
        $user = Auth::user();
        $medico = $user->medico;

        if (!$medico || $turno->medico_id !== $medico->id) {
            return redirect()->route('medico.turnos')->with('error', 'No autorizado.');
        }

        $turno->estado = 'confirmado';
        $turno->save();

        return redirect()->route('medico.turnos')->with('success', 'Turno confirmado.');
    }

    public function cancelarTurno(Turno $turno)
    {
        $user = Auth::user();
        $medico = $user->medico;

        if (!$medico || $turno->medico_id !== $medico->id) {
            return redirect()->route('medico.turnos')->with('error', 'No autorizado.');
        }

        $turno->estado = 'cancelado';
        $turno->save();

        return redirect()->route('medico.turnos')->with('success', 'Turno cancelado.');
    }

    /**
     * Mostrar perfil del médico
     */
    public function perfil()
    {
        $user = Auth::user();

        return view('medicos.perfil', compact('user'));
    }
}