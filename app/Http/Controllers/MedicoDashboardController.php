<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
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

        return view('medico.dashboard', compact('user', 'pacientesCount', 'turnosHoy', 'turnosProximos'));
    }

    /**
     * Listar pacientes del médico
     */
    public function pacientes()
    {
        $user = Auth::user();
        $pacientes = Paciente::all(); // O filtrar por médico asignado

        return view('medico.pacientes', compact('user', 'pacientes'));
    }

    /**
     * Mostrar turnos próximos
     */
    public function turnos()
    {
        $user = Auth::user();

        // Lógica para obtener turnos del médico
        $turnos = []; // Implementar según tu modelo de turnos

        return view('medico.turnos', compact('user', 'turnos'));
    }

    /**
     * Mostrar perfil del médico
     */
    public function perfil()
    {
        $user = Auth::user();

        return view('medico.perfil', compact('user'));
    }
}