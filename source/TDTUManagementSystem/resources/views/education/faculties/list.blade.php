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
                                <a href="{{url('/admin/faculties/create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>{{__('Mã khoa')}}</th>
                            <th>{{__('Tên khoa')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                            <tr>
                                <td>{{$faculty->id}}</td>
                                <td>
                                    <a href="{{url('/admin/faculties/view/id='.$faculty->id)}}">{{$faculty->name}}</a>
                                </td>
                                <td>
                                    <a href="{{url('/admin/faculties/edit/id='.$faculty->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
