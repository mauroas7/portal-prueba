@extends('layouts.app')

@section('title', 'Panel de Director')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h1 class="ml-2 text-2xl font-medium text-gray-900">
                        Panel de Director - {{ $user->name }}
                    </h1>
                </div>
            </div>

            <!-- Estadísticas Generales -->
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-4 gap-6 lg:gap-8 p-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-500 rounded-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Pacientes</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalPacientes }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-500 rounded-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Médicos</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalMedicos }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-500 rounded-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Directores</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalDirectores }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="flex items-center">
                        <div class="p-2 bg-yellow-500 rounded-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Usuarios</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Acciones principales -->
            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 p-6">
                <div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                            Gestión de Usuarios
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 leading-relaxed">
                        Administrar usuarios del sistema.
                    </p>
                    <a href="{{ route('director.usuarios') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Gestionar Usuarios
                    </a>
                </div>

                <div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                            Reportes
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 leading-relaxed">
                        Ver estadísticas y reportes del sistema.
                    </p>
                    <a href="{{ route('director.reportes') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Ver Reportes
                    </a>
                </div>

                <div>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <h2 class="ml-3 text-xl font-semibold text-gray-900">
                            Configuración
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 leading-relaxed">
                        Configurar parámetros del sistema.
                    </p>
                    <a href="{{ route('director.configuracion') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Configurar Sistema
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection