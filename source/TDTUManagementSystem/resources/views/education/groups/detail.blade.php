@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$group->name}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $group->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$faculty->name}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $group->created_at }}</span>
                    </div>
                </div>
            </div><div class="col-md-6 col-xl-4">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$training->name}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $group->created_at }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-header">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="persons" role="tablist">
                    <li class="nav-item">
                        <a href="#students" class="nav-link active"
                           id="students-tab" data-toggle="tab"
                           role="tab" aria-controls="students" aria-selected="true">
                            Students
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row row-information tab-content">
            <div class="col-md-12 tab-pane fade show active" id="students">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($group->students as $student)
                            <tr>
                                <td>{{$student->id}}</td>
                                <td>
                                    <a href="{{url('admin/students/profile/id='.$student->id)}}">
                                        {{$student->firstname . ' '.$student->middlename.' '.$student->lastname}}
                                    </a>
                                </td>
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
