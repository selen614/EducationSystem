<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use DB;

class BannerController extends Controller
{
    // 表示
    public function showBannerEdit()
    {
        $banner = Banner::all();
        return view('admin.banner_edit', ['image' => $banner]); 
    }

    //　登録ボタン処理
    public function bannerStore(Request $request)
    {
        $request->validate([                       //バリデーション
            'newBanner.*' => 'image|mimes:jpg,png|max:2048', 
            'updateBanner.*' => 'image|mimes:jpg,png|max:2048',  
        ]);
    
        if ($request->hasFile('updateBanner')) {
            foreach ($request->file('updateBanner') as $id => $image) {
                $banner = Banner::findOrFail($id);

                // 既存の画像ファイルが存在する場合は削除
                if ($banner->image) {
                    Storage::disk('public')->delete($banner->image);
                }

                // 新しい画像ファイルを保存
                $path = $image->store('public/banners');
                $banner->image = str_replace('public/', 'storage/', $path);
                $banner->save();
            }
        }

        // 新しいバナーの保存
        if ($request->hasFile('newBanner')) {
            foreach ($request->file('newBanner') as $image) {
                if ($image) {
                    $path = $image->store('public/banners');
                    $banner = new Banner();
                    $banner->image = str_replace('public/', 'storage/', $path);
                    $banner->save();
                }
            }
        }

        return redirect()->route('admin.show.banner.edit')->with('success', 'バナーが更新されました。');
    }

    
    
    
    //削除
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
             $banner = Banner::findOrFail($id); // IDに対応するバナーを取得
             Storage::disk('public')->delete('banners/'.$banner->image);// バナーの画像ファイルも削除する場合
             $banner->delete();// バナーレコードを削除
    
            DB::commit();
            return response()->json(['success' => true], 200);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => '削除に失敗しました'], 500);
        }
    }
    


}
