<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!Auth::user()->hasRole($role)) {
            // Redirect based on user role
            if (Auth::user()->isPaciente()) {
                return redirect()->route('paciente.dashboard');
            } elseif (Auth::user()->isMedico()) {
                return redirect()->route('medico.dashboard');
            } elseif (Auth::user()->isDirector()) {
                return redirect()->route('director.dashboard');
            }

            return redirect()->route('home');
        }

        return $next($request);
    }
}