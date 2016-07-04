<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class DocenteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
       protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->idrol) {
            case '3':
                //return redirect()->to('/usuario');
                break;
            case '1':
                //return redirect()->to('docente');
                return redirect()->to('/');
                break;

            case '2':
                return redirect()->to('/');
                break;
             
             default:
                 # code...
                return redirect()->to('/');
                 break;
         } 
        return $next($request);
    }
}
