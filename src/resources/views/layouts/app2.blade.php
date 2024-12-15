<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common2.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="header__title">FashionablyLate</h1>
            {{-- ボタンの表示を条件分岐 --}}
            @if (request()->routeIs('register'))
                {{-- 新規登録画面の場合 --}}
                <a class="header__link" href="/login">login</a>
            @elseif (request()->routeIs('login'))
                {{-- ログイン画面の場合 --}}
                <a class="header__link" href="/register">register</a>
            @endif
    </header>


    <main>
        @yield('content')
    </main>
</body>