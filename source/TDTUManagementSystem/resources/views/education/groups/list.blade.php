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
                            <th>ID</th>
                            <th>Admission</th>
                            <th>Graduate</th>
                            <th>Created</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>
                                    <a href="{{url('/admin/groups/view/id='.$group->id)}}">{{$group->name}}</a>
                                </td>
                                <td>{{$group->date_admission}}</td>
                                <td>{{$group->date_graduation}}</td>
                                <td>{{$group->created_at}}</td>
                                <td>{{$group->updated_at}}</td>
                                <td>
                                    <a href="{{url('/admin/groups/edit/id='.$group->id)}}" class="btn btn-success">
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
    </div>

@endsection
