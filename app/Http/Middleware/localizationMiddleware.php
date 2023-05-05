<?php

namespace App\Http\Middleware;

use App\HelperClasses\Helpers;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class localizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale(getUserLanguage());
        return $next($request);
    }
}
