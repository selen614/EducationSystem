@extends('admin.layouts.app')

@section('content')
<h1>お知らせ新規登録</h1>
<form action="{{ route('admin.show.article.store') }}" method="POST">
    @csrf
    <label for="posted_at">投稿日時</label>
    <input type="date" name="posted_at" id="posted_at" required>
    <br>
    <label for="title">タイトル</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="content">本文</label>
    <textarea name="content" id="content" required></textarea>
    <br>
    <button type="submit">登録</button>
</form>
@endsection