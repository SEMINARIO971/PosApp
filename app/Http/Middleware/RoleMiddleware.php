<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(!Auth::check())  return redirect()->route('login');

        if (!Auth::user()->hasRole($role)) {
            abort(403,"No tienes permiso  a esta pagina!");
        }
        return $next($request);
    }
}
