<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        //session ('users.profile') != 'admin'
        if (session ('users.profile') != 'admin'){
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
