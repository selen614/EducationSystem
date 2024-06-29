<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\CurriculumProgress;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Display the user's progress.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProgress()
    {
        $user = Auth::user();
        $progresses = CurriculumProgress::where('user_id', $user->id)->get();
        $curriculums = Curriculum::all();

        // 学年データ
        $grades = [
            '小学校1年生', '小学校2年生', '小学校3年生',
            '小学校4年生', '小学校5年生', '小学校6年生',
            '中学校1年生', '中学校2年生', '中学校3年生',
            '高校1年生', '高校2年生', '高校3年生'
        ];

        return view('user.curriculum_progress', compact('user', 'progresses', 'curriculums', 'grades'));
    }
}
