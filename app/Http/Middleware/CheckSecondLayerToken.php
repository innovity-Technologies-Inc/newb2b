<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSecondLayerToken
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tokenExpire = session('second_layer_token_expire_at');
        if (
            !session()->has('second_layer_token') ||
            !$tokenExpire ||
            now()->greaterThan($tokenExpire)) {
            return redirect()->route('login')->with([
                    'message' => 'Session expired, please login again.',
                    'alert-type' => 'error'
                ]
            );
        }
        return $next($request);
    }
}
