<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Method to save initial data
    public static function boot()
    {
        parent::boot();

        // Save initial data when the model is booted
        self::saveInitialData();
    }

    // Method to save initial data
    protected static function saveInitialData()
    {
        $grades = [
            ['name' => '小学校1年生'],
            ['name' => '小学校2年生'],
            ['name' => '小学校3年生'],
            ['name' => '小学校4年生'],
            ['name' => '小学校5年生'],
            ['name' => '小学校6年生'],
            ['name' => '中学校1年生'],
            ['name' => '中学校2年生'],
            ['name' => '中学校3年生'],
            ['name' => '高校1年生'],
            ['name' => '高校2年生'],
            ['name' => '高校3年生'],
        ];

        foreach ($grades as $grade) {
            self::create($grade);
        }
    }
}
