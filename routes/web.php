<?php

use App\Http\Controllers\PacienteController;

// Ruta de ejemplo para mostrar la vista welcome
Route::get('/welcome', function () {
    return view('welcome');
});

// Muestra la lista de pacientes
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');

// Muestra el formulario HTML para crear
Route::get('/pacientes/crear', [PacienteController::class, 'create'])->name('pacientes.create');

// Recibe los datos del formulario (usando POST, no GET)
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

// Página de inicio independiente
Route::get('/', function () {
    return view('home');
});


