<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ForceChangePassword
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->force_change_password) {
            return redirect()->route('reset-password');
        }

        return $next($request);
    }
}
