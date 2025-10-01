@extends('layouts.app')

@section('title', 'Dashboard Ejecutivo')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-foreground mb-2">Dashboard Ejecutivo</h1>
            <p class="text-muted-foreground">Estadísticas de la Escuela de Informática</p>
        </div>
        <div class="flex items-center gap-3">
            <select class="flex h-11 w-[140px] items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
            <a href="{{ route('director.reports.index') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-4 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" y2="3"/>
                </svg>
                Exportar Reporte
            </a>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="tracking-tight text-sm font-medium">Total Solicitudes</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-muted-foreground">
                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
            </div>
            <div class="p-6 pt-0">
                <div class="text-2xl font-bold">{{ $stats['totalRequests'] }}</div>
                <p class="text-xs text-muted-foreground flex items-center gap-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
                        <polyline points="16 7 22 7 22 13"/>
                    </svg>
                    <span class="text-green-600">+12%</span> vs mes anterior
                </p>
            </div>
        </div>

        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="tracking-tight text-sm font-medium">Tasa de Aprobación</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
            </div>
            <div class="p-6 pt-0">
                <div class="text-2xl font-bold">{{ $stats['approvalRate'] }}%</div>
                <p class="text-xs text-muted-foreground flex items-center gap-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
                        <polyline points="16 7 22 7 22 13"/>
                    </svg>
                    <span class="text-green-600">+3.2%</span> vs mes anterior
                </p>
            </div>
        </div>

        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="tracking-tight text-sm font-medium">Tiempo Promedio</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-500">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <div class="p-6 pt-0">
                <div class="text-2xl font-bold">{{ $stats['avgReviewTime'] }} días</div>
                <p class="text-xs text-muted-foreground flex items-center gap-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                        <polyline points="2 17 8.5 10.5 13.5 15.5 22 7"/>
                        <polyline points="16 7 22 7 22 13"/>
                    </svg>
                    <span class="text-green-600">-0.8 días</span> vs mes anterior
                </p>
            </div>
        </div>

        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6 flex flex-row items-center justify-between space-y-0 pb-2">
                <h3 class="tracking-tight text-sm font-medium">Pendientes</h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-500">
                    <circle cx="12" cy="12" r="10"/>
                    <polyline points="12 6 12 12 16 14"/>
                </svg>
            </div>
            <div class="p-6 pt-0">
                <div class="text-2xl font-bold">{{ $stats['pending'] }}</div>
                <p class="text-xs text-muted-foreground mt-1">Esperando revisión</p>
            </div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="grid gap-6 lg:grid-cols-2">
        <!-- Monthly Trend Chart -->
        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <h3 class="text-2xl font-semibold leading-none tracking-tight mb-1.5">Tendencia Mensual</h3>
                <p class="text-sm text-muted-foreground">Solicitudes por mes (últimos 6 meses)</p>
            </div>
            <div class="p-6 pt-0">
                <div class="h-[300px] flex items-center justify-center bg-muted/20 rounded-lg">
                    <div class="text-center text-muted-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2 opacity-50">
                            <line x1="12" x2="12" y1="20" y2="10"/>
                            <line x1="18" x2="18" y1="20" y2="4"/>
                            <line x1="6" x2="6" y1="20" y2="16"/>
                        </svg>
                        <p class="text-sm">Gráfico de tendencia mensual</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Review Time Distribution Chart -->
        <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <h3 class="text-2xl font-semibold leading-none tracking-tight mb-1.5">Tiempo de Revisión</h3>
                <p class="text-sm text-muted-foreground">Distribución del tiempo de respuesta</p>
            </div>
            <div class="p-6 pt-0">
                <div class="h-[300px] flex items-center justify-center bg-muted/20 rounded-lg">
                    <div class="text-center text-muted-foreground">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2 opacity-50">
                            <line x1="12" x2="12" y1="20" y2="10"/>
                            <line x1="18" x2="18" y1="20" y2="4"/>
                            <line x1="6" x2="6" y1="20" y2="16"/>
                        </svg>
                        <p class="text-sm">Gráfico de distribución de tiempos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Stats Card -->
    <div class="bg-card text-card-foreground rounded-lg border border-border shadow-sm">
        <div class="p-6">
            <h3 class="text-2xl font-semibold leading-none tracking-tight mb-1.5">Resumen de Decisiones</h3>
            <p class="text-sm text-muted-foreground">Estado actual de todas las solicitudes</p>
        </div>
        <div class="p-6 pt-0">
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <polyline points="22 4 12 14.01 9 11.01"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-muted-foreground">Aprobadas</p>
                            <p class="text-2xl font-bold">{{ $stats['approved'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-green-600">
                            {{ $stats['totalRequests'] > 0 ? round(($stats['approved'] / $stats['totalRequests']) * 100) : 0 }}%
                        </p>
                        <p class="text-xs text-muted-foreground">del total</p>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m15 9-6 6"/>
                                <path d="m9 9 6 6"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-muted-foreground">Rechazadas</p>
                            <p class="text-2xl font-bold">{{ $stats['rejected'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-red-600">
                            {{ $stats['totalRequests'] > 0 ? round(($stats['rejected'] / $stats['totalRequests']) * 100) : 0 }}%
                        </p>
                        <p class="text-xs text-muted-foreground">del total</p>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-600">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-muted-foreground">Pendientes</p>
                            <p class="text-2xl font-bold">{{ $stats['pending'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-amber-600">
                            {{ $stats['totalRequests'] > 0 ? round(($stats['pending'] / $stats['totalRequests']) * 100) : 0 }}%
                        </p>
                        <p class="text-xs text-muted-foreground">del total</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
