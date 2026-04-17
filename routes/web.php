<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Solo usuarios logueados pueden entrar aquí
Route::middleware(['auth'])->group(function () {
    
    // Rutas de Pacientes
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
        return view('dashboard');
    })->name('dashboard');
});
require __DIR__.'/auth.php';
