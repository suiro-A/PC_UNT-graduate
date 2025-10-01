@extends('layouts.app')

@section('title', 'Detalle del Estudiante')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('gestor.students.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Volver a estudiantes
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-8 mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $student->name }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-600">Correo Electrónico</p>
                <p class="text-gray-900 font-medium">{{ $student->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Matrícula</p>
                <p class="text-gray-900 font-medium">{{ $student->student_id }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Programa</p>
                <p class="text-gray-900 font-medium">{{ $student->program }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Teléfono</p>
                <p class="text-gray-900 font-medium">{{ $student->phone ?? 'No proporcionado' }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold">Propuestas ({{ $student->proposals->count() }})</h2>
            </div>
            <div class="p-6">
                @forelse($student->proposals as $proposal)
                <div class="mb-4 pb-4 border-b last:border-b-0">
                    <h3 class="font-semibold text-gray-900">{{ $proposal->title }}</h3>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-xs px-2 py-1 rounded-full 
                            @if($proposal->status === 'approved') bg-green-100 text-green-800
                            @elseif($proposal->status === 'rejected') bg-red-100 text-red-800
                            @elseif($proposal->status === 'in_review') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($proposal->status) }}
                        </span>
                        <a href="{{ route('gestor.proposals.show', $proposal) }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Ver →
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No hay propuestas</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-xl font-semibold">Solicitudes ({{ $student->requests->count() }})</h2>
            </div>
            <div class="p-6">
                @forelse($student->requests as $request)
                <div class="mb-4 pb-4 border-b last:border-b-0">
                    <h3 class="font-semibold text-gray-900">{{ $request->subject }}</h3>
                    <p class="text-xs text-gray-600 mt-1">{{ ucfirst($request->type) }}</p>
                    <div class="flex items-center justify-between mt-2">
                        <span class="text-xs px-2 py-1 rounded-full 
                            @if($request->status === 'completed') bg-green-100 text-green-800
                            @elseif($request->status === 'rejected') bg-red-100 text-red-800
                            @elseif($request->status === 'in_progress') bg-blue-100 text-blue-800
                            @else bg-yellow-100 text-yellow-800
                            @endif">
                            {{ ucfirst($request->status) }}
                        </span>
                        <a href="{{ route('gestor.requests.show', $request) }}" class="text-sm text-blue-600 hover:text-blue-800">
                            Ver →
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center py-4">No hay solicitudes</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
