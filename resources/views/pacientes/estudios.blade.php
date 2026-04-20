@extends('layouts.app')

@section('title', 'Mis Estudios - Paciente')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h1 class="ml-2 text-2xl font-medium text-gray-900">
                            Mis Estudios
                        </h1>
                    </div>
                    <a href="{{ route('paciente.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        ← Volver al Panel
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if(count($estudios) > 0)
                    <div class="space-y-4">
                        @foreach($estudios as $estudio)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $estudio->titulo ?? 'Estudio Médico' }}</h3>
                                        <p class="text-gray-600">{{ $estudio->fecha ?? 'Fecha de realización' }}</p>
                                        <p class="text-gray-600">{{ $estudio->tipo ?? 'Tipo de estudio' }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $estudio->estado == 'completado' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ ucfirst($estudio->estado ?? 'En proceso') }}
                                        </span>
                                        @if($estudio->resultado)
                                            <a href="#" class="block mt-2 text-blue-600 hover:text-blue-800 text-sm">Ver Resultado</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No tienes estudios registrados</h3>
                        <p class="text-gray-500">Cuando tengas estudios realizados, aparecerán aquí.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection