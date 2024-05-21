<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //トップ画面表示
    public function showTop() {
        // articlesテーブルからデータを取得
        $articles = Article::all();

        // 日付を適切な形式に変換
        foreach ($articles as $article) {
            $article->formatted_posted_date = Carbon::parse($article->posted_date)->format('Y年m月d日');
        }

        // bannersテーブルからデータを取得
        $banners = Banner::all();

        return view('user.top',compact('articles','banners'));
    }
}
