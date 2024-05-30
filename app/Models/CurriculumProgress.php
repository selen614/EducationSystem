<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    public function curriculum()
        {
            return $this->belongsTo(Curriculum::class, 'curriculums_id', 'id');
        }

    public function user()
        {
            return $this->belongsTo(User::class, 'users_id', 'id');
        }

    protected $fillable = ['curriculums_id', 'users_id', 'clear_flg']; // ホワイトリスト

    protected $casts = [
        'clear_flg' => 'boolean', // clear_flg をブール値としてキャスト
    ];

    // デフォルト値を設定
    protected $attributes = [
        'clear_flg' => 0, // clear_flg のデフォルト値を 0 に設定
    ];

}
