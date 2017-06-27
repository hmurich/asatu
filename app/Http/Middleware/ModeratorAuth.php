<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class ModeratorAuth {
    protected $auth;

    function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next){
        //Auth::loginUsingId(6);

        if ($this->auth->guest())
            return redirect()->guest('/')->with('error', 'У Вас нет прав для просмотра');

        if (!in_array($this->auth->user()->type_id, array(1, 2)))
            return redirect()->guest('/')->with('error', 'У Вас нет прав для просмотра');

        return $next($request);
    }
}
