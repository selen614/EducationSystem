@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="top-wrapper">
        <div class="banner-area">
        <ul class="slider">
        @foreach ($banners as $banner)
            <li><img src="{{ asset($banner->image) }}" alt="バナー画像"></li>
        @endforeach
        </ul>
        </div>
        <div class="article-container">
            <div class="article-title">お知らせ</div>
            <div class="article-area">
            <ul class="article-ul">
                @foreach ($articles as $article)
                    <li class="article-li">
                        <div class="date-area">
                            <a href="#">{{ $article->formatted_posted_date }}</a>
                        </div>
                        <div class="title-area">
                            <a href="#">{{ $article->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
