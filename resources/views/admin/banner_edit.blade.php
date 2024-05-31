@extends('layouts.app')

@section('content')


<main class="py-4">
    <div class="container">
    <a href="{{ route('admim.top') }} "class="btn btn-primary">←戻る</a>
    <h2>バナー管理</h2>

    <form action="route('admin.banners.store')" method="POST" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">
        <div class="form-group">
            <img src="{{ asset($banner->image_path) }}">
            <label for="banner">ファイルを選択</label>
            <input type="file" name="banner" class="form-control">
        </div>
	    <button type="submit" class="btn btn-primary mt-2">登録</button>
    </form>


    </div>
</main>
@endsection