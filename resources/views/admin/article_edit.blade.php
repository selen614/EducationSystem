@extends('admin.layouts.app')

@section('content')
<h1>お知らせ編集</h1>
<form action="{{ route('admin.show.article.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="posted_at">投稿日時</label>
    <input type="date" name="posted_at" id="posted_at" value="{{ $article->posted_at }}" required>
    <br>
    <label for="title">タイトル</label>
    <input type="text" name="title" id="title" value="{{ $article->title }}" required>
    <br>
    <label for="content">本文</label>
    <textarea name="content" id="content" required>{{ $article->content }}</textarea>
    <br>
    <button type="submit">更新</button>
</form>
@endsection