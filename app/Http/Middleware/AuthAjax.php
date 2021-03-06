<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAjax
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
        if (!session ()->has ('users')){
            if ($request->ajax ()){
                return response ()->json ([
                    'title' => 'Access Denied',
                    'result' => 'error'
                ]);
            }
            else {
                return redirect ()->route ('login');
            }
        }
        return $next($request);
    }
}
