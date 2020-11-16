@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row row-header">
            <div class="col-md-12">Groups</div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Admission</th>
                            <th>Graduate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>
                                    <a href="{{url('/admin/groups/view/id='.$group->id)}}">
                                        {{$group->id_group}}
                                    </a>
                                </td>
                                <td>{{$group->date_admission}}</td>
                                <td>{{$group->date_graduation}}}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">Students</div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                                @foreach($group->students as $student)
                                    <tr>
                                        <td>{{$student->id}}</td>
                                        <td>
                                            <a href="{{url('admin/students/profile/id='.$student->id)}}">
                                                {{$student->firstname.' '.$student->middlename.' '.$student->lastname}}
                                            </a>
                                        </td>
                                        <td>
                                            {{$student->major}}
                                        </td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->phone}}</td>
                                    </tr>
                                @endforeach
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection
