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
                    <a class="date-area" href="#">{{ $article->formatted_posted_date }}</a>
                    <a class="title-area" href="#">{{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
