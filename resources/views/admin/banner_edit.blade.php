@extends('header')

@section('content')


<main class="py-4">
    <div class="container">
    <a href="{{ route('admin.admin.top') }} "class="btn btn-primary">←戻る</a>
    <h3>バナー管理</h3>

     <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data" id="bannerForm">
            @csrf
             <div class="form-group" id="bannerImages">
                @forelse ($image as $item)
            <div class="banner-item" data-banner-id="{{ $item->id }}">
                <img src="{{ asset($item->image) }}" alt="Banner Image" style="max-width: 200px;" class="banner-preview">
                <input type="file" name="updateBanner[{{ $item->id }}]" class="form-control-file mt-2 banner-input" data-preview=".banner-preview">
                <button type="button" class="btn btn-danger mt-2 deleteBanner" data-banner-id="{{ $item->id }}">削除</button>
            </div>
                @empty
                <img src="{{ asset('default-banner.jpg') }}" alt="Default Banner Image" style="max-width: 200px;">
                @endforelse
            </div> 

            <div id="newBanners">
            {{-- 新しいバナー画像のプレビューとファイル入力フィールドがここに追加される --}}
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