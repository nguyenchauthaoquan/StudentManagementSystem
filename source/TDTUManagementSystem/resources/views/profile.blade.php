<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <title></title>
</head>
<body class="antialiased" style="background-color: #F7F7F7">
<div class="app">
    <nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">
                {{ __('TDTU') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse" aria-controls="collapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        @if (Auth::check())
                            <a href="#"
                               class="nav-link dropdown-toggle text-white"
                               id="dropdown-link"
                               role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true"
                               aria-expanded="false">
                                {{$user->firstname." ".$user->middlename." ".$user->lastname}}
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
    <main class="py-4">
        <div class="container">
            <div class="row row-information">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Số CMND')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->id_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Ngày sinh')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->birthday}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Nơi sinh')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->place_of_birth}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Nguyên quán')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->origin}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Giới tính')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->gender}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Tôn giáo')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->religion}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Dân tộc')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->kin}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0 font-weight-bold">{{__('Nơi cấp CMND')}}</h5>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->place_of_id_number}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
