<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:director']);
    }

    /**
     * Dashboard del director - vista general
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Estadísticas generales
        $totalPacientes = Paciente::count();
        $totalMedicos = User::where('role', 'medico')->count();
        $totalDirectores = User::where('role', 'director')->count();
        $totalUsuarios = User::count();

        // Otras métricas que el director podría querer ver
        $turnosHoy = 0; // Implementar
        $ingresosMes = 0; // Implementar

        return view('director.dashboard', compact(
            'user',
            'totalPacientes',
            'totalMedicos',
            'totalDirectores',
            'totalUsuarios',
            'turnosHoy',
            'ingresosMes'
        ));
    }

    /**
     * Gestión de usuarios
     */
    public function usuarios()
    {
        $user = Auth::user();
        $usuarios = User::all();

        return view('director.usuarios', compact('user', 'usuarios'));
    }

    /**
     * Reportes y estadísticas
     */
    public function reportes()
    {
        $user = Auth::user();

        // Lógica para generar reportes
        $reportes = []; // Implementar

        return view('director.reportes', compact('user', 'reportes'));
    }

    /**
     * Configuración del sistema
     */
    public function configuracion()
    {
        $user = Auth::user();

        return view('director.configuracion', compact('user'));
    }
}