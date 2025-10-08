<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCargo
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$cargos)
    {
        $user = Auth::user();

        if ($user && in_array($user->cargo, $cargos)) {
            return $next($request);
        }

        abort(403, 'Acesso negado');
    }
}