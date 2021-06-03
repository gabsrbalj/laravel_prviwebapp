<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="widh=device-width, initial-scale=1.0">
        <title>Laravel App</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="bg-gray-500">
        <nav class="p-6  flex justify-between mb-5 text-white" style="background-color: rgba(51, 50, 46)">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('home') }}" class="p-3">Naslovnica</a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}" class="p-3">Nadzorna ploča</a>
                </li>
                <li>
                    <a href="{{ route('posts') }}" class="p-3">Objave</a>
                </li>
                @if (auth()->user() && auth()->user()->is_admin==1)
                <li>
                    <a href="{{ route('admin') }}" class="p-3">Admin - nadzorna ploča</a>
                </li>
                @endif

            </ul>

            <ul class="flex items-center">
                @auth
                    <li>
                        <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="p-3">Odjavi se</a>
                    </li>
                @endauth

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="p-3">Prijavi se</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="p-3">Registriraj se</a>
                    </li>
                @endguest

            </ul>
        </nav>
        @yield('content')
    </body>
</html>
