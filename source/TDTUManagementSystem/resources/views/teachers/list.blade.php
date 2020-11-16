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
                                <a href="{{url('/admin/teachers/create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Created</th>
                            <th>Updated</th>
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
                                <td>{{$teacher->created_at}}</td>
                                <td>{{$teacher->updated_at}}</td>
                                <td>
                                    <a href="{{url('/admin/teachers/edit/id='.$teacher->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
