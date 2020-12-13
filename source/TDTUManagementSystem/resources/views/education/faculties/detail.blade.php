@extends('dashboard')


@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-header">
                    <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Mã Khoa')}}</span>
                </div>
                <div class="card-body">
                    <h5>{{$faculty->id}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-header">
                    <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Tên Khoa')}}</span>
                </div>
                <div class="card-body">
                    <h5>{{$faculty->name}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div><div class="col-md-6 col-xl-4">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header">
                    <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Số Nghành đào tạo')}}</span>
                </div>
                <div class="card-body">
                    <h5>{{count($faculty->majors)}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12"><h5>{{__('Danh sách Nghành Đào Tạo')}}</h5></div>
    </div>
    <div class="row row-information">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th colspan="6">
                        <a href="{{url('/admin/faculties/majors/create/id='.$faculty->id)}}"
                           class="btn btn-outline-primary rounded-circle"
                        >
                            <i class="fas fa-plus"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <th>{{__('STT')}}</th>
                    <th>{{__('Tên nghành')}}</th>
                    <th>{{__('Chương trình đào tạo')}}</th>
                    <th>{{__('Hệ đào tạo')}}</th>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty->majors as $major)
                    <tr>
                        <td>{{$major->pivot->id}}</td>
                        <td>{{$major->pivot->name}}</td>
                        <td>{{$major->name}}</td>
                        <td>{{$major->system}}</td>
                        <td class="@if($major->pivot->status === 'Đóng lại') bg-danger text-white @endif
                        @if($major->pivot->status === 'Đang mở') bg-success text-white @endif
                            d-flex align-items-center justify-content-center">
                            {{$major->pivot->status}}
                        </td>
                        <td>
                            <a href="{{url('/admin/faculties/majors/edit/id='.$major->pivot->id)}}"
                               class="btn btn-outline-success rounded-circle"
                            >
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{url('/admin/faculties/majors/delete/id='.$major->pivot->id)}}"
                               class="btn btn-outline-danger rounded-circle"
                            >
                                <i class="fas fa-minus-circle"></i>
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
    <div class="row row-header">
        <div class="col-md-12"><h5>{{__('Danh sách Lớp')}}</h5></div>
    </div>
    <div class="row row-information">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('Lớp')}}</th>
                    <th>{{__('Thời gian tuyển sinh')}}</th>
                    <th>{{__('Thời gian tốt nghiệp')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>
                            <a href="{{url('/admin/groups/view/id='.$group->id)}}">
                                {{$group->name}}
                            </a>
                        </td>
                        <td>{{$group->date_admission}}</td>
                        <td>{{$group->date_graduation}}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center"></ul>
            </nav>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12"><h5>{{__('Danh sách sinh viên')}}</h5></div>
    </div>
    <div class="row row-information">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('MSSV')}}</th>
                    <th>{{__('Họ và tên')}}</th>
                    <th>{{__('Email cá nhân')}}</th>
                    <th>{{__('Số điện thoại')}}</th>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @foreach($group->students as $student)
                        <tr>
                            <td>{{$student->pivot->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->id)}}">
                                    {{$student->pivot->firstname.' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                </a>
                            </td>
                            <td>{{$student->pivot->email}}</td>
                            <td>{{$student->pivot->phone}}</td>
                            <td class="
                               @if($student->pivot->status === 'Đi học')
                                    bg-success text-white
                               @else
                                    bg-danger text-white
                                @endif
                                d-flex align-items-center justify-content-center">
                                {{$student->pivot->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}" class="btn btn-outline-success rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{url('/admin/students/delete/id='.$student->pivot->id)}}" class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>

            </table>
            <nav>
                <ul class="pagination justify-content-center"></ul>
            </nav>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12">
            <h5>{{__('Danh sách Giảng viên')}}</h5>
        </div>
    </div>
    <div class="row row-information">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('MSGV')}}</th>
                    <th>{{__('Họ và tên')}}</th>
                    <th>{{__('Email')}}</th>
                    <th>{{__('Số Điện Thoại')}}</th>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty->teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>
                            <a href="{{url('admin/teachers/profile/id='.$teacher->id)}}">
                                {{$teacher->firstname . ' '.$teacher->middlename.' '.$teacher->lastname}}
                            </a>
                        </td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->phone}}</td>
                        <td class="
                               @if($teacher->status === 'Đang công tác')
                                    bg-success text-white
                               @else
                                    bg-danger text-white
                               @endif
                               d-flex align-items-center justify-content-center"
                        >
                            {{$teacher->status}}
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


@endsection
