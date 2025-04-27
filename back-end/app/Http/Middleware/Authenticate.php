<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null; // 🔥 IMPORTANTE: no redirige, solo devuelve null
        }

        abort(401, 'No autorizado'); // 🔥 Devolver 401 si no es JSON
    }
}
