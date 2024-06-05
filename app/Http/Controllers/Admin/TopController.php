<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TopController extends Controller
{
    public function showTop(){
        
        // 管理者が認証されているかチェック
    if (Auth::guard('admin')->check()) {
        // 管理者がログインしている場合の処理
        $admin = Auth::guard('admin')->user();
        return view('admin.top', ['admin' => $admin]);
    } else {
        // 管理者がログインしていない場合の処理
        return redirect()->route('admin.auth.login');
    }
    }

}
