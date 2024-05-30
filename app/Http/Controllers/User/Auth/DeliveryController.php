<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curriculum;
use App\Models\DeliveryTime;
use App\Models\Grade;
use App\Models\CurriculumProgress;
use Illuminate\Support\Facades\DB; 

class DeliveryController extends Controller
{
    //配信画面表示
    public function showDelivery($id) {
        $curriculum = Curriculum::find($id);

        // データが見つかったかどうかをチェック
        if (!$curriculum) {
            // データが見つからない場合の処理を記述
            abort(404);
        }
        
        //ログインしているユーザー情報を全取得
        $user = Auth::user(); 

        // 通常のURLを埋め込みURLに変換
        $videoUrl = $this->convertToEmbedUrl($curriculum->video_url);

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

        //curriculum_progressを取得
        $progress = CurriculumProgress::where('curriculums_id', $curriculum->id)
                                        ->where('users_id', $user->id)
                                        ->first();
                                        
        //curriculum_progressのclear_flgを取得
        if(is_null($progress)){
            $clearFlag = 0;
        }else{
            $clearFlag = $progress->clear_flg;                                           
        }

        //viewにもっていくデータまとめ
        $data = [
            'curriculum' => $curriculum,
            'user' => $user,
            'videoUrl' => $videoUrl,
            'time' => $time,
            'grade' => $grade,
            'currentDateTime' => $currentDateTime,
            'deliveryFrom' => $deliveryFrom,
            'deliveryTo' => $deliveryTo,
            'alwaysDeliveryFlag' => $alwaysDeliveryFlag,
            'clearFlag' => $clearFlag,
        ];


        return view('user.delivery', $data);
    }

    //クリアフラグ更新処理
    public function complete($complete_id) {

        // ユーザーのIDを取得
        $userId = Auth::id();

        // トランザクション開始
        DB::beginTransaction();

        try {
                // 新しい進行状況レコードを作成
                CurriculumProgress::create([
                    'curriculums_id' => $complete_id,
                    'users_id' => $userId,
                    'clear_flg' => 1,
                ]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return back();
            }
    
        // 他の処理（リダイレクトなど）が必要であればここで行う
    
        return redirect()->back();
    }

    //普通のyoutubeURLを埋め込みURLに変換
    private function convertToEmbedUrl($url) {
        if (strpos($url, 'youtube.com/watch') !== false) {
            return str_replace('watch?v=', 'embed/', $url);
        } elseif (strpos($url, 'youtu.be/') !== false) {
            return str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
        } else {
            return $url; // 既に埋め込みURLの場合はそのまま返す
        }
    }
}
