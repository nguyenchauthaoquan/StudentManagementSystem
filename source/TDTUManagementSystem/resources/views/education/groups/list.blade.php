@extends('dashboard')


@section('content')
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group" role="group" >
            <a href="{{url('/admin/groups/create')}}"
               class="btn btn-outline-primary rounded-circle mr-2"
            >
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
                <th colspan="8">
                    <h4 class="text-center">{{__('Danh Sách Lớp')}}</h4>
                </th>
            </tr>
            <tr>
                <th>{{__('Lớp')}}</th>
                <th>{{__('Khoa')}}</th>
                <th>{{__('Chương Trình Đào Tạo')}}</th>
                <th>{{__('Hệ Đào Tạo')}}</th>
                <th>{{__('Thời Gian Tuyển Sinh')}}</th>
                <th>{{__('Thời Gian Tốt Nghiệp')}}</th>
                <th>{{__('Tình Trạng')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                @foreach($faculty->groups as $group)
                    @if($group->pivot->status === 'Đang Mở' || $group->pivot->status === 'Tốt Nghiệp')
                        <tr>
                            <td>
                                <a href="{{url('/admin/groups/view/id='.$group->pivot->id)}}">
                                    {{$group->pivot->name}}
                                </a>
                            </td>
                            <td>{{$faculty->name}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->system}}</td>
                            <td>{{$group->pivot->date_admission}}</td>
                            <td>{{$group->pivot->date_graduation}}</td>
                            <td class="@if($group->pivot->status === 'Đang Mở') bg-success text-white @endif
                            @if ($group->pivot->status === 'Tốt Nghiệp') bg-primary text-white @endif
                                d-flex align-items-center justify-content-center">
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
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="deleted" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh sách Lớp Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('Lớp')}}</th>
                                <th>{{__('Khoa')}}</th>
                                <th>{{__('Chương Trình Đào Tạo')}}</th>
                                <th>{{__('Hệ Đào Tạo')}}</th>
                                <th>{{__('Thời Gian Tuyển Sinh')}}</th>
                                <th>{{__('Thời Gian Tốt Nghiệp')}}</th>
                                <th>{{__('Tình Trạng')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faculties as $faculty)
                                @foreach($faculty->groups as $group)
                                    @if($group->pivot->status === 'Đang Đóng')
                                        <tr>
                                            <td>
                                                {{$group->pivot->name}}
                                            </td>
                                            <td>{{$faculty->name}}</td>
                                            <td>{{$group->name}}</td>
                                            <td>{{$group->system}}</td>
                                            <td>{{$group->pivot->date_admission}}</td>
                                            <td>{{$group->pivot->date_graduation}}</td>
                                            <td class="@if($group->pivot->status === 'Đang Đóng') bg-danger text-white @endif
                                                d-flex align-items-center justify-content-center">
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
