@extends('layouts.app')

@section('title', 'Gestión de Propuestas')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Gestión de Propuestas</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        @forelse($proposals as $proposal)
        <div class="p-6 border-b last:border-b-0 hover:bg-gray-50">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $proposal->title }}</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        <strong>Estudiante:</strong> {{ $proposal->user->name }} ({{ $proposal->user->student_id }})
                    </p>
                    <p class="text-sm text-gray-600">
                        <strong>Programa:</strong> {{ $proposal->user->program }}
                    </p>
                    
                    @if($proposal->advisor)
                    <p class="text-sm text-gray-600">
                        <strong>Asesor:</strong> {{ $proposal->advisor }}
                    </p>
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
                            {{ $proposal->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
                
                <a href="{{ route('gestor.proposals.show', $proposal) }}" 
                   class="ml-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Revisar
                </a>
            </div>
        </div>
        @empty
        <div class="p-12 text-center">
            <p class="text-gray-500">No hay propuestas para revisar</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
