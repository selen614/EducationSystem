<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use Carbon\Carbon;


class CurriculumController extends Controller
{
    public function showCurriculumList(Request $request)
    {
        $grades = Grade::all();
        $currentMonth = Carbon::now()->format('Y年n月'); // 現在の年月を取得
        $currentGrade = $grades->first();

        return view('user/curriculum_list', compact('grades', 'currentMonth', 'currentGrade'));
    }
    public function getClasses(Request $request)
    {
        $gradeId = $request->query('grade_id');
        $month = $request->query('month');

        $classes = Curriculum::where('grade_id', $gradeId)
            ->whereHas('deliveryTimes', function ($query) use ($month) {
                $query->whereMonth('delivery_from', $month);
            })
            ->with('deliveryTimes')
            ->get();

        return response()->json($classes);
    }
}
