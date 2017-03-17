<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class CustomerAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        if ($this->auth->guest())
            return redirect()->guest('/')->with('error', 'У Вас нет прав для просмотра');

        if ($this->auth->user()->type_id != 4)
            return redirect()->guest('/')->with('error', 'У Вас нет прав для просмотра');

        return $next($request);
    }
}
