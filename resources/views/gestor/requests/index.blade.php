@extends('layouts.app')

@section('title', 'Gestión de Solicitudes')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Gestión de Solicitudes</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @forelse($requests as $request)
        <div class="p-6 border-b last:border-b-0 hover:bg-gray-50">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center space-x-3 mb-2">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $request->subject }}</h3>
                        <span class="text-xs px-2 py-1 rounded bg-gray-100 text-gray-700">
                            {{ ucfirst($request->type) }}
                        </span>
                        <span class="text-xs px-2 py-1 rounded 
                            @if($request->priority === 'high') bg-red-100 text-red-700
                            @elseif($request->priority === 'medium') bg-yellow-100 text-yellow-700
                            @else bg-green-100 text-green-700
                            @endif">
                            {{ ucfirst($request->priority) }}
                        </span>
                    </div>
                    
                    <p class="text-sm text-gray-600 mt-1">
                        <strong>Estudiante:</strong> {{ $request->user->name }} ({{ $request->user->student_id }})
                    </p>

                    <div class="flex items-center space-x-4 mt-3">
                        <span class="text-xs px-3 py-1 rounded-full 
                            @if($request->status === 'completed') bg-green-100 text-green-800
                            @elseif($request->status === 'rejected') bg-red-100 text-red-800
                            @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                        <span class="text-sm text-gray-500">
                            {{ $request->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
                
                <a href="{{ route('gestor.requests.show', $request) }}" 
                   class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Revisar
                </a>
            </div>
        </div>
        @empty
        <div class="p-12 text-center">
            <p class="text-gray-500">No hay solicitudes para revisar</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
