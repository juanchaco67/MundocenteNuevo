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
<<<<<<< HEAD
                return redirect()->to('admin');
=======
                return redirect()->to('/');
>>>>>>> c16215791a8908b4c45d6192b9e38d0d4fec90ca
                break;
            case '1':
                //return redirect()->to('docente');
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
