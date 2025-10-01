<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();
        if (!$user) {
            return redirect('/login');
        }

        // Normalizar roles pasados: si vienen como un solo string con comas, dividirlos
        if (count($roles) === 1 && strpos($roles[0], ',') !== false) {
            $roles = array_map('trim', explode(',', $roles[0]));
        }

        // Normalizar a minúsculas y sin espacios
        $allowed = array_map(function ($r) {
            return strtolower(trim($r));
        }, $roles);

        $userRole = strtolower(trim($user->role ?? ''));

        if (in_array($userRole, $allowed, true)) {
            return $next($request);
        }

        // Registrar información útil para depuración
        Log::warning('RoleMiddleware: access denied', [
            'user_id' => $user->id ?? null,
            'user_email' => $user->email ?? null,
            'user_role' => $user->role ?? null,
            'expected_roles' => $allowed,
            'path' => $request->path(),
        ]);

        abort(403, 'No tienes permiso para acceder a esta página.');
    }
}
