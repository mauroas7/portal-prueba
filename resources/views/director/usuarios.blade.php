@extends('layouts.app')

@section('title', 'Gestión de Usuarios - Director')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                        <h1 class="ml-2 text-2xl font-medium text-gray-900">
                            Gestión de Usuarios
                        </h1>
                    </div>
                    <a href="{{ route('director.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        ← Volver al Panel
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if(session('success'))
                    <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-900">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-6 rounded-lg border border-gray-200 p-6 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Crear médico</h2>
                    <form method="POST" action="{{ route('director.medico.store') }}">
                        @csrf
                        <div class="grid gap-4 md:grid-cols-3">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                <input id="password" name="password" type="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            </div>
                            <div>
                                <label for="especialidad" class="block text-sm font-medium text-gray-700">Especialidad</label>
                                <input id="especialidad" name="especialidad" type="text" value="{{ old('especialidad') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                @error('especialidad')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        <div class="mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Crear médico
                            </button>
                        </div>
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Especialidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Registro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $usuario->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usuario->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($usuario->role == 'paciente') bg-blue-100 text-blue-800
                                            @elseif($usuario->role == 'medico') bg-green-100 text-green-800
                                            @elseif($usuario->role == 'director') bg-purple-100 text-purple-800
                                            @endif">
                                            {{ ucfirst($usuario->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($usuario->role == 'medico' && $usuario->medico)
                                            {{ $usuario->medico->especialidad }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $usuario->created_at->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @if($usuario->id !== auth()->id() && $usuario->role !== 'director')
                                            <form method="POST" action="{{ route('director.usuario.updateRole', $usuario) }}" class="inline-flex items-center mr-3">
                                                @csrf
                                                @method('PUT')
                                                <select name="role" class="border-gray-300 rounded-md text-sm text-gray-700">
                                                    <option value="paciente" {{ $usuario->role === 'paciente' ? 'selected' : '' }}>Paciente</option>
                                                    <option value="medico" {{ $usuario->role === 'medico' ? 'selected' : '' }}>Médico</option>
                                                </select>
                                                <button type="submit" class="ms-2 inline-flex items-center px-3 py-1 bg-blue-600 text-white rounded-md text-xs uppercase tracking-widest hover:bg-blue-700">Guardar</button>
                                            </form>

                                            <form method="POST" action="{{ route('director.usuario.destroy', $usuario) }}" class="inline-flex items-center">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900 text-xs uppercase tracking-widest" onclick="return confirm('¿Estás seguro que quieres eliminar este usuario?')">Eliminar</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-xs">Sin acciones</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection