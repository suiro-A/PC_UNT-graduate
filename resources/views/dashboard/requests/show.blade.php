@extends('layouts.app')

@section('title', 'Detalle de Solicitud')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('requests.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Volver a solicitudes
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $request->subject }}</h1>
                <div class="flex items-center space-x-3">
                    <span class="text-sm px-3 py-1 rounded bg-gray-100 text-gray-700">
                        {{ ucfirst($request->type) }}
                    </span>
                    <span class="text-sm px-3 py-1 rounded 
                        @if($request->priority === 'high') bg-red-100 text-red-700
                        @elseif($request->priority === 'medium') bg-yellow-100 text-yellow-700
                        @else bg-green-100 text-green-700
                        @endif">
                        Prioridad: {{ ucfirst($request->priority) }}
                    </span>
                </div>
            </div>
            <span class="px-4 py-2 rounded-full text-sm font-semibold
                @if($request->status === 'completed') bg-green-100 text-green-800
                @elseif($request->status === 'rejected') bg-red-100 text-red-800
                @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                @else bg-yellow-100 text-yellow-800
                @endif">
                {{ ucfirst($request->status) }}
            </span>
        </div>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Descripción</h3>
                <p class="text-gray-900 whitespace-pre-line">{{ $request->description }}</p>
            </div>

            @if($request->response)
            <div class="bg-green-50 p-4 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Respuesta</h3>
                <p class="text-gray-900 whitespace-pre-line">{{ $request->response }}</p>
                @if($request->responded_at)
                <p class="text-sm text-gray-600 mt-2">
                    Respondida el {{ $request->responded_at->format('d/m/Y H:i') }}
                </p>
                @endif
            </div>
            @endif

            <div class="border-t pt-6">
                <div class="text-sm text-gray-600">
                    <span>Creada el:</span>
                    <span class="text-gray-900 font-medium">{{ $request->created_at->format('d/m/Y H:i') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
