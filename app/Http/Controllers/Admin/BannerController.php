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
        $banners = Banner::all();
        return view('admin.banner_edit', ['banners' => $banners]); 
    }

    //　登録ボタン処理
    public function bannerStore(Request $request)
    {
        $request->validate([                       //バリデーション
            'banner' => 'required|image|mimes:jpg,png|max:2048',  
        ]);
    
        $image = $request->file('banner');// アップロードされた画像ファイルを取得

        if ($image) {                     // アップロードされた画像がある場合
            $path = $image->store('public/banners');     // バナー画像を保存するパスを指定（storage/app/publicディレクトリ内）

            $banner = new Banner();
            $banner->image = $path;
            $banner->save();
        }
        return redirect()->route('admin.showBannerEdit');
    }

    
    //削除
    public function destroy($id)
    {
        try {
            $banner = Banner::findOrFail($id); // IDに対応するバナーを取得
            Storage::delete($banner->image);// バナーの画像ファイルも削除する場合
            $banner->delete();// バナーレコードを削除

            return response()->json(['success' => true], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => '削除に失敗しました'], 500);
        }
    }
    


}
