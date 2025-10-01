@extends('layouts.app')

@section('title', 'Mis Propuestas')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Mis Propuestas</h1>
        <a href="{{ route('proposals.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Nueva Propuesta
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @forelse($proposals as $proposal)
        <div class="p-6 border-b last:border-b-0 hover:bg-gray-50">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $proposal->title }}</h3>
                    <p class="text-gray-600 mt-2">{{ Str::limit($proposal->description, 200) }}</p>
                    
                    @if($proposal->advisor)
                    <p class="text-sm text-gray-500 mt-2">
                        <strong>Asesor:</strong> {{ $proposal->advisor }}
                    </p>
                    @endif

                    @if($proposal->comments)
                    <div class="mt-3 p-3 bg-blue-50 rounded-lg">
                        <p class="text-sm text-gray-700"><strong>Comentarios:</strong> {{ $proposal->comments }}</p>
                    </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-3">
                        <span class="text-xs px-3 py-1 rounded-full 
                            @if($proposal->status === 'approved') bg-green-100 text-green-800
                            @elseif($proposal->status === 'rejected') bg-red-100 text-red-800
                            @elseif($proposal->status === 'in_review') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($proposal->status) }}
                        </span>
                        <span class="text-sm text-gray-500">
                            Enviada {{ $proposal->submitted_at?->diffForHumans() ?? $proposal->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                
                <a href="{{ route('proposals.show', $proposal) }}" class="ml-4 text-blue-600 hover:text-blue-800">
                    Ver detalles →
                </a>
            </div>
        </div>
        @empty
        <div class="p-12 text-center">
            <p class="text-gray-500 mb-4">No tienes propuestas aún</p>
            <a href="{{ route('proposals.create') }}" class="text-blue-600 hover:text-blue-800">
                Crear tu primera propuesta →
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection
