<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RegisterMiddleware
{
    /**
     * Cancel the register request if users are already registered
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(User::count() > 0){
            abort('404');
        }
        return $next($request);
    }
}
