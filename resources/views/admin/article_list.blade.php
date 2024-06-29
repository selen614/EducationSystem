@extends('admin.layouts.app')

@section('content')
<h1>お知らせ一覧</h1>
<a href="{{ route('admin.show.article.create') }}">新規登録</a>
<table>
    <thead>
        <tr>
            <th>投稿日時</th>
            <th>タイトル</th>
            <th>アクション</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->posted_at }}</td>
            <td>{{ $article->title }}</td>
            <td>
                <a href="{{ route('admin.show.article.edit', $article->id) }}">変更する</a>
                <form action="{{ route('admin.show.article.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection