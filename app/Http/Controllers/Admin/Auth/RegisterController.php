<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Providers\RouteServiceProvider;//追記
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;            //追記

class RegisterController extends Controller
{
    public function index()
  {
    return view('admin.auth.register');
  }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/home';      //修正

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/admin/top';

    public function __construct()
    {
        $this->middleware('guest:admin');       //修正
    }
    protected function guard()                  //追記
    {                                           //追記
        return Auth::guard('admin');            //追記
    }                                           //追記

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'kana' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = $this->create($request->all());
        Auth::login($admin); // 新規ユーザーをログイン
        return redirect()->route('admin.admin.top');
    }
}


