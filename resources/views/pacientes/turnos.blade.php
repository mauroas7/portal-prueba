@extends('layouts.app')

@section('title', 'Mis Turnos - Paciente')

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
                            Mis Turnos
                        </h1>
                    </div>
                    <a href="{{ route('paciente.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        ← Volver al Panel
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold">Historial de Turnos</h2>
                    <a href="{{ route('paciente.turnos.crear') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Solicitar Nuevo Turno
                    </a>
                </div>

                @if(count($turnos) > 0)
                    <div class="space-y-4">
                        @foreach($turnos as $turno)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold">Turno con {{ $turno->medico->user->name }}</h3>
                                        <p class="text-gray-600">Especialidad: {{ $turno->medico->especialidad }}</p>
                                        <p class="text-gray-600">Fecha: {{ $turno->fecha->format('d/m/Y') }} a las {{ $turno->hora->format('H:i') }}</p>
                                        @if($turno->notas)
                                            <p class="text-gray-600">Notas: {{ $turno->notas }}</p>
                                        @endif
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        @if($turno->estado == 'confirmado') bg-green-100 text-green-800
                                        @elseif($turno->estado == 'pendiente') bg-yellow-100 text-yellow-800
                                        @elseif($turno->estado == 'cancelado') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($turno->estado) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No tienes turnos programados</h3>
                        <p class="text-gray-500">Cuando tengas turnos agendados, aparecerán aquí.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection