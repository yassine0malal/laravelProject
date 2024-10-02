<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdmin
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

        if(Auth::check() && Auth::user()->isAdmin==1)
        {
            return $next($request);
        }
        else
        {
            abort(403);
            // return redirect()->route('register')->with('message', 'Vous n\'avez pas les droits pour accéder à cette page');
            // return redirect()->route('register');

       }
    }
}
