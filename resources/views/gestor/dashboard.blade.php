@extends('layouts.app')

@section('title', 'Dashboard - Gestor')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Panel de Gestión</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Estudiantes</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total_students'] }}</p>
                </div>
                <div class="text-4xl">👥</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Propuestas</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total_proposals'] }}</p>
                </div>
                <div class="text-4xl">📝</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Pendientes</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_proposals'] }}</p>
                </div>
                <div class="text-4xl">⏳</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Solicitudes</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['total_requests'] }}</p>
                </div>
                <div class="text-4xl">📋</div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Sol. Pendientes</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $stats['pending_requests'] }}</p>
                </div>
                <div class="text-4xl">🔔</div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold">Propuestas Recientes</h2>
            </div>
            <div class="p-6">
                @forelse($recentProposals as $proposal)
                <div class="mb-4 pb-4 border-b last:border-b-0">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $proposal->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Por: {{ $proposal->user->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $proposal->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full 
                            @if($proposal->status === 'approved') bg-green-100 text-green-800
                            @elseif($proposal->status === 'rejected') bg-red-100 text-red-800
                            @elseif($proposal->status === 'in_review') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($proposal->status) }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No hay propuestas recientes</p>
                @endforelse
                
                <a href="{{ route('gestor.proposals.index') }}" class="block text-center text-blue-600 hover:text-blue-800 mt-4">
                    Ver todas las propuestas →
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold">Solicitudes Recientes</h2>
            </div>
            <div class="p-6">
                @forelse($recentRequests as $request)
                <div class="mb-4 pb-4 border-b last:border-b-0">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">{{ $request->subject }}</h3>
                            <p class="text-sm text-gray-600 mt-1">Por: {{ $request->user->name }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $request->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full 
                            @if($request->status === 'completed') bg-green-100 text-green-800
                            @elseif($request->status === 'rejected') bg-red-100 text-red-800
                            @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No hay solicitudes recientes</p>
                @endforelse
                
                <a href="{{ route('gestor.requests.index') }}" class="block text-center text-blue-600 hover:text-blue-800 mt-4">
                    Ver todas las solicitudes →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
