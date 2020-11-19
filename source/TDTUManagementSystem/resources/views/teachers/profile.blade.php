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
                        <span>{{$teacher->id}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $teacher->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-success text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$teacher->firstname . ' ' . $teacher->middlename . ' ' . $teacher->lastname}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $teacher->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$teacher->faculty->name }}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{ $teacher->created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-header">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="card-body">
                        <span>{{$teacher->faculty->name}}</span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <span>{{$teacher->created_at}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row row-header">
            <div class="col-md-12">Personal Information</div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <div class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">ID Number</h5>
                    </div>
                    <span class="mb-1">{{$teacher->id_number}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Issued by</h5>
                    </div>
                    <span class="mb-1">{{$teacher->place_of_id_number}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Birthday</h5>
                    </div>
                    <span class="mb-1">{{$teacher->birthday}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Gender</h5>
                    </div>
                    <span class="mb-1">{{$teacher->gender}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Nationality</h5>
                    </div>
                    <span class="mb-1">{{$teacher->nationality}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Origins</h5>
                    </div>
                    <span class="mb-1">{{$teacher->origin}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Address</h5>
                    </div>
                    <span class="mb-1">{{$teacher->address}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Talents</h5>
                    </div>
                    <span class="mb-1">{{$teacher->talents}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Incomes</h5>
                    </div>
                    <span class="mb-1">{{$teacher->incomes}}</span>
                </div>
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Career</h5>
                    </div>
                    <span class="mb-1">{{$teacher->career}}</span>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">Contacts</div>
        </div>
        <div class="row row-information">
            <div class="col-md-6">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Email</h5>
                    </div>
                    <span class="mb-1">{{$teacher->email}}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Phone</h5>
                    </div>
                    <span class="mb-1">{{$teacher->phone}}</span>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                Backgrounds
            </div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <a href="{{url('/admin/teachers/backgrounds/create/id='.$teacher->id)}}" class="btn btn-primary">
                    <i class="far fa-address-book"></i>
                </a>
            </div>
            <div class="col-md-12 table-responsive">
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teacher->backgrounds as $background)
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
                                <a href="{{url('/admin/teachers/backgrounds/edit/id='.$background->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <h3>Family description</h3>
            </div>
            <div class="col-md-12">
                {{$teacher->description}}
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">Policies</div>
        </div>
        <div class="row row-information">
            <div class="col-md-12">
                <div class="col-md-12">
                    <a href="{{url('/admin/teachers/policies/create/id='.$teacher->id)}}" class="btn btn-primary">
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
                    @foreach($teacher->policies as $policy)
                        <tr>
                            <td>{{$policy->area}}</td>
                            <td>{{$policy->date_of_military}}</td>
                            <td>{{$policy->year_of_volunteer}}</td>
                            <td>
                                <a href="{{url('/admin/teachers/policies/edit/id='.$policy->id)}}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
