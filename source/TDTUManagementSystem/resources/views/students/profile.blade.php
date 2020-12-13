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
                                <h2>{{__('MSSV')}}</h2>
                                <h5>{{$student->id}}</h5>
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
                                <h2>{{__('Họ và tên')}}</h2>
                                <h5>
                                    {{$student->firstname . ' ' . $student->middlename . ' ' . $student->lastname}}
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
                                <h2>{{__('Lớp')}}</h2>
                                <h5>{{$group->name}}</h5>
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
                                <h2>{{__('Nghành')}}</h2>
                                <h5>{{$major->name}}</h5>
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
                                <i class="fas fa-envelope-open fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Email')}}</h2>
                                <h5 style="font-size: 12px">{{$student->email}}</h5>
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
                                <i class="fas fa-phone-alt fa-5x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <h2>{{__('Số điện thoại')}}</h2>
                                <h5>{{$student->phone}}</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin cá nhân')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Số CMND')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->id_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Ngày sinh')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->birthday}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Nơi sinh')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->place_of_birth}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Nguyên quán')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->origin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Giới tính')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->gender}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Tôn giáo')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->religion}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Dân tộc')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->kin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">{{__('Nơi cấp CMND')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->place_of_id_number}}
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{('Lý lịch cá nhân')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <a href="{{url('/admin/students/backgrounds/create/id='.$student->id)}}"
                   class="btn btn-outline-primary rounded-circle">
                    <i class="far fa-address-book"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{__('Họ và tên')}}</th>
                        <th>{{__('Quan hệ')}}</th>
                        <th>{{__('Ngày sinh')}}</th>
                        <th>{{__('Số điện thoại')}}</th>
                        <th>{{__('Công việc')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Chỗ ở')}}</th>
                        <th>{{__('Nơi công tác')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->backgrounds as $background)
                        <tr>
                            <td>{{$background->relationship}}</td>
                            <td>{{$background->name}}</td>
                            <td>{{$background->birthday}}</td>
                            <td>{{$background->phone}}</td>
                            <td>{{$background->job}}</td>
                            <td>{{$background->email}}</td>
                            <td>{{$background->resident}}</td>
                            <td>{{$background->workplace}}</td>
                            <td>
                                <a href="{{url('/admin/students/backgrounds/edit/id='.$background->id)}}"
                                   class="btn btn-outline-success rounded-circle"><i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>

            <div class="col-md-12">
                <h3>{{__('Hoàn cảnh gia đình')}}</h3>
            </div>
            <div class="col-md-12">
                {{$student->description}}
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin chính sách')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <div class="col-md-12">
                    <a href="{{url('/admin/students/policies/create/id='.$student->id)}}"
                       class="btn btn-outline-primary rounded-circle">
                        <i class="far fa-address-book"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{__('Diện chính sách')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->policies as $policy)
                        <tr>
                            <td>{{$policy->area}}</td>
                            <td>
                                <a href="{{url('/admin/students/policies/edit/id='.$policy->id)}}"
                                   class="btn btn-outline-success rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>

        </div>
    </div>
@endsection
