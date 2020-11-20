<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet">
        <title>Student Management System</title>
    </head>
    <body>
        <div class="wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
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
                            <li class="nav-item">
                                <a href="#" class="nav-link">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="sidebar col-md-3 col-lg-2">
                        <div class="sidebar-nav">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fas fa-chart-line"></i><span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/students')}}" class="nav-link">
                                        <i class="fas fa-school"></i><span>Student Management</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/teachers')}}" class="nav-link">
                                        <i class="fas fa-chalkboard-teacher"></i><span>Teacher Management</span>
                                    </a>
                                </li>
                            </ul>
                            <h6 class="sidebar-heading px-3 mt-4 mb-1 text-white">
                                <span>Education Programs</span><i class="fas fa-plus-circle"></i>
                            </h6>
                            <ul class="nav flex-column mb-2">
                                <li class="nav-item">
                                    <a href="{{url('/admin/faculties')}}" class="nav-link">
                                        <i class="fas fa-university"></i><span>Faculty Management</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/admin/groups')}}" class="nav-link">
                                        <i class="fas fa-users"></i><span>Groups Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main col-md-9 col-lg-10">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('/js/app.js')}}"></script>
    </body>
</html>
