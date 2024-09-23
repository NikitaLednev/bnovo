<?php

namespace App\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseDebugHeadersMiddleware
{
    /**
     * Handle an incoming request
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!config('app.debug')) {
            return $response;
        }

        $response->headers->set('X-Debug-Memory', memory_get_usage());
        $response->headers->set('X-Debug-Time', microtime(time()) - LARAVEL_START);

        return $response;
    }
}
