<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-primary" href="{{ url('/') }}">
            <img src="{{asset('images/logo.png')}}" alt="" width="100" height="45">
            <span class="h3">{{__('Hệ Thống Quản Lý Thông Tin Sinh Viên')}}</span>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#collapse"
                aria-controls="collapse"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    @if (Auth::check())
                        <a href="#"
                           class="nav-link dropdown-toggle"
                           id="dropdown-link"
                           role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <i class="far fa-user"></i><span class="pl-2">{{$user->firstname." ".$user->middlename." ".$user->lastname}}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-link">
                            @can('admin')
                                <a href="{{url('/admin/dashboard')}}" class="dropdown-item">
                                    <i class="fas fa-chalkboard"></i><span class="pl-2">{{__('Admin Dashboard')}}</span>
                                </a>
                            @endcan
                            <div class="dropdown-divider"></div>
                            <form action="{{url('/logout')}}" method="post">
                                @csrf
                                <button type="submit"
                                        class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i><span class="pl-2">{{__('Đăng xuất')}}</span>
                                </button>
                            </form>
                        </div>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="py-5">
    @yield('content')
</main>
</body>
<script src="{{asset('js/app.js')}}"></script>
</html>


