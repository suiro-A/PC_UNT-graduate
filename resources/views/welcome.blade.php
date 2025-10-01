<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Graduados - UNT</title>
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
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-900 to-blue-900">
        <!-- Header -->
        <header class="border-b border-white/10 bg-white/5 backdrop-blur-sm">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-lg leading-tight">Universidad Nacional de Trujillo</h1>
                        <p class="text-white/70 text-sm">Sistema de Gestión de Graduados</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:bg-white/10 rounded-lg transition">
                        Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-100 text-gray-900 hover:bg-gray-200 rounded-lg font-semibold transition">
                        Registrarse
                    </a>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="container mx-auto px-4 py-20">
            <div class="max-w-4xl mx-auto text-center space-y-8">
                <div class="space-y-4">
                    <h2 class="text-5xl md:text-6xl font-bold text-white text-balance">
                        Gestión de Titulación por Publicación de Artículos
                    </h2>
                    <p class="text-xl text-white/80 max-w-2xl mx-auto text-balance">
                        Plataforma integral para gestionar el proceso de titulación mediante la publicación de artículos científicos
                    </p>
                </div>

                <div class="flex items-center justify-center gap-4 pt-4">
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-gray-100 text-gray-900 hover:bg-gray-200 rounded-lg font-semibold text-lg transition">
                        Comenzar Ahora
                    </a>
                    <a href="{{ route('login') }}" class="px-8 py-3 border border-white text-white hover:bg-white/10 rounded-lg text-lg transition">
                        Iniciar Sesión
                    </a>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-4 gap-6 pt-16">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Para Egresados</h3>
                        <p class="text-white/70 text-sm">Registra y gestiona tu propuesta de artículo</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Gestores</h3>
                        <p class="text-white/70 text-sm">Revisa y aprueba solicitudes de titulación</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Administradores</h3>
                        <p class="text-white/70 text-sm">Gestiona usuarios y criterios de validación</p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center mb-4 mx-auto">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Directores</h3>
                        <p class="text-white/70 text-sm">Visualiza estadísticas y reportes</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
