<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['posted_at', 'title', 'content'];

    // ユーザー用
    public function scopeUserArticles($query)
    {
        return $query->where('posted_at', '<=', now());
    }

    // 管理者用
    public function scopeAdminArticles($query)
    {
        return $query;
    }
}
