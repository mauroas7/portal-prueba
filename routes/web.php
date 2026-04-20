<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteDashboardController;
use App\Http\Controllers\MedicoDashboardController;
use App\Http\Controllers\DirectorDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
})->name('home');

// Rutas específicas por rol
Route::middleware(['auth', 'role:paciente'])->group(function () {
    Route::get('/paciente/dashboard', [PacienteDashboardController::class, 'dashboard'])->name('paciente.dashboard');
    Route::get('/paciente/turnos', [PacienteDashboardController::class, 'turnos'])->name('paciente.turnos');
    Route::get('/paciente/turnos/crear', [PacienteDashboardController::class, 'crearTurno'])->name('paciente.turnos.crear');
    Route::post('/paciente/turnos', [PacienteDashboardController::class, 'storeTurno'])->name('paciente.turnos.store');
    Route::get('/paciente/estudios', [PacienteDashboardController::class, 'estudios'])->name('paciente.estudios');
    Route::get('/paciente/perfil', [PacienteDashboardController::class, 'perfil'])->name('paciente.perfil');
});

Route::middleware(['auth', 'role:medico'])->group(function () {
    Route::get('/medico/dashboard', [MedicoDashboardController::class, 'dashboard'])->name('medico.dashboard');
    Route::get('/medico/pacientes', [MedicoDashboardController::class, 'pacientes'])->name('medico.pacientes');
    Route::get('/medico/turnos', [MedicoDashboardController::class, 'turnos'])->name('medico.turnos');
    Route::patch('/medico/turnos/{turno}/confirmar', [MedicoDashboardController::class, 'confirmarTurno'])->name('medico.turnos.confirmar');
    Route::patch('/medico/turnos/{turno}/cancelar', [MedicoDashboardController::class, 'cancelarTurno'])->name('medico.turnos.cancelar');
    Route::get('/medico/perfil', [MedicoDashboardController::class, 'perfil'])->name('medico.perfil');
});

Route::middleware(['auth', 'role:director'])->group(function () {
    Route::get('/director/dashboard', [DirectorDashboardController::class, 'dashboard'])->name('director.dashboard');
    Route::get('/director/usuarios', [DirectorDashboardController::class, 'usuarios'])->name('director.usuarios');
    Route::post('/director/medicos', [DirectorDashboardController::class, 'storeMedico'])->name('director.medico.store');
    Route::put('/director/usuarios/{usuario}/role', [DirectorDashboardController::class, 'updateRole'])->name('director.usuario.updateRole');
    Route::delete('/director/usuarios/{usuario}', [DirectorDashboardController::class, 'destroy'])->name('director.usuario.destroy');
    Route::get('/director/reportes', [DirectorDashboardController::class, 'reportes'])->name('director.reportes');
    Route::get('/director/configuracion', [DirectorDashboardController::class, 'configuracion'])->name('director.configuracion');
});

// Rutas de administración (médicos y directores)
Route::middleware(['auth'])->group(function () {

    // Rutas de Pacientes (CRUD)
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
    Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

    // Rutas de Médicos
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');

    // El Dashboard que creó Breeze también está aquí
    Route::get('/dashboard', function () {
        return redirect()->route(Auth::user()->isPaciente() ? 'paciente.dashboard' :
                               (Auth::user()->isMedico() ? 'medico.dashboard' : 'director.dashboard'));
    })->name('dashboard');
});
require __DIR__.'/auth.php';
