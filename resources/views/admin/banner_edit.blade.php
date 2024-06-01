@extends('header')

@section('content')


<main class="py-4">
    <div class="container">
    <a href="{{ route('admim.showTop') }} "class="btn btn-primary">←戻る</a>
    <h2>バナー管理</h2>

    <form action="route('admin.banners.store')" method="POST" enctype='multipart/form-data'>
    @csrf
        <div class="form-group">
        @if ($banner)
            <img src="{{ asset($banner->image_path) }}" alt="Banner Image">
        @else
            <img src="{{ asset('default-banner.jpg') }}" alt="Default Banner Image">
        @endif

        <label for="banner">ファイルを選択</label>
        <input type="file" id="banner" name="banner" class="form-control">

         @if ($banner)
            <button type="button" id="deleteBanner" class="btn btn-danger mt-2">削除</button>
         @endif
        </div>

        <div class="col-md-6">
            <button type="button" id="addBanner" class="btn btn-primary">追加</button>
        </div>

	    <button type="submit" class="btn btn-primary mt-2">登録</button>
    </form>


    </div>
</main>
@endsection