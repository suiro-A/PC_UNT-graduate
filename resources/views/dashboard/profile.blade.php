@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-3xl font-bold text-foreground mb-2">Mi Perfil</h1>
        <p class="text-muted-foreground">Administra tu información personal y configuración de cuenta</p>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Personal Information -->
        <div class="bg-white rounded-lg border border-border shadow-sm">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Información Personal
                </h2>
                <p class="text-sm text-muted-foreground">Actualiza tus datos personales</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="nombres" class="block text-sm font-medium">Nombres Completos</label>
                        <input type="text" id="nombres" name="nombres" value="{{ old('nombres', auth()->user()->nombres ?? '') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div class="space-y-2">
                        <label for="apellidos" class="block text-sm font-medium">Apellidos Completos</label>
                        <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', auth()->user()->apellidos ?? '') }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="dni" class="flex items-center gap-2 text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                            DNI
                        </label>
                        <input type="text" id="dni" value="{{ auth()->user()->dni ?? '' }}" disabled
                               class="w-full h-11 px-3 border border-border rounded-lg bg-muted">
                        <p class="text-xs text-muted-foreground">El DNI no puede ser modificado</p>
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="flex items-center gap-2 text-sm font-medium">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Correo Electrónico
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>
            </div>
        </div>

        <!-- Academic Information -->
        <div class="bg-white rounded-lg border border-border shadow-sm mt-6">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Información Académica
                </h2>
                <p class="text-sm text-muted-foreground">Datos de tu egreso de la Escuela de Informática</p>
            </div>
            <div class="p-6">
                <div class="space-y-2">
                    <label for="anio_egreso" class="block text-sm font-medium">Año de Egreso</label>
                    <select id="anio_egreso" name="anio_egreso" required
                            class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        @for($year = 2025; $year >= 2020; $year--)
                            <option value="{{ $year }}" {{ (auth()->user()->anio_egreso ?? '') == $year ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <!-- Change Password -->
        <div class="bg-white rounded-lg border border-border shadow-sm mt-6">
            <div class="p-6 border-b border-border">
                <h2 class="text-xl font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Cambiar Contraseña
                </h2>
                <p class="text-sm text-muted-foreground">Actualiza tu contraseña de acceso</p>
            </div>
            <div class="p-6 space-y-4">
                <div class="space-y-2">
                    <label for="current_password" class="block text-sm font-medium">Contraseña Actual</label>
                    <input type="password" id="current_password" name="current_password"
                           class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                           placeholder="••••••••">
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="new_password" class="block text-sm font-medium">Nueva Contraseña</label>
                        <input type="password" id="new_password" name="new_password"
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="••••••••">
                    </div>
                    <div class="space-y-2">
                        <label for="new_password_confirmation" class="block text-sm font-medium">Confirmar Nueva Contraseña</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                               class="w-full h-11 px-3 border border-border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="••••••••">
                    </div>
                </div>
            </div>
        </div>

        <!-- Save Changes -->
        <div class="flex items-center justify-end gap-3 mt-6">
            <a href="{{ route('dashboard') }}" class="px-6 py-2 border border-border rounded-lg hover:bg-muted transition">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2 bg-primary hover:bg-primary/90 text-primary-foreground font-semibold rounded-lg transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection
