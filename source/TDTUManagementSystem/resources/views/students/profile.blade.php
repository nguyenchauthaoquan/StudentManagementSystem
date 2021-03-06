@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{session('success')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
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
                                <h2>{{__('Họ và Tên')}}</h2>
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
                    <div class="card-body bg-danger text-white">
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
        </div>
    </div>

    <div class="container mt-5">
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông Tin Cá Nhân')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('images/'.$student->avatar)}}"
                                 alt="{{__('User Avatar')}}"
                                 width="180"
                                 height="150"
                                 class="rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 font-weight-bold">{{__('Email Cá Nhân')}}</h6>
                            <span class="text-secondary">{{$student->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 font-weight-bold">{{__('Số điện thoại')}}</h6>
                            <span class="text-secondary">{{$student->phone}}</span>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Số CMND')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->id_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Ngày sinh')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{date('d/m/Y', strtotime($student->birthday))}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Nơi sinh')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->place_of_birth}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Nguyên quán')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->origin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Giới tính')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->gender}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Tôn giáo')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->religion}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Dân tộc')}}</h5>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$student->kin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h5 class="mb-0 font-weight-bold">{{__('Nơi cấp CMND')}}</h5>
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
                <h5>{{('Thông Tin Nhân Thân')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="btn-toolbar mb-3" role="toolbar">
                <div class="btn-group mr-2" role="group">
                    <a href="{{url('/admin/students/backgrounds/create/id='.$student->id)}}"
                       class="btn btn-outline-primary rounded-circle">
                        <i class="far fa-address-book"></i>
                    </a>
                </div>
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
            </div>

            <div class="col-md-12">
                <h3>{{__('Hoàn Cảnh Gia Đình')}}</h3>
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
            <div class="btn-toolbar mb-3" role="toolbar">
                <div class="btn-group mr-2" role="group">
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
            </div>
        </div>
    </div>
@endsection
