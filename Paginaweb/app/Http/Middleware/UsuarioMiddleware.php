<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Session;
use Auth;

class UsuarioMiddleware
{

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
        //return $this->auth->user();

        if($this->auth){
            //return redirect()->to('/');
            return $next($request);
        } 

        if($this->auth->user()->idrol === 1){
            return $next($request);
        }

        if($this->auth->user()->idrol === 3){
            return $next($request);
        }

        return redirect()->to('/');
    }
}

