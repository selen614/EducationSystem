@extends('header')

@section('content')


<main class="py-4">
    <div class="container">
    <a href="{{ route('admin.admin.top') }} "class="btn btn-primary">←戻る</a>
    <h2>バナー管理</h2>

    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
            @if ($banner->isNotEmpty())
                    @foreach ($banner as $item)
                        <div>
                            <img src="{{ asset($item->image) }}" alt="Banner Image" style="max-width: 200px;">
                            <button type="button" class="btn btn-danger mt-2 deleteBanner" data-banner-id="{{ $item->id }}">削除</button>
                        </div>
                    @endforeach
                @else
                    <img src="{{ asset('default-banner.jpg') }}" alt="Default Banner Image" style="max-width: 200px;">
                @endif
            </div>
            <div id="newBanners">
                <!-- 新しいバナー画像のプレビューとファイル入力フィールドがここに追加される -->
            </div>

            <div>
            <button type="button" id="addBanner" class="btn btn-primary">追加</button>
            </div>

            <div>
            <button type="submit" class="btn btn-primary mt-2">登録</button>
            </div>
        </form>
    </div>
</main>

<script src="{{ asset('js/banner.js') }}"></script>

@endsection