@extends('layouts.app2')


@section('title')
Register
@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('content')
    <div class="content">
        <h2 class="content__title">Register</h2>
        <div class="form">
            <form action="/register" method="post">
                @csrf
                <div class="form__group">
                    <label class="form__group--label" for="name">お名前</label>
                    <input class="form__group--text" name="name" type="text" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                </div>
                <div class="error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__group">
                    <label class="form__group--label" for="email">メールアドレス</label>
                    <input class="form__group--text" name="email" type="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__group">
                    <label class="form__group--label" for="password">パスワード</label>
                    <input class="form__group--text" name="password" type="password" placeholder="例: coachtech1106" value="{{ old('password') }}">
                </div>
                <div class="error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="next__link">
                    <button class="next__button">登録</button>
                </div>
            </form>
        </div>
    </div>
@endsection