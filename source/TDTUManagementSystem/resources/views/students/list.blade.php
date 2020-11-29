@extends('dashboard')


@section('content')

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="6">
                    <a href="{{url('/admin/students/create')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                    </a>
                </th>
            </tr>
            <tr>
                <th>{{__('MSSV')}}</th>
                <th>{{__('Họ và tên')}}</th>
                <th>{{__('Lớp')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>
                        <a href="{{url('admin/students/profile/id='.$student->id)}}">
                            {{$student->firstname . ' '.$student->middlename.' '.$student->lastname}}
                        </a>
                    </td>
                    <td>{{$student->group->name}}</td>
                    <td>
                        <a href="{{url('/admin/students/edit/id='.$student->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
