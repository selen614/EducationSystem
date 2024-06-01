<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
        }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/top';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //ログイン画面
    public function showLoginForm() {
        return view('user.auth.login');
    }

    //ログアウト後の遷移先指定
    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('user.show.login'); 
    }

    //ログイン方法のカスタマイズ
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // ユーザーのログインを試みる
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // メールアドレスが存在するか確認
        if (!$this->userExists($request->email)) {
            return $this->sendFailedEmailResponse($request);
        }

        // メールアドレスが一致するがパスワードが一致しない
        return $this->sendFailedPasswordResponse($request);
    }

    protected function userExists($email)
    {
        return \App\Models\User::where('email', $email)->exists();
    }

    protected function sendFailedEmailResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.email')],
        ]);
    }

    protected function sendFailedPasswordResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'password' => [trans('auth.password')],
        ]);
    }
}
