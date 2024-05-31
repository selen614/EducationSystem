@extends('layouts.app')

@section('content')


<main class="py-4">
<div class="container">
            @foreach($admin as $admin)
                <div>
                    <p>ユーザーネーム：{{ $admin->name }}</p>
                    <p>メールアドレス：{{ $admin->email }}</p>
                </div>
            @endforeach
        </div>
</main>
@endsection