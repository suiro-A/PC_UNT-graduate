@extends('layouts.app')

@section('title', 'Reportes y Exportaciones')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Reportes y Exportaciones</h1>
        <p class="text-gray-600">Genera y descarga reportes de la Escuela de Informática</p>
    </div>

    <!-- Quick Export -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg overflow-hidden">
        <div class="p-6 border-b border-blue-200">
            <h2 class="text-lg font-semibold text-blue-900 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Exportación Rápida
            </h2>
            <p class="text-sm text-blue-800 mt-1">Genera un reporte personalizado con los parámetros que necesites</p>
        </div>
        <div class="p-6 space-y-4">
            <div class="space-y-2">
                <label for="report-type" class="block text-sm font-medium text-gray-700">Tipo de Reporte</label>
                <select id="report-type" class="w-full h-11 px-4 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option>Reporte Mensual</option>
                    <option>Reporte Anual</option>
                    <option>Personalizado</option>
                </select>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="month" class="block text-sm font-medium text-gray-700">Mes</label>
                    <select id="month" class="w-full h-11 px-4 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Selecciona un mes</option>
                        <option>Enero</option>
                        <option>Febrero</option>
                        <option>Marzo</option>
                        <option>Abril</option>
                        <option>Mayo</option>
                        <option>Junio</option>
                        <option>Julio</option>
                        <option>Agosto</option>
                        <option>Septiembre</option>
                        <option>Octubre</option>
                        <option>Noviembre</option>
                        <option>Diciembre</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label for="year" class="block text-sm font-medium text-gray-700">Año</label>
                    <select id="year" class="w-full h-11 px-4 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-2 pt-2">
                <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                    Exportar PDF
                </button>
                <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Exportar Excel
                </button>
            </div>
        </div>
    </div>

    <!-- Available Reports -->
    <div>
        <h2 class="text-xl font-semibold text-gray-900 mb-4">Reportes Disponibles</h2>
        <div class="grid gap-4 md:grid-cols-2">
            @php
            $reports = [
                ['name' => 'Reporte Mensual de Solicitudes', 'description' => 'Resumen completo de todas las solicitudes del mes', 'type' => 'Mensual', 'date' => '20 Ene 2025', 'formats' => ['PDF', 'Excel']],
                ['name' => 'Análisis de Tiempos de Revisión', 'description' => 'Estadísticas detalladas de tiempos de respuesta', 'type' => 'Analítico', 'date' => '18 Ene 2025', 'formats' => ['PDF', 'Excel']],
                ['name' => 'Tasa de Aprobación Histórica', 'description' => 'Evolución de la tasa de aprobación en el tiempo', 'type' => 'Histórico', 'date' => '15 Ene 2025', 'formats' => ['PDF', 'Excel', 'CSV']],
                ['name' => 'Reporte de Gestores', 'description' => 'Desempeño y estadísticas de cada gestor de titulación', 'type' => 'Desempeño', 'date' => '10 Ene 2025', 'formats' => ['PDF', 'Excel']],
                ['name' => 'Análisis de Rechazos', 'description' => 'Motivos y patrones de solicitudes rechazadas', 'type' => 'Analítico', 'date' => '08 Ene 2025', 'formats' => ['PDF', 'Excel']],
                ['name' => 'Reporte de Egresados Titulados', 'description' => 'Lista completa de egresados que obtuvieron su título', 'type' => 'Listado', 'date' => '05 Ene 2025', 'formats' => ['PDF', 'Excel', 'CSV']],
            ];
            @endphp

            @foreach($reports as $report)
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex items-start justify-between gap-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $report['name'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $report['description'] }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-medium border border-gray-300 rounded-md">{{ $report['type'] }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500 mb-2">Última generación: {{ $report['date'] }}</p>
                            <div class="flex items-center gap-2">
                                @foreach($report['formats'] as $format)
                                <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-md">{{ $format }}</span>
                                @endforeach
                            </div>
                        </div>
                        <button class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-lg transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Descargar
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Statistics Summary -->
    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Resumen de Exportaciones</h2>
            <p class="text-sm text-gray-600 mt-1">Estadísticas de reportes generados</p>
        </div>
        <div class="p-6">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">24</p>
                        <p class="text-sm text-gray-600">Reportes este mes</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">156</p>
                        <p class="text-sm text-gray-600">Descargas totales</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">Excel</p>
                        <p class="text-sm text-gray-600">Formato más usado</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
