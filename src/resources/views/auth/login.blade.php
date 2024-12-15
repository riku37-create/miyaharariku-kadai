@extends('layouts.app2')


@section('title')
Login
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection


@section('content')
<main>
    <div class="content">
        <h2 class="content__title">Login</h2>
        <div class="form">
            <form action="/login" method="post">
                @csrf
                <div class="form__group">
                    <label class="form__group--label" for="email">メールアドレス</label>
                    <input class="form__group--text" name="email" type="email" placeholder="例: test@example.com">
                </div>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
                <div class="form__group">
                    <label class="form__group--label" for="password">パスワード</label>
                    <input class="form__group--text" name="password" type="password" placeholder="例: coachtech1106">
                </div>
                @error('password')
                <p class="error">{{ $message }}</p>
                @enderror
                <div class="next__link">
                    <button class="next__button">ログイン</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection