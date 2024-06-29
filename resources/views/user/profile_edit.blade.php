@extends('user.layouts.app')

@section('title', 'プロフィール設定')

@section('content')
<a class="back_link" href="{{ route('user.show.top') }}">&larr;戻る</a>
<h1 id="user_profileEdit_title">プロフィール変更</h1>

<form id="user_profileEdit_form" action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div id="user_profileEdit_image_section">
        <p id="user_profileEdit_image_label">プロフィール画像</p>
        <img src="{{ $user->profile_image ? asset('storage/images/profile/'.$user->profile_image) : asset('storage/images/noimage.png') }}" alt="プロフィール画像" id="user_profileEdit_image">
        <label for="user_profileEdit_image_input" id="user_profileEdit_image_input_label">ファイルを選択</label>
        <input type="file" id="user_profileEdit_image_input" name="profile_image">
    </div>

    <div class="user_profileEdit_form_group">
        <label for="user_profileEdit_name">ユーザーネーム</label>
        <input type="text" id="user_profileEdit_name" name="name" value="{{ $user->name }}" required>
    </div>

    <div class="user_profileEdit_form_group">
        <label for="user_profileEdit_kana">カナ</label>
        <input type="text" id="user_profileEdit_kana" name="kana" value="{{ $user->kana }}" required>
    </div>

    <div class="user_profileEdit_form_group">
        <label for="user_profileEdit_email">メールアドレス</label>
        <input type="email" id="user_profileEdit_email" name="email" value="{{ $user->email }}" required>
    </div>

    <div class="user_profileEdit_form_group">
        <label for="user_profileEdit_password">パスワード</label>
        <a class="back_link" href="{{ route('user.show.password.edit') }}" id="user_profileEdit_password_link">パスワードを変更する</a>
    </div>

    <button type="submit" id="user_profileEdit_submit">登録</button>
</form>
@endsection