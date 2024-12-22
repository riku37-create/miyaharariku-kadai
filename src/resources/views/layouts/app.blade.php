<!DOCTYPE html>
<html lang="ja">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @livewireStyles
</head>


<body>
    @livewireScripts
    <header class="header">
        <h1 class="header__title">FashionablyLate</h1>
        @if(request()->is('admin'))
        <a class="header__link" href="/login">logout</a>
        @endsection
    </header>

    <main>
        <div class="content">
            <div class="subtitle">
                <h2 class="subtitle__title">@yield('subtitle')</h2>
            </div>
            <div>
                @yield('content')
            </div>
        </div>
    </main>
</body>


</html>