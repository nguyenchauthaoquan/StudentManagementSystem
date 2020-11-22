@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i><span class="pl-1">{{__('MSSV')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$student->id}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-1">{{__('Họ và tên')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$student->firstname . ' ' . $student->middlename . ' ' . $student->lastname}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-book-open"></i><span class="pl-1">{{__('Lớp')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$student->group->name }}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i><span class="pl-1">{{__('Nghành')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$student->major}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
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
                <h5>{{__('Thông tin liên lạc')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Email:</h5><span class="text-secondary">{{$student->email}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-0">Phone</h5><span class="text-secondary">{{$student->phone}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{('Thông tin lý lịch')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <a href="{{url('/admin/students/backgrounds/create/id='.$student->id)}}" class="btn btn-primary">
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
                            <td>{{$background->name}}</td>
                            <td>{{$background->relationship}}</td>
                            <td>{{$background->birthday}}</td>
                            <td>{{$background->phone}}</td>
                            <td>{{$background->job}}</td>
                            <td>{{$background->email}}</td>
                            <td>{{$background->resident}}</td>
                            <td>{{$background->workplace}}</td>
                            <td>
                                <a href="{{url('/admin/students/backgrounds/edit/id='.$background->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
                    <a href="{{url('/admin/students/policies/create/id='.$student->id)}}" class="btn btn-primary">
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
                                <a href="{{url('/admin/students/policies/edit/id='.$policy->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
