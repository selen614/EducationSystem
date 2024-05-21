@extends('user.layouts.app')

@section('content')
<div class="return_btn">
    <a href="">←戻る</a>
</div>
<div class="container">
    <div class="curriculums_wrapper">
        <div class="attendance_area">
            <div class="video_area">
                <p>仮エリア</p>
                <video controls poster="画像のURL" src="#"></video>
                <img src="">
            </div>
            <div class="clear_area">
                <form class="" action="#" method="POST">
                    @csrf
                    <button  type="button" class="clear_btn">受講しました</button>
                </form>
            </div>
        </div>
        <div class="grade_area">
            <p>小学校1年生</p>
        </div>
        <div class="description_area">
            <div class="description_title">
                <p>授業タイトル</p>
            </div>
            <div class="description_text">
                <p>説明文</p>
                <p>テキストテキストテキストテキストテキストテキストテキストテキスト
                    テキストテキストテキストテキストテキストテキストテキスト</p>
            </div>
        </div>
    </div>
</div>
@endsection
