@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestión de Usuarios</h1>
            <p class="text-gray-600">Administra cuentas de la Escuela de Informática</p>
        </div>
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Usuario
        </button>
    </div>

    <!-- Filters -->
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Buscar por nombre, email o DNI..." class="w-full h-11 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select class="h-11 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Todos los roles</option>
                <option>Egresado</option>
                <option>Gestor</option>
                <option>Administrador</option>
                <option>Director</option>
            </select>
            <select class="h-11 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Activos</option>
                <option>Inactivos</option>
                <option>Todos</option>
            </select>
        </div>
    </div>

    <!-- Users Table -->
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Usuarios Registrados</h2>
            <p class="text-sm text-gray-600 mt-1">Total: 5 usuarios</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre Completo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                    $users = [
                        ['name' => 'Juan Carlos García López', 'dni' => '12345678', 'email' => 'juan.garcia@unitru.edu.pe', 'role' => 'Egresado', 'roleType' => 'secondary'],
                        ['name' => 'Dr. Roberto Mendoza Castillo', 'dni' => '23456789', 'email' => 'roberto.mendoza@unitru.edu.pe', 'role' => 'Gestor', 'roleType' => 'outline'],
                        ['name' => 'María Fernández Torres', 'dni' => '34567890', 'email' => 'maria.fernandez@unitru.edu.pe', 'role' => 'Egresado', 'roleType' => 'secondary'],
                        ['name' => 'Lic. Patricia Flores Mendoza', 'dni' => '45678901', 'email' => 'patricia.flores@unitru.edu.pe', 'role' => 'Administrador', 'roleType' => 'default'],
                        ['name' => 'Dr. Luis Ramírez Vega', 'dni' => '56789012', 'email' => 'luis.ramirez@unitru.edu.pe', 'role' => 'Director', 'roleType' => 'secondary'],
                    ];
                    @endphp

                    @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">{{ $user['dni'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($user['roleType'] === 'default')
                            <span class="px-2 py-1 text-xs font-medium bg-blue-600 text-white rounded-md">{{ $user['role'] }}</span>
                            @elseif($user['roleType'] === 'outline')
                            <span class="px-2 py-1 text-xs font-medium border border-gray-300 rounded-md">{{ $user['role'] }}</span>
                            @else
                            <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-md">{{ $user['role'] }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 py-1 text-xs font-medium bg-green-50 text-green-700 border border-green-200 rounded-md">Activo</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            <div class="flex items-center justify-end gap-2">
                                <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                <button class="p-2 text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
