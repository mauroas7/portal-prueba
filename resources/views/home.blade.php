@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h2 style="color: #2c3e50; margin-top: 0;">Resumen del Día</h2>

    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        
        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); flex: 1; min-width: 250px; border-left: 5px solid #3498db;">
            <h3 style="margin-top: 0; color: #3498db;">Directorio de Pacientes</h3>
            <p style="color: #7f8c8d;">Consultar la base de datos.</p>
            <br>
            <a href="{{ route('pacientes.index') }}" style="background-color: #3498db; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">Abrir Directorio</a>
        </div>

        <div style="background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); flex: 1; min-width: 250px; border-left: 5px solid #2ecc71;">
            <h3 style="margin-top: 0; color: #2ecc71;">Admisión</h3>
            <p style="color: #7f8c8d;">Ingresa un nuevo paciente al sistema.</p>
            <br>
            <a href="{{ route('pacientes.create') }}" style="background-color: #2ecc71; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-weight: bold;">+ Nuevo Registro</a>
        </div>

    </div>
@endsection