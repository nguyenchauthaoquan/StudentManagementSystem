<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Styles -->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <title>Student Management System</title>

    </head>
    <body class="antialiased">
        <div class="wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
                <div class="container-fluid">
                    <button class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button class="navbar-toggler"
                            type="button" data-toggle="collapse"
                            data-target="#collapse" aria-controls="collapse"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                       aria-expanded="false"
                                    >
                                        {{Auth::user()->student->firstname." ".Auth::user()->student->middlename." ".Auth::user()->student->lastname}}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-link">
                                        <div class="dropdown-divider"></div>
                                        <a href="{{url('/home')}}" class="dropdown-item">{{__('Thoát')}}</a>
                                    </div>

                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="sidebar col-md-4 col-lg-2">
                        <div class="sidebar-nav position-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{url('/admin/dashboard')}}" class="nav-link">
                                        <i class="fas fa-chart-line"></i><span>{{__('Dashboard')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/students')}}" class="nav-link">
                                        <i class="fas fa-school"></i><span>{{__('Quản Lý Sinh Viên')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/teachers')}}" class="nav-link">
                                        <i class="fas fa-chalkboard-teacher"></i><span>{{__('Quản Lý Giảng Viên')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/programs')}}" class="nav-link">
                                        <i class="fas fa-graduation-cap"></i><span>{{__('Quản Lý Chương Trình Đào Tạo')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/faculties')}}" class="nav-link">
                                        <i class="fas fa-university"></i><span>{{__('Quản Lý Khoa')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/subjects')}}" class="nav-link">
                                        <i class="fas fa-chart-line"></i><span>{{__('Quản Lý Môn Học')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/groups')}}" class="nav-link">
                                        <i class="fas fa-users"></i><span>{{__('Quản Lý Lớp')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/users')}}" class="nav-link">
                                        <i class="fas fa-users"></i><span>{{__('Quản Lý Tài Khoản')}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main col-md-8 col-lg-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>
