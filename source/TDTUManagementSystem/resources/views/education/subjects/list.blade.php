@extends('dashboard')

@section('content')
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group" role="group">
            <a href="{{url('/admin/subjects/create')}}" class="btn btn-outline-primary rounded-circle mr-2">
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
                    <h4 class="text-center">{{__('Danh Sách Môn Học')}}</h4>
                </th>
            </tr>
            <tr>
                <th>{{__('Mã Môn Học')}}</th>
                <th>{{__('Tên Môn Học')}}</th>
                <th>{{__('Khoa')}}</th>
                <th>{{__('Trạng Thái')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                @if($subject->status === 'Đang Mở')
                    <tr>
                        <td>
                            {{$subject->id}}
                        </td>
                        <td>
                            <a href="{{url('/admin/subjects/view/id='.$subject->id)}}">
                                {{$subject->name}}
                            </a>
                        </td>
                        <td>
                            {{$subject->faculty->name}}
                        </td>
                        <td class="@if($subject->status === 'Đang Mở') bg-success text-white @endif d-flex align-items-center justify-content-center">
                            {{$subject->status}}
                        </td>
                        <td>
                            <a href="{{url('/admin/subjects/edit/id='.$subject->id)}}"
                               class="btn btn-outline-success rounded-circle">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a
                                class="btn btn-outline-danger rounded-circle"
                                href="{{url('/admin/subjects/delete/id='.$subject->id)}}"
                            >
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
                    <h4 class="modal-title">{{__('Danh Sách Môn Học Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('Mã Môn Học')}}</th>
                                <th>{{__('Tên Môn Học')}}</th>
                                <th>{{__('Khoa')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                @if($subject->status === 'Đang Đóng')
                                    <tr>
                                        <td>
                                            {{$subject->id}}
                                        </td>
                                        <td>
                                            {{$subject->name}}
                                        </td>
                                        <td>
                                            {{$subject->faculty->name}}
                                        </td>
                                        <td class="@if($subject->status === 'Đang Đóng') bg-danger text-white @endif d-flex align-items-center justify-content-center">
                                            {{$subject->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/subjects/edit/id='.$subject->id)}}"
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
