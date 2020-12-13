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
                                <a href="{{url('/admin/groups/create')}}"
                                   class="btn btn-outline-primary rounded-circle"
                                >
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>{{__('Lớp')}}</th>
                            <th>{{__('Khoa')}}</th>
                            <th>{{__('Thời gian tuyển sinh')}}</th>
                            <th>{{__('Thời gian tốt nghiệp')}}</th>
                            <th>{{__('Tình trạng')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faculties as $faculty)
                            @foreach($faculty->groups as $group)
                                <tr>
                                    <td>
                                        <a href="{{url('/admin/groups/view/id='.$group->pivot->id)}}">
                                            {{$group->pivot->name}}
                                        </a>
                                    </td>
                                    <td>{{$faculty->name}}</td>
                                    <td>{{$group->pivot->date_admission}}</td>
                                    <td>{{$group->pivot->date_graduation}}</td>
                                    <td class="@if($group->pivot->status === 'Đóng lại') bg-danger text-white @endif
                                    @if($group->pivot->status === 'Đang mở') bg-success text-white @endif
                                        d-flex align-items-center justify-content-center">
                                        {{$group->pivot->status}}
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/groups/edit/id='.$group->pivot->id)}}"
                                           class="btn btn-outline-success rounded-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{url('/admin/groups/delete/id='.$group->pivot->id)}}"
                                           class="btn btn-outline-danger rounded-circle">
                                            <i class="fas fa-minus-circle"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination justify-content-center"></ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
