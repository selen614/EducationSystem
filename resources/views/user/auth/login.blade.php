@extends('user.layouts.app')

@section('content')

<div class="register_btn">
    <button type="button" class="btn1" onclick="location.href='{{ route('user.show.register') }}'">
    新規会員登録はこちら
    </button>
</div>

<div class="container">
<div class="card">
                
    <div class="card_header">ログイン</div>

        <div class="card_body">
            <form method="POST" action="{{ route('user.login') }}">
                @csrf
                
                <div class="center">
                    <div class="col_md_6">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="email" class="form_control 
                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <p class="invalid_feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>

                    <div class="col_md_6">
                        <label for="password">パスワード</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <p class="invalid_feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                    </div>

                </div>

                <button type="submit" class="btn2 btn_primary" >
                ログイン
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
