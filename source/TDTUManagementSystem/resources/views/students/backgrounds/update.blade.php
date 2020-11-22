@extends('dashboard')


@section('content')

    <div class="container">
        <form method="post" action="{{url('/admin/students/backgrounds/update/id='.$background->id)}}">
            @csrf
            @method('PUT')
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>{{__('Lý lịch')}}</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="relationship">{{('Quan hệ')}}</label>
                            <div>
                                <input type="text" class="form-control" name="relationship" id="relationship" value="{{$background->relationship}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">{{__('Họ và tên')}}</label>
                            <div>
                                <input type="text" class="form-control" name="name" id="name" value="{{$background->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birthday">{{__('Ngày sinh')}}</label>
                            <div>
                                <input type="text" class="form-control date-picker" name="birthday" id="birthday" value="{{$background->birthday}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone">{{__('Số điện thoại')}}</label>
                            <div>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$background->phone}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="job">{{__('Công việc')}}</label>
                            <div>
                                <input type="text" class="form-control" name="job" id="job" value="{{$background->job}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <div>
                                <input type="text" class="form-control" name="email" id="email" value="{{$background->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="resident">{{__('Chỗ ở')}}</label>
                            <div>
                                <input type="text" class="form-control" name="resident" id="resident" value="{{$background->resident}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="workplace">{{__('Nơi công tác')}}</label>
                            <div>
                                <input type="text" class="form-control" name="workplace" id="workplace" value="{{$background->workplace}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <button type="submit" class="btn btn-primary">{{__('Chỉnh sửa')}}</button>
                </div>
            </div>
        </form>
    </div>

@endsection
