<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function showArticleList()
    {
        $articles = Article::all();
        return view('admin.article_list', compact('articles'));
    }

    public function showArticleCreate()
    {
        return view('admin.article_create');
    }

    public function showArticleEdit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article_edit', compact('article'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posted_at' => 'required|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Article::create($request->all());

        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを作成しました');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'posted_at' => 'required|date',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを更新しました');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.show.article.list')->with('success', 'お知らせを削除しました');
    }
}
