@extends('dashboard')


@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="5">
                    <a href="{{url('/admin/faculties/create')}}"
                       class="btn btn-outline-primary rounded-circle">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                    <a href="#deleted" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
                        <i class="fas fa-trash"></i>
                    </a>
                </th>
            </tr>
            <tr>
                <th>{{__('Mã khoa')}}</th>
                <th>{{__('Tên khoa')}}</th>
                <th>{{__('Trạng thái')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                @if($faculty->status === 'Đang Mở')
                <tr>
                    <td>{{$faculty->id}}</td>
                    <td>
                        <a href="{{url('/admin/faculties/view/id='.$faculty->id)}}">{{$faculty->name}}</a>
                    </td>
                    <td class="@if($faculty->status === 'Đang Mở') bg-success text-white @endif
                        d-flex align-items-center justify-content-center">
                        {{$faculty->status}}
                    </td>
                    <td>
                        <a href="{{url('/admin/faculties/edit/id='.$faculty->id)}}"
                           class="btn btn-outline-success rounded-circle">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{url('/admin/faculties/delete/id='.$faculty->id)}}"
                           class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-minus-circle"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-center"></ul>
        </nav>
    </div>

    <div class="modal fade" id="deleted" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Khoa Đã Xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('Mã khoa')}}</th>
                                <th>{{__('Tên khoa')}}</th>
                                <th>{{__('Trạng thái')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faculties as $faculty)
                                @if($faculty->status === 'Đang Đóng')
                                <tr>
                                    <td>{{$faculty->id}}</td>
                                    <td>
                                        {{$faculty->name}}
                                    </td>
                                    <td class="@if($faculty->status === 'Đang Đóng') bg-danger text-white @endif
                                        d-flex align-items-center justify-content-center">
                                        {{$faculty->status}}
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/faculties/edit/id='.$faculty->id)}}"
                                           class="btn btn-outline-success rounded-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center"></ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
