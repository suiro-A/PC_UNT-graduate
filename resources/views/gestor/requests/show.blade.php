@extends('layouts.app')

@section('title', 'Revisar Solicitud')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('gestor.requests.index') }}" class="text-blue-600 hover:text-blue-800">
            ← Volver a solicitudes
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-8">
                <div class="mb-6">
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

                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">Estudiante</h3>
                        <p class="text-gray-900">{{ $request->user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $request->user->email }}</p>
                        <p class="text-sm text-gray-600">Matrícula: {{ $request->user->student_id }}</p>
                        <p class="text-sm text-gray-600">{{ $request->user->program }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 mb-2">Descripción</h3>
                        <p class="text-gray-900 whitespace-pre-line">{{ $request->description }}</p>
                    </div>

                    <div class="border-t pt-6">
                        <p class="text-sm text-gray-600">
                            Creada el {{ $request->created_at->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 sticky top-6">
                <h2 class="text-xl font-semibold mb-4">Respuesta</h2>
                
                <form action="{{ route('gestor.requests.update', $request) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                Estado
                            </label>
                            <select id="status" name="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="pending" {{ $request->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                                <option value="in_progress" {{ $request->status === 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                                <option value="completed" {{ $request->status === 'completed' ? 'selected' : '' }}>Completada</option>
                                <option value="rejected" {{ $request->status === 'rejected' ? 'selected' : '' }}>Rechazada</option>
                            </select>
                        </div>

                        <div>
                            <label for="response" class="block text-sm font-medium text-gray-700 mb-1">
                                Respuesta
                            </label>
                            <textarea id="response" name="response" rows="6"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                      placeholder="Escribe tu respuesta al estudiante...">{{ old('response', $request->response) }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Guardar Respuesta
                        </button>
                    </div>
                </form>

                @if($request->responded_at)
                <div class="mt-6 pt-6 border-t">
                    <p class="text-xs text-gray-600">
                        Última respuesta: {{ $request->responded_at->format('d/m/Y H:i') }}
                    </p>
                    @if($request->responder)
                    <p class="text-xs text-gray-600">
                        Por: {{ $request->responder->name }}
                    </p>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
