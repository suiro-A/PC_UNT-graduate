@extends('layouts.app')

@section('title', 'Nueva Propuesta de Artículo')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-3xl font-bold text-foreground mb-2">Nueva Propuesta de Artículo</h1>
        <p class="text-muted-foreground">
            Registra los datos de tu artículo científico para iniciar el proceso de titulación
        </p>
    </div>

    <!-- Information Alert -->
    <div class="bg-blue-50 border border-blue-200 rounded-lg">
        <div class="p-6">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <h4 class="font-semibold text-blue-900 mb-1">Requisitos del Artículo</h4>
                    <ul class="text-sm text-blue-800 space-y-1 list-disc list-inside">
                        <li>El artículo debe estar publicado en una revista indexada</li>
                        <li>Debes ser autor o coautor del artículo</li>
                        <li>El archivo PDF debe incluir la portada de la revista</li>
                        <li>Todos los campos son obligatorios</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('proposals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Article Information Form -->
        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Información del Artículo
                </h2>
                <p class="text-sm text-muted-foreground">Completa los datos de tu publicación científica</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="space-y-2">
                    <label for="titulo" class="block text-sm font-medium">Título del Artículo</label>
                    <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required
                           class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Ej: Machine Learning Applications in Peruvian Agriculture">
                </div>

                <div class="space-y-2">
                    <label for="autores" class="block text-sm font-medium">Autores</label>
                    <input type="text" id="autores" name="autores" value="{{ old('autores') }}" required
                           class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Ej: García, J., López, M., Rodríguez, A.">
                    <p class="text-xs text-muted-foreground">Ingresa todos los autores separados por comas</p>
                </div>

                <div class="space-y-2">
                    <label for="resumen" class="block text-sm font-medium">Resumen del Artículo</label>
                    <textarea id="resumen" name="resumen" rows="5" required
                              class="w-full px-3 py-2 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary resize-none"
                              placeholder="Breve descripción del contenido del artículo...">{{ old('resumen') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Journal Information -->
        <div class="bg-white rounded-lg border border-border shadow-sm mt-6">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold">Información de la Revista</h2>
                <p class="text-sm text-muted-foreground">Datos de la revista donde fue publicado el artículo</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="space-y-2">
                    <label for="revista" class="block text-sm font-medium">Nombre de la Revista</label>
                    <input type="text" id="revista" name="revista" value="{{ old('revista') }}" required
                           class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="Ej: IEEE Access">
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="issn" class="block text-sm font-medium">ISSN</label>
                        <input type="text" id="issn" name="issn" value="{{ old('issn') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="Ej: 2169-3536">
                        <p class="text-xs text-muted-foreground">Número de identificación de la revista</p>
                    </div>
                    <div class="space-y-2">
                        <label for="doi" class="block text-sm font-medium">DOI</label>
                        <input type="text" id="doi" name="doi" value="{{ old('doi') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="Ej: 10.1109/ACCESS.2024.1234567">
                        <p class="text-xs text-muted-foreground">Digital Object Identifier</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="fecha_publicacion" class="block text-sm font-medium">Fecha de Publicación</label>
                        <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div class="space-y-2">
                        <label for="indexacion" class="block text-sm font-medium">Indexación</label>
                        <input type="text" id="indexacion" name="indexacion" value="{{ old('indexacion') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="Ej: Scopus, Web of Science">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="url" class="block text-sm font-medium">URL del Artículo</label>
                    <input type="url" id="url" name="url" value="{{ old('url') }}" required
                           class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="https://...">
                    <p class="text-xs text-muted-foreground">Enlace directo al artículo publicado</p>
                </div>
            </div>
        </div>

        <!-- File Upload -->
        <div class="bg-white rounded-lg border border-border shadow-sm mt-6">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    Archivo del Artículo
                </h2>
                <p class="text-sm text-muted-foreground">Adjunta el PDF de tu artículo publicado</p>
            </div>
            <div class="p-6">
                <div class="border-2 border-dashed border-border rounded-lg p-8 text-center hover:border-primary/50 transition-colors cursor-pointer">
                    <svg class="w-12 h-12 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                    <p class="text-sm font-medium text-foreground mb-1">
                        Haz clic para seleccionar o arrastra el archivo aquí
                    </p>
                    <p class="text-xs text-muted-foreground">PDF, máximo 10MB</p>
                    <input type="file" name="archivo" accept=".pdf" required class="hidden">
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex items-center justify-end gap-3 pb-6 mt-6">
            <a href="{{ route('dashboard') }}" class="px-6 py-2 border border-border rounded-lg hover:bg-muted transition">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition">
                Enviar Propuesta
            </button>
        </div>
    </form>
</div>
@endsection
