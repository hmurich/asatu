<?php
namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
use Hash;
use App\Model\Customer;
use App\Model\UserForgotPass;
use App\Model\MailSend;

class AuthController extends Controller {
    function postCheckNewEmail(Request $request){
        if (!$request->has('email'))
            abort(404);

        if (User::where('email', $request->input('email'))->count() > 0)
            return '1';

        return '0';
    }

    function postLogin(Request $request, $from = false){
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $previousUrl = app('url')->previous();

            if ($request->has('login'))
                return redirect()->to($previousUrl.'?'. http_build_query(['login'=>'1']))->withInput($request->all())->with('login_error', 'Не правильный email/пароль');

            if (User::where('email', $request->input('email'))->count() > 0)
                return back()->with('error', 'Почтовый адрес уже зарегистрирован');

            $user = new User();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->type_id = 4;
            $user->save();

            $customer = new Customer();
            $customer->user_id = $user->id;
            $customer->name = $request->input('name');
            $customer->phone = $request->input('phone');
            $customer->save();

            $text = '<p>Ваш пароль - '.$request->input('password').'</p>';
            $text .= '<p>Ваше имя - '.$customer->name.'</p>';
            $text .= '<p>Ваше телефон - '.$customer->phone.'</p>';

            //MailSend::send($user->email, 'Ваш пароль для входа в asakely.kz', $text);

            Auth::loginUsingId($user->id);
        }

        $user = Auth::user();

        UserForgotPass::where('user_id', $user->id)->delete();


        if ($user->type_id == 1)
            return redirect()->action('Admin\IndexController@getIndex');
        else if ($user->type_id == 2)
            return redirect()->action('Moderator\CabinetController@getCabinet');
        else if ($user->type_id == 3)
            return redirect()->action('Restoran\OrderController@getList');
        else if ($user->type_id == 4)
            return back();

        abort(404);
    }

    function postForgotPass(Request $request){
        if (!$request->has('email'))
            return back()->with('error', 'Не найден email');

        if (User::where('email', $request->input('email'))->count() == 0)
            return back()->with('error', 'Не найден email');

        $confirm = rand(100000, 999999);

        $user = User::where('email', $request->input('email'))->first();

        $pass = new UserForgotPass();
        $pass->user_id = $user->id;
        $pass->confirm_user = $confirm;
        $pass->save();

        $text = '<p>Для генерации нового пароля пройдите ';
        $text .='<a href="http://asatu.local/forgot-pass?user_id='.$user->id.'&confirm='.$confirm.'">по этой ссылке</a></p>';

        MailSend::send($user->email, 'Забыли пароль', $text);

        return back()->with('success', 'На вашу почту высланы инструкции');
    }

    function getForgotPass(Request $request){
        if (!$request->has('user_id') || !$request->has('confirm'))
            abort(404);

        /*
        echo $request->input('user_id');
        echo '<pre>'; print_r($request->all()); echo '</pre>';
        echo $request->input('confirm');
        exit();
        */
        $user = User::findOrFail($request->input('user_id'));

        $for_pass = UserForgotPass::where('user_id', $user->id)->where('confirm_user', $request->input('confirm'))->first();
        if (!$for_pass)
            abort(404);

        $pass = rand(100000, 999999);

        $user->password = Hash::make($pass);
        $user->save();

        $for_pass->delete();

        $user->sendPasswordToEmail($pass);

        return redirect()->to('/')->with('success', 'На вашу почту выслан пароль');
    }

    function getLogout () {
        Auth::logout();

        return redirect()->to('/');
    }

}
