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
     * Mostrar formulario para crear médico
     */
    public function createMedico()
    {
        $user = Auth::user();

        return view('director.create-medico', compact('user'));
    }

    /**
     * Guardar médico nuevo creado por el director
     */
    public function storeMedico(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'medico',
        ]);

        return redirect()->route('director.usuarios')->with('success', 'Médico creado correctamente.');
    }

    /**
     * Actualizar rol de un usuario.
     */
    public function updateRole(Request $request, User $usuario)
    {
        $request->validate([
            'role' => ['required', 'in:paciente,medico'],
        ]);

        if ($usuario->id === Auth::id()) {
            return redirect()->route('director.usuarios')->with('success', 'No puedes cambiar tu propio rol.');
        }

        if ($usuario->role === 'director') {
            return redirect()->route('director.usuarios')->with('success', 'No se puede cambiar el rol de otro director.');
        }

        $usuario->role = $request->role;
        $usuario->save();

        return redirect()->route('director.usuarios')->with('success', 'Rol actualizado correctamente.');
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy(User $usuario)
    {
        if ($usuario->id === Auth::id()) {
            return redirect()->route('director.usuarios')->with('success', 'No puedes eliminar tu propia cuenta desde aquí.');
        }

        if ($usuario->role === 'director') {
            return redirect()->route('director.usuarios')->with('success', 'No se puede eliminar a otro director.');
        }

        $usuario->delete();

        return redirect()->route('director.usuarios')->with('success', 'Usuario eliminado correctamente.');
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