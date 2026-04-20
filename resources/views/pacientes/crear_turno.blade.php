@extends('layouts.app')

@section('title', 'Solicitar Nuevo Turno - Paciente')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2"></path>
                        </svg>
                        <h1 class="ml-2 text-2xl font-medium text-gray-900">
                            Solicitar Nuevo Turno
                        </h1>
                    </div>
                    <a href="{{ route('paciente.turnos') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        ← Volver a Mis Turnos
                    </a>
                </div>
            </div>

            <div class="p-6">
                <form action="{{ route('paciente.turnos.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="medico_id" class="block text-sm font-medium text-gray-700">Seleccionar Médico</label>
                            <select id="medico_id" name="medico_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="">Seleccione un médico</option>
                                @foreach($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->user->name }} - {{ $medico->especialidad }}</option>
                                @endforeach
                            </select>
                            @error('medico_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha del Turno</label>
                            <input type="date" id="fecha" name="fecha" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                            @error('fecha')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="hora" class="block text-sm font-medium text-gray-700">Hora del Turno</label>
                            <input type="time" id="hora" name="hora" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                            @error('hora')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="notas" class="block text-sm font-medium text-gray-700">Notas Adicionales (Opcional)</label>
                            <textarea id="notas" name="notas" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Describa brevemente el motivo de la consulta..."></textarea>
                            @error('notas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('paciente.turnos') }}" class="mr-4 inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Cancelar
                        </a>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Solicitar Turno
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection