@extends('layouts.app')

@section('title', 'Criterios de Validación')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Criterios de Validación</h1>
            <p class="text-gray-600">Gestiona las reglas para validar artículos científicos</p>
        </div>
        <button class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Criterio
        </button>
    </div>

    <!-- Important Notice -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <div>
                <h4 class="font-semibold text-blue-900 mb-1">Importante</h4>
                <p class="text-sm text-blue-800">
                    Los cambios en los criterios de validación solo se aplicarán a las nuevas solicitudes. Las solicitudes
                    existentes mantendrán los criterios con los que fueron enviadas.
                </p>
            </div>
        </div>
    </div>

    <!-- Criteria List -->
    <div class="grid gap-4">
        @php
        $criteria = [
            ['id' => 1, 'name' => 'Indexación en Scopus', 'description' => 'La revista debe estar indexada en la base de datos Scopus', 'type' => 'Indexación', 'active' => true],
            ['id' => 2, 'name' => 'Indexación en Web of Science', 'description' => 'La revista debe estar indexada en Web of Science', 'type' => 'Indexación', 'active' => true],
            ['id' => 3, 'name' => 'Cuartil Mínimo Q2', 'description' => 'La revista debe estar en cuartil Q1 o Q2', 'type' => 'Calidad', 'active' => true],
            ['id' => 4, 'name' => 'Autor o Coautor', 'description' => 'El egresado debe aparecer como autor o coautor del artículo', 'type' => 'Autoría', 'active' => true],
            ['id' => 5, 'name' => 'Artículo Publicado', 'description' => 'El artículo debe estar publicado, no en revisión', 'type' => 'Estado', 'active' => false],
        ];
        @endphp

        @foreach($criteria as $criterion)
        <div class="bg-white border border-gray-200 rounded-lg p-6">
            <div class="flex items-start justify-between gap-4">
                <div class="flex items-start gap-4 flex-1">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $criterion['name'] }}</h3>
                            <span class="px-2 py-1 text-xs font-medium border border-gray-300 rounded-md">{{ $criterion['type'] }}</span>
                            @if($criterion['active'])
                            <span class="px-2 py-1 text-xs font-medium bg-green-50 text-green-700 border border-green-200 rounded-md">Activo</span>
                            @else
                            <span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-700 border border-gray-300 rounded-md">Inactivo</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-2">{{ $criterion['description'] }}</p>
                        <p class="text-xs text-gray-500">
                            <strong>Aplica a:</strong> Nuevas solicitudes
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" {{ $criterion['active'] ? 'checked' : '' }}>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
