@extends('user.layouts.app')

@section('title', 'お知らせ')

@section('content')
<a class="user_article_back_link" href="{{ route('user.show.top') }}">&larr;戻る</a>
<div class="user_article_notification">
    <p class="user_article_date">{{ $article->created_at->format('Y年m月d日') }}</p>
    <h1 class="user_article_title">{{ $article->title }}</h1>
    <div class="user_article_content">
        {{ $article->content }}
    </div>
</div>
@endsection>