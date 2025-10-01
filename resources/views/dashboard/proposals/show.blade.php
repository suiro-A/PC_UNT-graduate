@extends('layouts.app')

@section('title', 'Detalle de Propuesta')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('proposals.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Volver a propuestas
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8">
        <div class="flex justify-between items-start mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $proposal->title }}</h1>
            <span class="px-4 py-2 rounded-full text-sm font-semibold
                @if($proposal->status === 'approved') bg-green-100 text-green-800
                @elseif($proposal->status === 'rejected') bg-red-100 text-red-800
                @elseif($proposal->status === 'in_review') bg-blue-100 text-blue-800
                @else bg-yellow-100 text-yellow-800
                @endif">
                {{ ucfirst($proposal->status) }}
            </span>
        </div>

        <div class="space-y-6">
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Descripción</h3>
                <p class="text-gray-900 whitespace-pre-line">{{ $proposal->description }}</p>
            </div>

            @if($proposal->advisor)
            <div>
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Asesor Propuesto</h3>
                <p class="text-gray-900">{{ $proposal->advisor }}</p>
            </div>
            @endif

            @if($proposal->comments)
            <div class="bg-blue-50 p-4 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-700 mb-2">Comentarios del Revisor</h3>
                <p class="text-gray-900">{{ $proposal->comments }}</p>
            </div>
            @endif

            <div class="border-t pt-6">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-600">Fecha de envío:</span>
                        <span class="text-gray-900 font-medium">
                            {{ $proposal->submitted_at?->format('d/m/Y H:i') ?? $proposal->created_at->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    @if($proposal->reviewed_at)
                    <div>
                        <span class="text-gray-600">Fecha de revisión:</span>
                        <span class="text-gray-900 font-medium">{{ $proposal->reviewed_at->format('d/m/Y H:i') }}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
