<?php

namespace App\Http\Controllers\Admin;                       //修正

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider; //追記
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;                        //追記

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
    protected $redirectTo = '/admin/home';                  //修正


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


    public function logout(Request $request)                //追記
    {                                                       //追記
        $this->performLogout($request);                     //追記
        return redirect('admin/login');                     //追記
    }                                                       //追記
}
