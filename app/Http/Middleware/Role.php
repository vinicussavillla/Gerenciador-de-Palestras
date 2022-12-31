<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = auth()->user()->role;

        if($userRole !==$role) {
            if ($userRole === 'participante') {
                return redirect()->route('participante.dashboard.index');
            }

            if ($userRole === 'organizacao') {
                return redirect()->route('organizacao.dashboard.index');
            }
        }

        return $next($request);
    }
}
