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
                    <?php $count = 0 ?>
                    @foreach($faculty->majors as $major)
                        @if ($major->pivot->status === 'Đang Mở')
                            <?php $count += 1 ?>
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
                        <a href="#deleted-majors"
                           data-toggle="modal"
                           class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-trash"></i>
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
                @foreach($majors as $major)
                    @if($major->pivot->status === 'Đang Mở')
                        <tr>
                            <td>{{$major->pivot->id}}</td>
                            <td>{{$major->pivot->name}}</td>
                            <td>{{$major->name}}</td>
                            <td>{{$major->system}}</td>
                            <td class="@if($major->pivot->status === 'Đang Mở') bg-success text-white @endif
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
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$majors->links('paginator')}}
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
                    <th colspan="8">
                        <a href="#deleted-groups" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-trash"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <th>{{__('Lớp')}}</th>
                    <th>{{__('Chương trình đào tạo')}}</th>
                    <th>{{__('Hệ đào tạo')}}</th>
                    <th>{{__('Thời gian tuyển sinh')}}</th>
                    <th>{{__('Thời gian tốt nghiệp')}}</th>
                    <th>{{__('Tình Trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    @if($group->pivot->status === 'Đang Mở' || $group->pivot->status === 'Tốt Nghiệp')
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
                            <td class="@if ($group->pivot->status === 'Đang Mở') bg-success text-white @endif
                                       @if ($group->pivot->status === 'Tốt Nghiệp') bg-primary text-white @endif
                                       d-flex justify-content-center align-items-center">
                                {{$group->pivot->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/groups/edit/id='.$group->pivot->id)}}"
                                   class="btn btn-outline-success rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{url('/admin/groups/delete/id='.$group->pivot->id)}}"
                                   class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-minus-circle"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$groups->links('paginator')}}
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
                    <th colspan="6">
                        <a href="#deleted-students"
                           data-toggle="modal"
                           class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-trash"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <th>{{__('MSSV')}}</th>
                    <th>{{__('Họ và tên')}}</th>
                    <th>{{__('Email cá nhân')}}</th>
                    <th>{{__('Số điện thoại')}}</th>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    @if(($student->status === 'Đi Học') || ($student->pivot->status === 'Tốt Nghiệp'))
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->id)}}">
                                    {{$student->firstname.' '.$student->middlename.' '.$student->lastname}}
                                </a>
                            </td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td class="
                                @if($student->status === 'Đi Học')
                                    bg-success text-white
                                @endif
                                @if($student->status === 'Tốt Nghiệp')
                                    bg-primary text-white
                                @endif
                                d-flex align-items-center justify-content-center">
                                {{$student->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->id)}}"
                                   class="btn btn-outline-success rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{url('/admin/students/delete/id='.$student->id)}}"
                                   class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$students->links()}}
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
                @foreach($teachers as $teacher)
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
                               @if($teacher->status === 'Đang Công Tác')
                                    bg-success text-white
                               @endif
                               @if($teacher->status === 'Thôi Việc')
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
            {{$teachers->links()}}
        </div>
    </div>
    <div class="modal fade" id="deleted-majors" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Nghành đã xóa')}}</h4>
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
                            @foreach($deletedMajors as $major)
                                <tr>
                                    <td>{{$major->id}}</td>
                                    <td>{{$major->name}}</td>
                                    <td>{{$major->name}}</td>
                                    <td>{{$major->system}}</td>
                                    <td class="@if($major->status === 'Đang Đóng') bg-danger text-white @endif
                                        d-flex align-items-center justify-content-center">
                                        {{$major->status}}
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/faculties/majors/edit/id='.$major->id)}}"
                                           class="btn btn-outline-success rounded-circle"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$deletedMajors->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleted-students" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Sinh viên đã xóa')}}</h4>
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
                            @foreach($students as $student)
                                @if($student->status === 'Thôi Học')
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>
                                            {{$student->firstname.' '.$student->middlename.' '.$student->lastname}}
                                        </td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                        <td class="
                                                @if($student->status === 'Thôi Học')
                                                    bg-danger text-white
                                                @endif
                                            d-flex align-items-center justify-content-center">
                                            {{$student->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/students/edit/id='.$student->id)}}"
                                               class="btn btn-outline-success rounded-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{$students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleted-groups" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Lớp đã xóa')}}</h4>
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
                            @foreach($groups as $group)
                                <tr>
                                    <td>
                                        {{$group->pivot->name}}
                                    </td>
                                    <td>{{$group->name}}</td>
                                    <td>{{$group->system}}</td>
                                    <td>{{$group->pivot->date_admission}}</td>
                                    <td>{{$group->pivot->date_graduation}}</td>
                                    <td class="@if ($group->pivot->status === 'Đang Đóng') bg-danger text-white @endif
                                        d-flex justify-content-center align-items-center">
                                        {{$group->pivot->status}}
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/groups/edit/id='.$group->pivot->id)}}"
                                           class="btn btn-outline-success rounded-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$groups->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
