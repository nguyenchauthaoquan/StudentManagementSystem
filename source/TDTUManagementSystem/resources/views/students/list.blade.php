@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Created</th>
                            <th>Updated</th>
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
                                <td>{{$student->created_at}}</td>
                                <td>{{$student->updated_at}}</td>
                                <td>
                                    <a href="{{url('/admin/students/edit/id='.$student->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
