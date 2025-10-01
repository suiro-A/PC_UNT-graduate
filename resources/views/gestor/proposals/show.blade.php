@extends('layouts.app')

@section('title', 'Revisar Propuesta')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('gestor.proposals.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Volver a propuestas
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $proposal->title }}</h1>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">Estudiante</h3>
                        <p class="text-gray-900">{{ $proposal->user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $proposal->user->email }}</p>
                        <p class="text-sm text-gray-600">Matrícula: {{ $proposal->user->student_id }}</p>
                        <p class="text-sm text-gray-600">{{ $proposal->user->program }}</p>
                    </div>

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

                    <div class="border-t pt-6">
                        <p class="text-sm text-gray-600">
                            Enviada el {{ $proposal->submitted_at?->format('d/m/Y H:i') ?? $proposal->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                <h2 class="text-xl font-semibold mb-4">Revisión</h2>
                
                <form action="{{ route('gestor.proposals.update', $proposal) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                Estado
                            </label>
                            <select id="status" name="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending" {{ $proposal->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="in_review" {{ $proposal->status === 'in_review' ? 'selected' : '' }}>En Revisión</option>
                                <option value="approved" {{ $proposal->status === 'approved' ? 'selected' : '' }}>Aprobada</option>
                                <option value="rejected" {{ $proposal->status === 'rejected' ? 'selected' : '' }}>Rechazada</option>
                            </select>
                        </div>

                        <div>
                            <label for="comments" class="block text-sm font-medium text-gray-700 mb-1">
                                Comentarios
                            </label>
                            <textarea id="comments" name="comments" rows="6"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Agrega comentarios para el estudiante...">{{ old('comments', $proposal->comments) }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Guardar Revisión
                        </button>
                    </div>
                </form>

                @if($proposal->reviewed_at)
                <div class="mt-6 pt-6 border-t">
                    <p class="text-xs text-gray-600">
                        Última revisión: {{ $proposal->reviewed_at->format('d/m/Y H:i') }}
                    </p>
                    @if($proposal->reviewer)
                    <p class="text-xs text-gray-600">
                        Por: {{ $proposal->reviewer->name }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
