<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Egresado - UNT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: 'rgb(23 23 23)',
                        secondary: 'rgb(250 250 250)',
                        border: 'rgb(235 235 235)',
                        muted: 'rgb(250 250 250)',
                        'muted-foreground': 'rgb(115 115 115)',
                    },
                    borderRadius: {
                        'lg': '0.625rem',
                        'xl': '0.75rem',
                    }
                }
            }
        }
    </script>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-900 to-blue-900 flex items-center justify-center p-4">
        <div class="w-full max-w-2xl">
            <!-- Logo -->
            <div class="flex items-center justify-center gap-3 mb-8">
                <div class="w-14 h-14 bg-gray-100 rounded-xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-white font-bold text-xl">UNT</h1>
                    <p class="text-white/70 text-sm">Escuela de Informática</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-2xl border-0">
                <div class="p-6 space-y-1">
                    <h2 class="text-2xl font-bold text-gray-900">Registro de Egresado</h2>
                    <p class="text-sm text-gray-600">Completa tus datos para crear una cuenta en el sistema</p>
                </div>
                
                <form action="{{ route('register') }}" method="POST" class="p-6 pt-0">
                    @csrf
                    
                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm mb-6">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="nombres" class="block text-sm font-medium text-gray-900">Nombres Completos</label>
                                <input id="nombres" name="nombres" type="text" required value="{{ old('nombres') }}"
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="Juan Carlos">
                            </div>

                            <div class="space-y-2">
                                <label for="apellidos" class="block text-sm font-medium text-gray-900">Apellidos Completos</label>
                                <input id="apellidos" name="apellidos" type="text" required value="{{ old('apellidos') }}"
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="García López">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="dni" class="block text-sm font-medium text-gray-900">DNI</label>
                                <input id="dni" name="dni" type="text" required value="{{ old('dni') }}"
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="12345678" maxlength="8">
                            </div>

                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-medium text-gray-900">Correo Electrónico</label>
                                <input id="email" name="email" type="email" required value="{{ old('email') }}"
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="ejemplo@unitru.edu.pe">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="anio_egreso" class="block text-sm font-medium text-gray-900">Año de Egreso</label>
                            <select id="anio_egreso" name="anio_egreso" required
                                    class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                <option value="">Selecciona el año</option>
                                <option value="2025" {{ old('anio_egreso') == '2025' ? 'selected' : '' }}>2025</option>
                                <option value="2024" {{ old('anio_egreso') == '2024' ? 'selected' : '' }}>2024</option>
                                <option value="2023" {{ old('anio_egreso') == '2023' ? 'selected' : '' }}>2023</option>
                                <option value="2022" {{ old('anio_egreso') == '2022' ? 'selected' : '' }}>2022</option>
                                <option value="2021" {{ old('anio_egreso') == '2021' ? 'selected' : '' }}>2021</option>
                                <option value="2020" {{ old('anio_egreso') == '2020' ? 'selected' : '' }}>2020</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-medium text-gray-900">Contraseña</label>
                                <input id="password" name="password" type="password" required
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>

                            <div class="space-y-2">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-900">Confirmar Contraseña</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                       class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                                       placeholder="••••••••">
                            </div>
                        </div>

                        <button type="submit" class="w-full h-11 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-lg transition">
                            Crear Cuenta
                        </button>

                        <div class="text-center text-sm text-gray-600">
                            ¿Ya tienes una cuenta? 
                            <a href="{{ route('login') }}" class="text-gray-900 font-semibold hover:underline">Inicia sesión aquí</a>
                        </div>
                    </div>
                </form>
            </div>

            <p class="text-center text-white/60 text-sm mt-6">Universidad Nacional de Trujillo © 2025</p>
        </div>
    </div>
</body>
</html>
