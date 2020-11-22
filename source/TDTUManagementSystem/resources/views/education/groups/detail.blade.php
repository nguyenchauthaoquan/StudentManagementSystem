@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Lớp')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$group->name}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Khoa')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$faculty->name}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div><div class="col-md-6 col-xl-4">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-3">{{__('Chương trình đào tạo')}}</span>
                    </div>
                    <div class="card-body">
                        <h5>{{$training->name}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-header">
            <div class="col-md-12">
                <h5> {{__('Danh sách sinh viên')}}</h5>
            </div>
        </div>
        <div class="row row-information">
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

@endsection
