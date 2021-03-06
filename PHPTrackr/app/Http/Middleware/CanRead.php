<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanRead
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
        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }
        if($request->user() != null){
            if($request->user()->canRead($request->user()->getId())){
                return $next($request);
            } else{
                abort(Response::HTTP_FORBIDDEN);
            }

        } else{
            abort(Response::HTTP_UNAUTHORIZED);
        }
    }
}
