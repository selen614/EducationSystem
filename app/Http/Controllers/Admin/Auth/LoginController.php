<?php

namespace App\Http\Controllers\Admin\Auth;                      //修正

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;
use App\Models\Admin;                       
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;

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
    //use AuthenticatesUsers;
    use AuthenticatesUsers {                                //追記
        logout as performLogout;                            //追記
    }                                                       //追記

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/top';                  //修正


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout'); //修正
    }
    protected function guard()                              //追記
    {                                                       //追記
        return Auth::guard('admin');                        //追記
    }                                                       //追記

    public function index()
    {
      return view('admin.auth.login');
    }

    public function logout(Request $request)                //追記
    {                                                       //追記
        $this->performLogout($request);                     //追記
        return redirect()->route('admin.auth.login');                 //追記
    }    
    public function login(LoginRequest $request)  // LoginRequestを使用
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->withInput($request->only('email', 'remember'));
    }
    
}

