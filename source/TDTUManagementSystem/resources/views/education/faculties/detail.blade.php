@extends('dashboard')


@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
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
        <div class="col-md-6 col-lg-4">
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
        </div><div class="col-md-6 col-lg-4">
            <div class="card bg-danger text-white mb-4">
                <div class="card-header">
                    <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Số Nghành đào tạo')}}</span>
                </div>
                <div class="card-body">
                    <?php
                        $count = 0;
                    ?>
                    @foreach($faculty->majors as $major)
                        @if ($major->pivot->status === 'Đang Mở')
                            <?php $count += 1; ?>
                        @endif
                    @endforeach
                    <h5>{{$count}}</h5>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                </div>
            </div>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12">
            <h5>{{__('Danh sách Nghành Đào Tạo')}}</h5>
        </div>
    </div>
    <div class="row row-information">
        <div class="btn-toolbar col-md-12" role="toolbar">
            <div class="btn-group" role="group">
                <a href="{{url('/admin/faculties/majors/create/id='.$faculty->id)}}"
                   class="btn btn-outline-primary rounded-circle mr-2"
                >
                    <i class="fas fa-plus"></i>
                </a>
                <a href="#deleted-majors"
                   data-toggle="modal"
                   class="btn btn-outline-danger rounded-circle mr-2">
                    <i class="fas fa-trash"></i>
                </a>
            </div>

        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
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
                    @if($major->pivot->status === 'Đang Mở')
                        <tr>
                            <td>{{$major->pivot->id}}</td>
                            <td>{{$major->pivot->name}}</td>
                            <td>{{$major->name}}</td>
                            <td>{{$major->system}}</td>
                            <td class="@if($major->pivot->status === 'Đang Mở') bg-success @endif d-flex align-items-center justify-content-center text-white">
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
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12"><h5>{{__('Danh sách Lớp')}}</h5></div>
    </div>
    <div class="row row-information">
        <div class="col-md-12 btn-toolbar" role="toolbar">
            <div class="btn-group" role="group">
                <a href="#deleted-groups" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('Lớp')}}</th>
                    <th>{{__('Chương trình đào tạo')}}</th>
                    <th>{{__('Hệ đào tạo')}}</th>
                    <th>{{__('Thời gian tuyển sinh')}}</th>
                    <th>{{__('Thời gian tốt nghiệp')}}</th>
                    <th>{{__('Số lượng sinh viên')}}</th>
                    <th>{{__('Tình Trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty->groups as $group)
                    @if($group->pivot->status === 'Đang Mở')
                        <tr>
                            <td>
                                <a href="{{url('/admin/groups/view/id='.$group->pivot->id)}}">
                                    {{$group->pivot->name}}
                                </a>
                            </td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->system}}</td>
                            <td>{{$group->pivot->date_admission}}</td>
                            <td>{{$group->pivot->date_graduation}}</td>
                            <td>{{count($group->pivot->students)}}</td>
                            <td class="@if($group->pivot->status === 'Đang Mở') bg-success @endif d-flex align-items-center justify-content-center text-white">
                                {{$group->pivot->status}}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12"><h5>{{__('Danh sách sinh viên')}}</h5></div>
    </div>
    <div class="row row-information">
        <div class="btn-toolbar col-md-12" role="toolbar">
            <div class="btn-group" role="group">
                <a href="#deleted-students"
                   data-toggle="modal"
                   class="btn btn-outline-danger rounded-circle">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>{{__('MSSV')}}</th>
                    <th>{{__('Họ và tên')}}</th>
                    <th>{{__('Lớp')}}</th>
                    <th>{{__('Email cá nhân')}}</th>
                    <th>{{__('Số điện thoại')}}</th>
                    <td>{{__('Thời gian tuyển sinh')}}</td>
                    <td>{{__('Thời gian tốt nghiệp')}}</td>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faculty->groups as $group)
                    @foreach($group->pivot->students as $student)
                        @if (($student->pivot->status === 'Đi Học') || ($student->pivot->status === 'Tốt Nghiệp'))
                            <tr>
                                <td>{{$student->pivot->id}}</td>
                                <td>
                                    <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                        {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                    </a>
                                </td>
                                <td>{{$group->pivot->name}}</td>
                                <td>{{$student->pivot->email}}</td>
                                <td>{{$student->pivot->phone}}</td>
                                <td>{{$group->pivot->date_admission}}</td>
                                <td>{{$group->pivot->date_graduation}}</td>
                                <td class="@if($student->pivot->status === 'Đi Học') bg-success @elseif($student->pivot->status === 'Tốt Nghiệp') bg-primary @endif d-flex align-content-center justify-content-center text-white">
                                    {{$student->pivot->status}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row-header">
        <div class="col-md-12">
            <h5>{{__('Danh sách Giảng viên')}}</h5>
        </div>
    </div>
    <div class="row row-information">
        <div class="col-md-12 btn-toolbar" role="toolbar">
            <div class="btn-group" role="group">
                <a href="#deleted-teachers" data-toggle="modal" class="btn btn-outline-danger rounded-circle mr-2">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
        </div>
        <div class="table-responsive mt-3">
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
                        @if($teacher->status === 'Đang Công Tác')
                            <tr>
                                <td>{{$teacher->id}}</td>
                                <td>
                                    <a href="{{url('admin/teachers/profile/id='.$teacher->id)}}">
                                        {{$teacher->firstname . ' '.$teacher->middlename.' '.$teacher->lastname}}
                                    </a>
                                </td>
                                <td>{{$teacher->email}}</td>
                                <td>{{$teacher->phone}}</td>
                                <td class="@if($teacher->status === 'Đang Công Tác') bg-success text-white @endif
                                    d-flex align-items-center justify-content-center">
                                    {{$teacher->status}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="deleted-majors" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Nghành Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
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
                                @if($major->pivot->status === 'Đang Đóng')
                                    <tr>
                                        <td>{{$major->pivot->id}}</td>
                                        <td>{{$major->pivot->name}}</td>
                                        <td>{{$major->name}}</td>
                                        <td>{{$major->system}}</td>
                                        <td class="@if($major->pivot->status === 'Đang Đóng') bg-danger @endif d-flex align-items-center justify-content-center text-white">
                                            {{$major->pivot->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/faculties/majors/edit/id='.$major->pivot->id)}}"
                                               class="btn btn-outline-success rounded-circle"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleted-students" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Sinh viên Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
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
                            @foreach($faculty->groups as $group)
                                @foreach($group->pivot->students as $student)
                                    @if ($student->pivot->status === 'Thôi Học')
                                        <tr>
                                            <td>{{$student->pivot->id}}</td>
                                            <td>
                                                {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                            </td>
                                            <td>{{$student->pivot->email}}</td>
                                            <td>{{$student->pivot->phone}}</td>
                                            <td class="@if($student->pivot->status === 'Thôi Học') bg-danger @endif d-flex align-content-center justify-content-center text-white">
                                                {{$student->pivot->status}}
                                            </td>
                                            <td>
                                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}"
                                                   class="btn btn-outline-success rounded-circle">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleted-groups" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Lớp Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('Lớp')}}</th>
                                <th>{{__('Chương trình đào tạo')}}</th>
                                <th>{{__('Hệ đào tạo')}}</th>
                                <th>{{__('Thời gian tuyển sinh')}}</th>
                                <th>{{__('Thời gian tốt nghiệp')}}</th>
                                <th>{{__('Tình trạng')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faculty->groups as $group)
                                @if($group->pivot->status === 'Đang Đóng')
                                    <tr>
                                        <td>
                                            {{$group->pivot->name}}
                                        </td>
                                        <td>{{$group->name}}</td>
                                        <td>{{$group->system}}</td>
                                        <td>{{$group->pivot->date_admission}}</td>
                                        <td>{{$group->pivot->date_graduation}}</td>
                                        <td class="@if($group->pivot->status === 'Đang Đóng') bg-danger @endif d-flex align-items-center justify-content-center text-white">
                                            {{$group->pivot->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/groups/edit/id='.$group->pivot->id)}}"
                                               class="btn btn-outline-success rounded-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleted-teachers" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Giảng Viên Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('MSSV')}}</th>
                                <th>{{__('Họ và tên')}}</th>
                                <th>{{__('Lớp')}}</th>
                                <th>{{__('Tình trạng')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faculty->teachers as $teacher)
                                @if($teacher->status === 'Thôi Việc')
                                    <tr>
                                        <td>{{$teacher->id}}</td>
                                        <td>
                                            {{$teacher->firstname . ' '.$teacher->middlename.' '.$teacher->lastname}}
                                        </td>
                                        <td>{{$teacher->faculty->name}}</td>
                                        <td class=" @if($teacher->status === 'Thôi Việc') bg-danger text-white @endif
                                            d-flex align-items-center justify-content-center"
                                        >
                                            {{$teacher->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/teachers/edit/id='.$teacher->id)}}"
                                               class="btn btn-outline-success rounded-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
