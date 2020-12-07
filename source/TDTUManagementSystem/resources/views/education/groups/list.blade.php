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
                                <a href="{{url('/admin/groups/create')}}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                        <tr>
                            <th>{{__('Lớp')}}</th>
                            <th>{{__('Khoa')}}</th>
                            <th>{{__('Thời gian tuyển sinh')}}</th>
                            <th>{{__('Thời gian tốt nghiệp')}}</th>
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
                                    <td>
                                        <a href="{{url('/admin/groups/edit/id='.$group->pivot->id)}}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
