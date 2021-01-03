@extends('dashboard')


@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('success')}}
        </div>
    @endif
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group" role="group">
            <a href="{{url('/admin/students/create')}}" class="btn btn-outline-primary rounded-circle mr-2">
                <i class="fas fa-plus"></i>
            </a>
            <a href="#deleted" data-toggle="modal" class="btn btn-outline-danger rounded-circle mr-2">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="6">
                    <h4 class="text-center">{{__('Danh Sách Sinh Viên')}}</h4>
                </th>
            </tr>
            <tr>
                <th>{{__('MSSV')}}</th>
                <th>{{__('Họ và tên')}}</th>
                <th>{{__('Lớp')}}</th>
                <th>{{__('Nghành')}}</th>
                <th>{{__('Tình trạng')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                @foreach($group->students as $student)
                    @if($student->pivot->status === 'Đi Học' || $student->pivot->status === 'Tốt Nghiệp')
                        <tr>
                            <td>{{$student->pivot->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                    {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                </a>
                            </td>
                            <td>{{$group->name}}</td>
                            <td>{{$student->name}}</td>
                            <td class="
                               @if ($student->pivot->status === 'Đi Học')
                                 bg-success text-white
                               @elseif ($student->pivot->status === 'Tốt Nghiệp')
                                bg-primary text-white
                               @endif
                                d-flex align-items-center justify-content-center"
                            >
                                {{$student->pivot->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}"
                                   class="btn btn-outline-success rounded-circle">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{url('/admin/students/delete/id='.$student->pivot->id)}}"
                                   class="btn btn-outline-danger rounded-circle">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="deleted" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Danh Sách Sinh Viên Đã Xóa')}}</h4>
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
                            @foreach($groups as $group)
                                @foreach($group->students as $student)
                                    @if($student->pivot->status === 'Thôi Học')
                                        <tr>
                                            <td>{{$student->pivot->id}}</td>
                                            <td>
                                                {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
