<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function showBannerEdit()
    {
        // バナー編集の処理
        return view('admin.banner_edit'); // 編集画面を表示するビューを返す
    }

    //更新　登録ボタン処理
    public function store(Request $request) {
        $banner = $request->file('banner');
        $file_id = $image->getClientOriginalName();
        $banner->storeAs('public/images', $file);//storage/app/public/imagesフォルダ内に保存
        $image_path = 'storage/images/' . $file;//データベース登録用に、ファイルパスを作成

        DB::beginTransaction();
        try {
            Banner::create(['image_path' => $image_path]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.banner_edit')->with('error', 'バナーの登録に失敗しました');
        }

        return redirect()->route('admin.banner_edit')->with('success', 'バナーが登録されました');
    }


    //削除
    public function destroy(Banner $banner) {
        DB::beginTransaction();
        try {
            $banner->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.banner_edit')->with('error', 'バナーの削除に失敗しました');
        }

        return redirect()->route('admin.banner_edit')->with('success', 'バナーが削除されました');
    }


}
