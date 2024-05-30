@extends('user.layouts.app')

@section('content')

<div class="login-btn">
    <button type="button" class="btn1" onclick="location.href='{{ route('user.show.login') }}'">
    ログインはこちら
    </button>
</div>

<div class="container">
    <div class="card">
                <div class="card-header">新規会員登録</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.show.register') }}">
                        @csrf
                        <div class="center">
                            <div class="col-md-6">
                                <label for="name">ユーザーネーム</label>
                                <input id="name" type="text" class="form-control 
                                @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>
    
                                @error('name')
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="name_kana">カナ</label>
                                <input id="name_kana" type="text" class="form-control 
                                @error('name_kana') is-invalid @enderror" name="name_kana" value="{{ old('name_kana') }}" required autocomplete="email" autofocus>
    
                                @error('name_kana')
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="email" class="form-control 
                                @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                @error('email')
                                    <p class="invalid_feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="password">パスワード</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                @error('password')
                                    <p class="invalid_feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード確認</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <button type="submit" class="btn2 btn-primary">
                        登録
                        </button>
                    </form>
                </div>
            </div>
</div>
@endsection
