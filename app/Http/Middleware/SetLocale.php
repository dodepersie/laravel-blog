<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->segment(1));

        app('url')->defaults(['locale' => $request->segment(1)]);

        return $next($request);
    }
}
