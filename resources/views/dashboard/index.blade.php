@extends('layouts.app')

@section('title', 'Dashboard - Egresado')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div>
        <h1 class="text-3xl font-bold text-foreground mb-2">Bienvenido, {{ explode(' ', auth()->user()->name)[0] }}</h1>
        <p class="text-muted-foreground">Gestiona tu proceso de titulación por publicación de artículos</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-sm font-medium">Total Solicitudes</h3>
                    <svg class="w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold">{{ $stats['proposals'] ?? 0 }}</div>
                <p class="text-xs text-muted-foreground">Solicitudes registradas</p>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-sm font-medium">En Revisión</h3>
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold">{{ $stats['pending_proposals'] ?? 0 }}</div>
                <p class="text-xs text-muted-foreground">Pendientes de aprobación</p>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-sm font-medium">Aprobadas</h3>
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold">{{ $stats['approved_proposals'] ?? 0 }}</div>
                <p class="text-xs text-muted-foreground">Solicitudes aprobadas</p>
            </div>
        </div>

        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between pb-2">
                    <h3 class="text-sm font-medium">Rechazadas</h3>
                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold">{{ $stats['rejected_proposals'] ?? 0 }}</div>
                <p class="text-xs text-muted-foreground">Requieren corrección</p>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg border border-border shadow-sm">
        <div class="p-6 border-b border-border">
            <h2 class="text-xl font-semibold">Acciones Rápidas</h2>
            <p class="text-sm text-muted-foreground">Gestiona tu proceso de titulación</p>
        </div>
        <div class="p-6">
            <div class="grid gap-4 md:grid-cols-2">
                <a href="{{ route('proposals.create') }}" class="flex flex-col items-center gap-2 p-6 bg-primary hover:bg-primary/90 text-primary-foreground rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-semibold">Nueva Propuesta de Artículo</span>
                    <span class="text-xs opacity-90">Registra un nuevo artículo para titulación</span>
                </a>

                <a href="{{ route('requests.index') }}" class="flex flex-col items-center gap-2 p-6 border border-border hover:bg-muted rounded-lg transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-semibold">Ver Mis Solicitudes</span>
                    <span class="text-xs text-muted-foreground">Revisa el estado de tus propuestas</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Requests -->
    <div class="bg-white rounded-lg border border-border shadow-sm">
        <div class="p-6 border-b border-border">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">Solicitudes Recientes</h2>
                    <p class="text-sm text-muted-foreground">Últimas propuestas registradas</p>
                </div>
                <a href="{{ route('requests.index') }}" class="text-sm text-muted-foreground hover:text-foreground flex items-center gap-2">
                    Ver todas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @forelse($recentProposals ?? [] as $proposal)
                <div class="flex items-start gap-4 p-4 border border-border rounded-lg">
                    <div class="w-10 h-10 bg-muted rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-foreground mb-1">{{ $proposal->title }}</h4>
                        <p class="text-sm text-muted-foreground mb-2">Revista: {{ $proposal->journal ?? 'N/A' }}</p>
                        <div class="flex items-center gap-2">
                            <span class="text-xs px-3 py-1 rounded-full 
                                @if($proposal->status === 'approved') bg-green-100 text-green-800
                                @elseif($proposal->status === 'rejected') bg-red-100 text-red-800
                                @elseif($proposal->status === 'in_review') bg-blue-100 text-blue-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($proposal->status) }}
                            </span>
                            <span class="text-xs text-muted-foreground">{{ $proposal->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('proposals.show', $proposal) }}" class="text-sm text-muted-foreground hover:text-foreground">
                        Ver detalles
                    </a>
                </div>
                @empty
                <p class="text-center text-muted-foreground py-8">No hay solicitudes recientes</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Alert for rejected requests -->
    @if(($stats['rejected_proposals'] ?? 0) > 0)
    <div class="bg-amber-50 border border-amber-200 rounded-lg">
        <div class="p-6">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <div>
                    <h4 class="font-semibold text-amber-900 mb-1">Tienes solicitudes rechazadas</h4>
                    <p class="text-sm text-amber-800 mb-3">
                        Revisa las observaciones y corrige tu propuesta. Puedes reenviar hasta 2 veces.
                    </p>
                    <a href="{{ route('requests.index') }}" class="inline-flex items-center px-4 py-2 text-sm border border-amber-600 text-amber-900 hover:bg-amber-100 rounded-lg transition">
                        Revisar solicitudes
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
