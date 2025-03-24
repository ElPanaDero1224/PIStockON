<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('empresaID')) {
            // Si no hay sesión, redirigir al inicio de sesión
            return redirect()->route('iniciar')->with('error', 'Debes iniciar sesión.');
        }

        return $next($request);
    }
}
