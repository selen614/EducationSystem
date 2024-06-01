<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    // 表示
    public function showBannerEdit()
    {
        $banner = DB::table('banner')->get();
        return view('admin.banner_edit'); 
    }

    //　登録ボタン処理
    public function bannerStore()
    {
        return view('admin.banner_edit'); 
    }

    

    //削除
    public function destroy()
    {
        return view('admin.banner_edit'); 
    }


}
