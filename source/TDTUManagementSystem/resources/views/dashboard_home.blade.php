@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3 mt-1">
                <div class="card text-white">
                    <div class="card-body bg-primary">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Sinh viên')}}</h2>
                                <h5>{{count($students)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-1">
                <div class="card text-white">
                    <div class="card-body bg-success">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-chalkboard-teacher fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Giảng viên')}}</h2>
                                <h5>{{count($teachers)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-1">
                <div class="card text-white">
                    <div class="card-body bg-danger">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-chalkboard fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Khoa')}}</h2>
                                <h5>{{count($faculties)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-1">
                <div class="card text-white">
                    <div class="card-body bg-dark">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-school fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Lớp')}}</h2>
                                <h5>{{count($groups)}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
