<?php

namespace App\Http\Middleware;

use Closure;

class IsSupAdmine
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
        if(auth()->user()->isSupAdmine() or auth()->user()->IsAdmine()) {
            return $next($request);
        }
        return back();
    }
}
