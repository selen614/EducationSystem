@extends('header')

@section('content')


<main class="py-4">
    <div class="container">
    <a href="{{ route('admin.showTop') }} "class="btn btn-primary">←戻る</a>
    <h2>バナー管理</h2>

    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                @if ($banners->isNotEmpty())
                    @foreach ($banners as $banner)
                        <div>
                            <img src="{{ asset($banner->image_path) }}" alt="Banner Image">
                            <label for="banner{{ $banner->id }}">ファイルを選択</label>
                            <input type="file" id="banner{{ $banner->id }}" name="banner{{ $banner->id }}" class="form-control">
                            <button type="button" class="btn btn-danger mt-2 deleteBanner" data-banner-id="{{ $banner->id }}">削除</button>
                        </div>
                    @endforeach
                @else
                    <img src="{{ asset('default-banner.jpg') }}" alt="Default Banner Image">
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