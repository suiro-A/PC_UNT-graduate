<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - UNT</title>
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
        <div class="w-full max-w-md">
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

            <div class="bg-white rounded-xl shadow-2xl">
                <div class="p-6 space-y-1 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900">Iniciar Sesión</h2>
                    <p class="text-sm text-gray-600">Ingresa tus credenciales para acceder al sistema</p>
                </div>
                
                <form action="{{ route('login') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    
                    @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                        @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif

                    <div class="space-y-2">
                        <label for="role" class="block text-sm font-medium text-gray-900">Tipo de Usuario</label>
                        <select id="role" name="role" required class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                            <option value="">Selecciona tu rol</option>
                            <option value="egresado">Egresado</option>
                            <option value="gestor">Gestor de Titulación</option>
                            <option value="admin">Administrador</option>
                            <option value="director">Director de Escuela</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-900">Correo Electrónico</label>
                        <input id="email" name="email" type="email" required value="{{ old('email') }}"
                               class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                               placeholder="ejemplo@unitru.edu.pe">
                    </div>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-gray-900">Contraseña</label>
                            <a href="#" class="text-sm text-gray-600 hover:underline">¿Olvidaste tu contraseña?</a>
                        </div>
                        <input id="password" name="password" type="password" required
                               class="w-full h-11 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                               placeholder="••••••••">
                    </div>

                    <button type="submit" class="w-full h-11 bg-gray-900 hover:bg-gray-800 text-white font-semibold rounded-lg transition">
                        Iniciar Sesión
                    </button>

                    <div class="text-center text-sm text-gray-600">
                        ¿No tienes una cuenta? 
                        <a href="{{ route('register') }}" class="text-gray-900 font-semibold hover:underline">Regístrate aquí</a>
                    </div>
                </form>
            </div>

            <p class="text-center text-white/60 text-sm mt-6">Universidad Nacional de Trujillo © 2025</p>
        </div>
    </div>
</body>
</html>
