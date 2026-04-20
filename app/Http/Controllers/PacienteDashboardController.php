<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:paciente']);
    }

    /**
     * Dashboard del paciente
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Aquí puedes agregar lógica para obtener:
        // - Próximos turnos
        // - Estudios realizados
        // - Historial médico
        // - etc.

        return view('pacientes.dashboard', compact('user'));
    }

    /**
     * Mostrar turnos del paciente
     */
    public function turnos()
    {
        $user = Auth::user();

        // Lógica para obtener turnos del paciente
        $turnos = []; // Implementar según tu modelo de turnos

        return view('pacientes.turnos', compact('user', 'turnos'));
    }

    /**
     * Mostrar estudios del paciente
     */
    public function estudios()
    {
        $user = Auth::user();

        // Lógica para obtener estudios del paciente
        $estudios = []; // Implementar según tu modelo de estudios

        return view('pacientes.estudios', compact('user', 'estudios'));
    }

    /**
     * Mostrar perfil del paciente
     */
    public function perfil()
    {
        $user = Auth::user();

        return view('pacientes.perfil', compact('user'));
    }
}