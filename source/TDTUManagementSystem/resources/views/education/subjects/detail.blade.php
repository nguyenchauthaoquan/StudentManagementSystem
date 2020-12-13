@extends('dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 mt-1">
                <div class="card">
                    <div class="card-body bg-primary text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-id-card fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Mã môn học')}}</h2>
                                <h5>{{$subject->id}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-1">
                <div class="card">
                    <div class="card-body bg-success text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-file-signature fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Tên môn học')}}</h2>
                                <h5>
                                    {{$subject->name}}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mt-1">
                <div class="card">
                    <div class="card-body bg-info text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-book-open fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Khoa')}}</h2>
                                <h5>{{$subject->faculty->name}}</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mt-1">
                <div class="card">
                    <div class="card-body bg-danger text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h3>{{__('Chương trình đào tạo')}}</h3>
                                @foreach($subject->programs as $program)
                                    <h5>{{$program->name}}</h5>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mt-1">
                <div class="card">
                    <div class="card-body bg-dark text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h3>{{__('Nghành đào tạo')}}</h3>
                                @foreach($subject->majors as $major)
                                    <h5>{{$major->name}}</h5>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4 mt-1">
                <div class="card">
                    <div class="card-body bg-secondary text-white">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h3>{{__('Hệ đào tạo')}}</h3>
                                @foreach($subject->programs as $program)
                                    <h5>{{$program->system}}</h5>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
