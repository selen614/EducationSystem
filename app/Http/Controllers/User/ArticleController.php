<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the specified article.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showArticle($id)
    {
        $article = Article::findOrFail($id);

        return view('user.article', compact('article'));
    }

    public function index()
    {
        $userArticles = Article::userArticles()->get();

        return view('user.articles.index', compact('userArticles'));
    }
}
