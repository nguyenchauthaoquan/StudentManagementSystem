@extends('dashboard')


@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="5">
                    <a href="{{url('/admin/teachers/create')}}"
                       class="btn btn-outline-primary rounded-circle">
                        <i class="fas fa-plus"></i>
                    </a>
                </th>
            </tr>
            <tr>
                <th>{{__('MSGV')}}</th>
                <th>{{__('Họ và tên')}}</th>
                <th>{{__('Khoa')}}</th>
                <th>{{__('Tình hình')}}</th>
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
                    <td>{{$teacher->faculty->name}}</td>
                    <td class=" @if($teacher->status === 'Thôi việc') bg-danger text-white @endif
                    @if($teacher->status === 'Đang công tác') bg-success text-white @endif
                        d-flex align-items-center justify-content-center"
                    >
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
            @endforeach
            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pagination justify-content-center"></ul>
    </nav>
@endsection
