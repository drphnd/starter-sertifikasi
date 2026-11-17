<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware cek peran user.
 *
 * Pemakaian di route:
 *   ->middleware('role:admin')        hanya admin
 *   ->middleware('role:admin,user')   admin atau user
 *
 * Wajib didaftarkan sebagai alias 'role' di bootstrap/app.php
 */
class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, $roles, true)) {
            abort(403, 'Kamu tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
