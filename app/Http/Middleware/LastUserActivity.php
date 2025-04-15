<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LastUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Update last_seen timestamp
            Auth::user()->update(['last_seen' => now()]);
        }

        return $next($request);
    }
}

