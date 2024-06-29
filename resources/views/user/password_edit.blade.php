@extends('user.layouts.app')

@section('title', 'パスワード変更')

@section('content')
<a class="back_link" href="{{ route('user.show.profile.edit') }}">&larr;戻る</a>

<div id="user_passwordEdit">
    <h2>パスワード変更</h2>

    <div>
        <label for="old_password">旧パスワード：</label>
        <input type="password" id="old_password" name="old_password" required minlength="8">
    </div>

    <div>
        <label for="new_password">新パスワード：</label>
        <input type="password" id="new_password" name="new_password" required minlength="8">
    </div>

    <div>
        <label for="confirm_password">新パスワード確認：</label>
        <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
    </div>

    <button type="submit" id="user_passwordEdit_submit">登録</button>
</div>
@endsection