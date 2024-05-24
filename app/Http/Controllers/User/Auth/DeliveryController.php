<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use App\Models\Grade;
use App\Models\CurriculumProgress;

class DeliveryController extends Controller
{
    //配信画面表示
    public function showDelivery($id) {
        $curriculum = Curriculum::find($id);

        // delivery_timesテーブルからデータを取得
        $time = DeliveryTime::where('curriculums_id', $curriculum->id)->first();

        // gradeテーブルからデータを取得
        $grade = Grade::all();

        // 現在の日時を取得
        $currentDateTime = now();

        // delivery_fromとdelivery_toの値を取得
        $deliveryFrom = $time->delivery_from;
        $deliveryTo = $time->delivery_to;

        //alway_delivery_flgの値を取得
        $alwaysDeliveryFlag = $curriculum->alway_delivery_flg;

        // データが見つかったかどうかをチェック
        if (!$curriculum) {
            // データが見つからない場合の処理を記述
            abort(404);
        }

        return view('user.delivery', compact('curriculum','time','grade','currentDateTime','deliveryFrom','deliveryTo','alwaysDeliveryFlag'));
    }

    //クリアフラグ更新処理
    public function complete($complete_id) {
        // ユーザーのIDを取得
        $user_id = Auth::id();
    
        // トランザクション開始
        DB::beginTransaction();

        try {
                // 新しい進行状況レコードを作成
                CurriculumProgress::create([
                    'complete_id' => $curriculum_id,
                    'user_id' => $user_id,
                    'clear_flg' => 1,
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                return back();
            }
    
        // 他の処理（リダイレクトなど）が必要であればここで行う
    
        return redirect()->back();
    }
}
