@extends('dashboard')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th colspan="5">
                    <a href="{{url('/admin/subjects/create')}}" class="btn btn-outline-primary rounded-circle">
                        <i class="fas fa-plus"></i>
                    </a>
                </th>
            </tr>
            <tr>
                <th>{{__('Mã môn học')}}</th>
                <th>{{__('Tên môn học')}}</th>
                <th>{{__('Khoa')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>
                        {{$subject->id}}
                    </td>
                    <td>
                        <a href="{{url('/admin/subjects/view/id='.$subject->id)}}">
                            {{$subject->name}}
                        </a>
                    </td>
                    <td>
                        {{$subject->faculty->name}}
                    </td>
                    <td>
                        <a href="{{url('/admin/subjects/edit/id='.$subject->id)}}"
                           class="btn btn-outline-success rounded-circle">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pagination justify-content-center"></ul>
    </nav>
@endsection
