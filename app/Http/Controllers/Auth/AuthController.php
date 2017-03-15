<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {
    function postLogin(Request $request){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return back()->with('error', 'Не нашли пользователя');

        echo 'asdasd'; exit();


        return redirect()->intended('dashboard');
    }

}
