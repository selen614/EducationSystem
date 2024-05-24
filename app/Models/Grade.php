<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasMany(User::class, 'grade_id', 'id');
    }

    public function curriculum() {
        return $this->hasMany(Curriculum::class, 'grade_id', 'id');
    }
}
