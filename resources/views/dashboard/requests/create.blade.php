@extends('layouts.app')

@section('title', 'Nueva Solicitud')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Nueva Solicitud</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('requests.store') }}" method="POST">
            @csrf

            <div class="space-y-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                        Tipo de Solicitud *
                    </label>
                    <select id="type" name="type" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Selecciona un tipo</option>
                        <option value="document" {{ old('type') == 'document' ? 'selected' : '' }}>Documento</option>
                        <option value="meeting" {{ old('type') == 'meeting' ? 'selected' : '' }}>Reunión</option>
                        <option value="extension" {{ old('type') == 'extension' ? 'selected' : '' }}>Extensión</option>
                        <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                        Asunto *
                    </label>
                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Ej: Solicitud de carta de recomendación">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                        Descripción *
                    </label>
                    <textarea id="description" name="description" rows="6" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Describe tu solicitud en detalle...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700 mb-1">
                        Prioridad *
                    </label>
                    <select id="priority" name="priority" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Baja</option>
                        <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Media</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>Alta</option>
                    </select>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('requests.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancelar
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Enviar Solicitud
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
