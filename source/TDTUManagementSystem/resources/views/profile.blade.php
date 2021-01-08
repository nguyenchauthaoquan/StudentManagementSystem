@extends('home')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('images/'.$user->avatar)}}"
                                 alt="{{__('User Avatar')}}"
                                 width="200"
                                 height="150"
                                 class="rounded-circle">
                            <div class="mt-3">
                                <h4>{{$user->id}}</h4>
                                <p class="text-secondary mb-1">
                                    {{$user->firstname." ".$user->middlename." ".$user->lastname}}
                                </p>
                                <span class="text-muted font-size-sm">
                                @foreach($programs as $program)
                                        {{$program->name.' - Hệ '.$program->system}}
                                @endforeach
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 font-weight-bold">{{__('Lớp')}}</h6>
                            <span class="text-secondary">{{$group->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 font-weight-bold">{{__('Nghành')}}</h6>
                            <span class="text-secondary">{{$major->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0 font-weight-bold">{{__('Khoa')}}</h6>
                            <span class="text-secondary">
                                @foreach($faculties as $faculty)
                                    {{$faculty->name}}
                                @endforeach
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Số CMND')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->id_number}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Ngày sinh')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{date('d/m/Y', strtotime($user->birthday))}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Nơi sinh')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->place_of_birth}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Nguyên quán')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->origin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Giới tính')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->gender}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Tôn giáo')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->religion}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Dân tộc')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->kin}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 font-weight-bold">{{__('Nơi cấp CMND')}}</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$user->place_of_id_number}}
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
