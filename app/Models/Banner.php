<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    use HasFactory;

    public function updatebanner($image_path){
        DB::table('banner')->insert([
            'image_file' => $image_path
        ]);
    }
}
