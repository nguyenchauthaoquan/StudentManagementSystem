@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th colspan="5">
                                <a href="{{url('/admin/faculties/create')}}"
                                   class="btn btn-outline-primary rounded-circle">
                                    <i class="fas fa-plus-circle"></i>
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
                            <tr>
                                <td>{{$faculty->id}}</td>
                                <td>
                                    <a href="{{url('/admin/faculties/view/id='.$faculty->id)}}">{{$faculty->name}}</a>
                                </td>
                                <td class="@if($faculty->status === 'Đóng lại') bg-danger text-white @endif
                                @if($faculty->status === 'Đang mở') bg-success text-white @endif
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
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
