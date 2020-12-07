@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3">
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
            <div class="col-md-6 col-xl-3">
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
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-dark text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-3">
                            {{__('Chương trình đào tạo')}}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5>{{$program->name}}</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i><span class="pl-3">
                            {{__('Chương trình đào tạo')}}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5>{{$program->system}}</h5>
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
                        <th>{{__('ID')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Nghành')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($group->students as $student)
                        <tr>
                            <td>{{$student->pivot->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                    {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                </a>
                            </td>
                            <td>{{$student->name}}</td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
