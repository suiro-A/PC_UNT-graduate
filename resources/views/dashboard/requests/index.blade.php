@extends('layouts.app')

@section('title', 'Mis Solicitudes')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-foreground mb-2">Mis Solicitudes</h1>
        <p class="text-muted-foreground">Historial y estado de tus propuestas de artículos</p>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg border border-border shadow-sm">
        <div class="p-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" placeholder="Buscar por título o revista..." class="w-full h-11 pl-10 pr-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <select class="w-full md:w-[200px] h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    <option value="all">Todos los estados</option>
                    <option value="pending">En Revisión</option>
                    <option value="approved">Aprobado</option>
                    <option value="rejected">Rechazado</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Requests List -->
    <div class="space-y-4">
        @forelse($requests ?? [] as $request)
        <div class="bg-white rounded-lg border {{ $request->status === 'rejected' ? 'border-red-200' : ($request->status === 'approved' ? 'border-green-200' : 'border-border') }} shadow-sm">
            <div class="p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-xl font-semibold">{{ $request->subject }}</h3>
                            <span class="text-xs px-3 py-1 rounded-full 
                                @if($request->status === 'approved') bg-green-600 text-white
                                @elseif($request->status === 'rejected') bg-red-600 text-white
                                @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                                @else bg-yellow-100 text-yellow-800
                                @endif">
                                {{ ucfirst($request->status) }}
                            </span>
                        </div>
                        <div class="text-sm text-muted-foreground space-y-1">
                            <p><strong>Revista:</strong> {{ $request->journal ?? 'N/A' }} (ISSN: {{ $request->issn ?? 'N/A' }})</p>
                            <p><strong>Fecha de envío:</strong> {{ $request->created_at->format('d M Y') }}</p>
                            @if($request->reviewed_at)
                            <p><strong>Fecha de revisión:</strong> {{ $request->reviewed_at->format('d M Y') }}</p>
                            @endif
                            <p><strong>Intentos:</strong> {{ $request->attempts ?? 1 }} de 3</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('requests.show', $request) }}" class="px-4 py-2 text-sm border border-border rounded-lg hover:bg-muted transition flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Ver detalles
                        </a>
                    </div>
                </div>
            </div>

            @if($request->observations)
            <div class="p-6 pt-0">
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <h4 class="font-semibold text-red-900 mb-2 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Observaciones del Gestor
                    </h4>
                    <p class="text-sm text-red-800">{{ $request->observations }}</p>
                    @if(($request->attempts ?? 1) < 3)
                    <div class="mt-4">
                        <a href="{{ route('requests.show', $request) }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm border border-red-600 text-red-900 hover:bg-red-100 rounded-lg transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Corregir y Reenviar
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
        @empty
        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-16 text-center">
                <svg class="w-16 h-16 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg font-semibold text-foreground mb-2">No tienes solicitudes registradas</h3>
                <p class="text-muted-foreground mb-6">Comienza registrando tu primera propuesta de artículo</p>
                <a href="{{ route('proposals.create') }}" class="inline-flex px-6 py-2 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition">
                    Nueva Propuesta
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
