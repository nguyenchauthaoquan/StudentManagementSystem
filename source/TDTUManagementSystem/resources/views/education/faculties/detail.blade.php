@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row row-header">
            <div class="col-md-12"><h5>{{__('Danh sách Lớp')}}</h5></div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{__('Lớp')}}</th>
                            <th>{{__('Thời gian tuyển sinh')}}</th>
                            <th>{{__('Thời gian tốt nghiệp')}}</th>
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
            <div class="col-md-12"><h5>{{__('Danh sách sinh viên')}}</h5></div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{__('MSSV')}}</th>
                            <th>{{__('Họ và tên')}}</th>
                            <th>{{__('Nghành')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Số ĐT')}}</th>
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
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Danh sách Giảng viên')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>{{__('MSGV')}}</th>
                            <th>{{__('Họ và tên')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculty->teachers as $teacher)
                            <td>{{$teacher->id}}</td>
                            <td>
                                <a href="{{url('admin/teachers/profile/id='.$teacher->id)}}">
                                    {{$teacher->firstname . ' '.$teacher->middlename.' '.$teacher->lastname}}
                                </a>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
