<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
</head>
<body class="antialiased">
    <div class="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                                   class="nav-link dropdown-toggle"
                                   id="dropdown-link"
                                   role="button"
                                   data-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false">
                                    {{$user->lastname}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-link">
                                    <div class="dropdown-divider"></div>
                                    <form action="{{url('/logout')}}" method="post">
                                        @csrf
                                        <button type="submit"
                                                class="dropdown-item">
                                            {{__('Đăng xuất')}}
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
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Dashboard') }}</div>

                            <div class="card-body">
                                @if (session('Success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('Success') }}
                                    </div>
                                @endif

                                {{ __('Welcome '.Auth::user()->account) }}
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
