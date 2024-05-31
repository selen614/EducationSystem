<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function showCurriculumList()
    {
        // 授業一覧を表示する処理
        return view('user.curriculum_list'); // 授業一覧を表示するビューを返す
    }
}
