<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use Hash;
use App\Model\Customer;

class AuthController extends Controller {
    function postLogin(Request $request, $from = false){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if (User::where('email', $request->input('email'))->count() > 0)
                return back()->with('error', 'Почтовый адрес уже зарегистрирован');

            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->type_id = 4;
            $user->save();

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->save();

            Auth::loginUsingId($user->id);
        }

        $user = Auth::user();
        if ($user->type_id == 1)
            return redirect()->action('Admin\IndexController@getIndex');
        else if ($user->type_id == 2)
            return redirect()->action('Restoran\OrderController@getList');
        else if ($user->type_id == 3)
            return redirect()->action('Restoran\OrderController@getList');
        else if ($user->type_id == 4)
            return redirect()->action('Customer\CabinetController@getCabinet');

        abort(404);
    }

    function getLogout () {
        Auth::logout();

        return redirect()->to('/');
    }

}
