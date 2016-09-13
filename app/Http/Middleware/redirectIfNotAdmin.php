<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class redirectIfNotAdmin
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
        //dd($request->user());
        if($request->user() && $request->user()->isAdmin()){
            return $next($request);
        }
        return redirect('articles');
    }
}
