@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <span>Number of groups</span>
                    </div>
                    <div class="card-body">
                        <span>{{count($groups)}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <span>Number of students</span>
                    </div>
                    <div class="card-body">
                        @foreach($groups as $group)
                            @if(count($group->students) > 0)
                                {{count($group->students)}}
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </div>
    </div>
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
