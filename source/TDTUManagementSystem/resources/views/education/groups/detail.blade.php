@extends('dashboard')


@section('content')
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
                    <th colspan="6">
                        <a href="#graduated" data-toggle="modal" class="btn btn-outline-danger rounded-circle">
                            <i class="fas fa-trash"></i>
                        </a>
                    </th>
                </tr>
                <tr>
                    <th>{{__('ID')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Nghành')}}</th>
                    <th>{{__('Tình trạng')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->students as $student)
                    @if($student->pivot->status === 'Đi Học' || $student->pivot->status === 'Tốt Nghiệp')
                        <tr>
                            <td>{{$student->pivot->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                    {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                </a>
                            </td>
                            <td>{{$student->name}}</td>
                            <td class="
                            @if($student->pivot->status === 'Đi Học' || $student->pivot->status === 'Tốt Nghiệp')
                                bg-success text-white
                            @endif
                            @if($student->pivot->status === 'Thôi Học')
                                bg-danger text-white
                            @endif
                                d-flex align-items-center justify-content-center">
                                {{$student->pivot->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}" class="btn btn-success">
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
    <div class="modal fade" id="graduated" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh sách sinh viên đã xóa')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>{{__('MSSV')}}</th>
                                <th>{{__('Họ và tên')}}</th>
                                <th>{{__('Lớp')}}</th>
                                <th>{{__('Tình trạng')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group->students as $student)
                                @if($student->pivot->status === 'Thôi Học')
                                    <tr>
                                        <td>{{$student->pivot->id}}</td>
                                        <td>
                                            <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                                {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                            </a>
                                        </td>
                                        <td>{{$group->name}}</td>
                                        <td class="@if ($student->pivot->status === 'Thôi Học') bg-danger text-white @endif
                                            d-flex align-items-center justify-content-center"
                                        >
                                            {{$student->pivot->status}}
                                        </td>
                                        <td>
                                            <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}"
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
