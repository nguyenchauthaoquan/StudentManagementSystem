@extends('dashboard')


@section('content')

    <div class="container">
        <form method="post" action="{{url('/admin/teachers/backgrounds/add/id='.$teacher->id)}}">
            @csrf
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>{{__('Thông tin lý lịch')}}</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="relationship">{{__('Quan hệ')}}</label>
                            <div>
                                <input type="text"
                                       class="form-control"
                                       name="relationship"
                                       id="relationship"
                                       value="{{old('relationship')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">{{__('Họ và tên')}}</label>
                            <div>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       id="name" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="birthday">{{__('Ngày sinh')}}</label>
                            <div>
                                <input type="text"
                                       class="form-control date-picker"
                                       name="birthday"
                                       id="birthday" value="{{old('birthday')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone">{{__('Số điện thoại')}}</label>
                            <div>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="job">{{__('Công việc')}}</label>
                            <div>
                                <input type="text" class="form-control" name="job" id="job" value="{{old('job')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <div>
                                <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="resident">{{__('Chỗ ở')}}</label>
                            <div>
                                <input type="text" class="form-control" name="resident" id="resident" value="{{old('resident')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="workplace">{{__('Nơi công tác')}}</label>
                            <div>
                                <input type="text" class="form-control" name="workplace" id="workplace" value="{{old('workplace')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">{{__('Thêm mới')}}</button>
                </div>
            </div>
        </form>
    </div>

@endsection
