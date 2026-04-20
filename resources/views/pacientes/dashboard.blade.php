@extends('layouts.app')

@section('title', 'Mi Panel - Paciente')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <h1 class="ml-2 text-2xl font-medium text-gray-900">
                        Bienvenido, {{ $user->name }}
                    </h1>
                </div>
            </div>

            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6">
                <div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2"></path>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                            Mis Turnos
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 leading-relaxed">
                        Consulta y gestiona tus próximos turnos médicos. Solicita nuevos turnos con facilidad.
                    </p>
                    <div class="mt-4 flex space-x-2">
                        <a href="{{ route('paciente.turnos') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ver Turnos
                        </a>
                        <a href="{{ route('paciente.turnos.crear') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Pedir Nuevo Turno
                        </a>
                    </div>
                </div>

                <div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                            Mis Estudios
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 leading-relaxed">
                        Accede a tus resultados de estudios y análisis.
                    </p>
                    <a href="{{ route('paciente.estudios') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Ver Estudios
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection