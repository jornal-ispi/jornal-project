<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminEscritorEditorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ((Auth::check()) && (Auth::user()->acesso == "admin" || Auth::user()->acesso == "editor" || Auth::user()->acesso == "escritor")) {
            return $next($request);
        }
        return redirect('/');
    }
}