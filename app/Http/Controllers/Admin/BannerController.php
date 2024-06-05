<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // 表示
    public function showBannerEdit()
    {
        $banner = Banner::all();
        return view('admin.banner_edit', ['banner' => $banner]); 
    }

    //　登録ボタン処理
    public function bannerStore(Request $request)
    {
        $request->validate([                       //バリデーション
            'newBanner.*' => 'image|mimes:jpg,png|max:2048',   
        ]);
    
        if ($request->hasFile('newBanner')) {
            foreach ($request->file('newBanner') as $image) {
                if ($image) {
                    $path = $image->store('public/banners');
                    $banner = new Banner();
                    $banner->image = $path;
                    $banner->save();
                }
            }
        }
        return redirect()->route('admin.show.banner.edit');
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
