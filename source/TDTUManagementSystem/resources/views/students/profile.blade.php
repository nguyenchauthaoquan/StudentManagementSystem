@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$student->id}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $student->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$student->firstname . ' ' . $student->middlename . ' ' . $student->lastname}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $student->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$student->group->id_group }}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $student->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$student->major}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{$student->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-header">
            <div class="col-md-12">
                Backgrounds
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <a href="{{url('/admin/students/backgrounds/create/id='.$student->id)}}" class="btn btn-primary">
                    <i class="far fa-address-book"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Relation</th>
                        <th>Birthday</th>
                        <th>Phone</th>
                        <th>Job</th>
                        <th>Email</th>
                        <th>Resident</th>
                        <th>Workplace</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->backgrounds as $background)
                        <tr>
                            <td>{{$background->name}}</td>
                            <td>{{$background->relationship}}</td>
                            <td>{{$background->birthday}}</td>
                            <td>{{$background->phone}}</td>
                            <td>{{$background->job}}</td>
                            <td>{{$background->email}}</td>
                            <td>{{$background->resident}}</td>
                            <td>{{$background->workplace}}</td>
                            <td>
                                <a href="{{url('/admin/students/backgrounds/edit/id='.$background->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">Policies</div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <div class="col-md-12">
                    <a href="{{url('/admin/students/policies/create/id='.$student->id)}}" class="btn btn-primary">
                        <i class="far fa-address-book"></i>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Area</th>
                        <th>Date of Military</th>
                        <th>Year of volunteer</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($student->policies as $policy)
                        <tr>
                            <td>{{$policy->area}}</td>
                            <td>{{$policy->date_of_military}}</td>
                            <td>{{$policy->year_of_volunteer}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
