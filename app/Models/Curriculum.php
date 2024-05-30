<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    // テーブル名を指定
    protected $table = 'curriculums';

    public function deliveryTime() {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id', 'id');
    }

    public function curriculumProgress() {
        return $this->hasMany(CurriculumProgress::class, 'curriculums_id', 'id');
    }

    public function grade()
        {
            return $this->belongsTo(Grade::class, 'grade_id', 'id');
        }
}
