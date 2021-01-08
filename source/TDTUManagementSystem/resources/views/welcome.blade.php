<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}" type="text/css">
    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <img src="{{asset('images/logo.png')}}" alt="" width="100" height="45">
                <span class="h3">{{__('Hệ Thống Quản Lý Thông Tin Sinh Viên')}}</span>
            </a>
            <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#colapse"
                    aria-controls="collapse"
                    aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <main class="py-5">
        @yield('content')
    </main>
    </body>
    <script src="{{asset('js/app.js')}}"></script>
</html>
