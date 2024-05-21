@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="top_wrapper">
        <div class="banner_area">
        <ul class="slider">
        @foreach ($banners as $banner)
            <li><img src="{{ asset($banner->image) }}" alt="バナー画像"></li>
        @endforeach
        </ul>
        </div>
        <div class="article_container">
            <div class="article_title">お知らせ</div>
            <div class="article_area">
            <ul class="article_ul">
                @foreach ($articles as $article)
                    <li class="article_li">
                    <a class="date_area" href="">{{ $article->formatted_posted_date }}</a>
                    <a class="title_area" href="">{{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
            </div>
            </div>
        </div>
    </div>
@endsection
