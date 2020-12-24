@extends('dashboard')


@section('content')
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group" role="group">
            <a href="{{url('/admin/teachers/create')}}"
               class="btn btn-outline-primary rounded-circle mr-2">
                <i class="fas fa-plus"></i>
            </a>
            <a href="#deleted" data-toggle="modal" class="btn btn-outline-danger rounded-circle mr-2">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="5">
                    <h4 class="text-center">{{__('Danh Sách Giảng Viên')}}</h4>
                </th>
            </tr>
            <tr>
                <th>{{__('MSGV')}}</th>
                <th>{{__('Họ và tên')}}</th>
                <th>{{__('Khoa')}}</th>
                <th>{{__('Tình trạng')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $teacher)
                @if($teacher->status === 'Đang Công Tác')
                <tr>
                    <td>{{$teacher->id}}</td>
                    <td>
                        <a href="{{url('admin/teachers/profile/id='.$teacher->id)}}">
                            {{$teacher->firstname . ' '.$teacher->middlename.' '.$teacher->lastname}}
                        </a>
                    </td>
                    <td>{{$teacher->faculty->name}}</td>
                    <td class="@if($teacher->status === 'Đang Công Tác') bg-success text-white @endif
                                d-flex align-items-center justify-content-center">
                        {{$teacher->status}}
                    </td>
                    <td>
                        <a href="{{url('/admin/teachers/edit/id='.$teacher->id)}}"
                           class="btn btn-outline-success rounded-circle"><i class="fas fa-edit"></i></a>
                        <a href="{{url('/admin/teachers/delete/id='.$teacher->id)}}"
                           class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-minus"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="deleted" role="dialog">
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
                            @foreach($teachers as $teacher)
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
