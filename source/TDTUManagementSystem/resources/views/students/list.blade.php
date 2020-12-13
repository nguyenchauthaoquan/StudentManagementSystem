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
                <th>{{__('Tình trạng')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                @foreach($group->students as $student)
                    @if($student->pivot->status !== 'Thôi học')
                        <tr>
                            <td>{{$student->pivot->id}}</td>
                            <td>
                                <a href="{{url('admin/students/profile/id='.$student->pivot->id)}}">
                                    {{$student->pivot->firstname . ' '.$student->pivot->middlename.' '.$student->pivot->lastname}}
                                </a>
                            </td>
                            <td>{{$group->name}}</td>
                            <td class="
                               @if($student->pivot->status === 'Đi học' || $student->pivot->status === 'Tốt nghiệp')
                                 bg-success text-white
                               @endif
                                d-flex align-items-center justify-content-center"
                            >
                                {{$student->pivot->status}}
                            </td>
                            <td>
                                <a href="{{url('/admin/students/edit/id='.$student->pivot->id)}}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{url('/admin/students/delete/id='.$student->pivot->id)}}" class="btn btn-danger">
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
    <nav>
        <ul class="pagination justify-content-center"></ul>
    </nav>
@endsection
