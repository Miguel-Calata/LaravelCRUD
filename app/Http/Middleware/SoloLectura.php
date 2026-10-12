<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoloLectura
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (config('app.solo_lectura') && ! $request->isMethod('GET')) {
            return back()->with('error', 'La app está en modo solo lectura.');
        }
        return $next($request);
    }
}
