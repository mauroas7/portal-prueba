<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Turno;
use App\Models\User;
use App\Models\Medico;

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
        $paciente = $user->paciente;

        if (!$paciente) {
            return redirect()->route('paciente.dashboard')->with('error', 'Perfil de paciente no encontrado.');
        }

        $turnos = $paciente->turnos()->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->get();

        return view('pacientes.turnos', compact('user', 'turnos'));
    }

    public function crearTurno()
    {
        $user = Auth::user();
        $medicos = Medico::with('user')->get();

        return view('pacientes.crear_turno', compact('user', 'medicos'));
    }

    public function storeTurno(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'fecha' => 'required|date|after:today',
            'hora' => 'required|date_format:H:i',
            'notas' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $paciente = $user->paciente;

        if (!$paciente) {
            return redirect()->route('paciente.dashboard')->with('error', 'Perfil de paciente no encontrado.');
        }

        // Verificar que el médico existe
        $medico = Medico::find($request->medico_id);
        if (!$medico) {
            return back()->withErrors(['medico_id' => 'Médico no válido.']);
        }

        Turno::create([
            'paciente_id' => $paciente->id,
            'medico_id' => $request->medico_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'notas' => $request->notas,
        ]);

        return redirect()->route('paciente.turnos')->with('success', 'Turno solicitado exitosamente.');
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