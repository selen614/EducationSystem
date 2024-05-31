<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class TopController extends Controller
{
    public function showTop(){
        $admin = Admin::all(); // 全ての管理者データを取得
        return view('admin.top', ['admin' => $admin]);
    }

}
