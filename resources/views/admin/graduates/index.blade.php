@extends('layouts.app')

@section('title', 'Lista de Egresados')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Lista de Egresados</h1>
            <p class="text-gray-600">Visualiza y exporta datos de egresados de la Escuela de Informática</p>
        </div>
        <div class="flex gap-2">
            <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Exportar Excel
            </button>
            <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Exportar CSV
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white border border-gray-200 rounded-lg p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" placeholder="Buscar por nombre, DNI o correo..." class="w-full h-11 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select class="h-11 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Todos los estados</option>
                <option>En Proceso</option>
                <option>Titulado</option>
                <option>Rechazado</option>
            </select>
            <select class="h-11 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option>Todos los años</option>
                <option>2025</option>
                <option>2024</option>
                <option>2023</option>
                <option>2022</option>
                <option>2021</option>
            </select>
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid gap-4 md:grid-cols-4">
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm font-medium text-gray-600 mb-2">Total Egresados</p>
            <p class="text-2xl font-bold text-gray-900">5</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm font-medium text-gray-600 mb-2">En Proceso</p>
            <p class="text-2xl font-bold text-gray-900">3</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm font-medium text-gray-600 mb-2">Titulados</p>
            <p class="text-2xl font-bold text-gray-900">1</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <p class="text-sm font-medium text-gray-600 mb-2">Rechazados</p>
            <p class="text-2xl font-bold text-gray-900">1</p>
        </div>
    </div>

    <!-- Graduates Table -->
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Egresados Registrados</h2>
            <p class="text-sm text-gray-600 mt-1">Lista completa de egresados de la Escuela de Informática</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre Completo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DNI</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo Electrónico</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año Egreso</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Registro</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado Titulación</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                    $graduates = [
                        ['name' => 'Juan Carlos García López', 'dni' => '12345678', 'email' => 'juan.garcia@unitru.edu.pe', 'year' => '2023', 'date' => '10 Dic 2024', 'status' => 'En Proceso', 'statusColor' => 'warning'],
                        ['name' => 'María Fernández Torres', 'dni' => '34567890', 'email' => 'maria.fernandez@unitru.edu.pe', 'year' => '2022', 'date' => '15 Nov 2024', 'status' => 'En Proceso', 'statusColor' => 'warning'],
                        ['name' => 'Pedro Ramírez Silva', 'dni' => '45678901', 'email' => 'pedro.ramirez@unitru.edu.pe', 'year' => '2023', 'date' => '08 Ene 2025', 'status' => 'En Proceso', 'statusColor' => 'warning'],
                        ['name' => 'Ana Martínez Rojas', 'dni' => '56789012', 'email' => 'ana.martinez@unitru.edu.pe', 'year' => '2021', 'date' => '20 Oct 2024', 'status' => 'Titulado', 'statusColor' => 'success'],
                        ['name' => 'Carlos Vega Núñez', 'dni' => '67890123', 'email' => 'carlos.vega@unitru.edu.pe', 'year' => '2022', 'date' => '05 Sep 2024', 'status' => 'Rechazado', 'statusColor' => 'destructive'],
                    ];
                    @endphp

                    @foreach($graduates as $graduate)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $graduate['name'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-900">{{ $graduate['dni'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $graduate['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $graduate['year'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $graduate['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($graduate['statusColor'] === 'success')
                            <span class="px-2 py-1 text-xs font-medium bg-green-50 text-green-700 border border-green-200 rounded-md">{{ $graduate['status'] }}</span>
                            @elseif($graduate['statusColor'] === 'warning')
                            <span class="px-2 py-1 text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200 rounded-md">{{ $graduate['status'] }}</span>
                            @else
                            <span class="px-2 py-1 text-xs font-medium bg-red-50 text-red-700 border border-red-200 rounded-md">{{ $graduate['status'] }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
