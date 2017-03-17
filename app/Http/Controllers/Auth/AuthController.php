<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthController extends Controller {
    function postLogin(Request $request){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
            return back()->with('error', 'Неверные данные для доступа');

        $user = Auth::user();
        if ($user->type_id == 1)
            return redirect()->action('Admin\IndexController@getIndex');
        else if ($user->type_id == 2)
            return redirect()->action('Admin\IndexController@getIndex');
        else if ($user->type_id == 3)
            echo 'рестораны <br/>';
        else if ($user->type_id == 4)
            echo 'пользователи <br/>';

        abort(404);
    }

    function getLogout () {
        Auth::logout();

        return redirect()->to('/');
    }

}
