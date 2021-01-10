@extends('home')
@section('content')
    @if(session('fail'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{session('fail')}}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Thay đổi mật khẩu')}}</div>
                    <div class="card-body">
                        <form action="{{url('/updatepwd')}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group row">
                                <label for="current-password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Mật Khẩu Hiện Tại') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="current-password"
                                           type="password"
                                           class="form-control @if($errors->has('current-password')) errors @endif"
                                           name="current-password"
                                           value="{{ old('current-password') }}">

                                    @if ($errors->has('current-password'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="new-password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Mật Khẩu Mới') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="new-password"
                                           type="password"
                                           class="form-control @if($errors->has('new-password')) errors @endif"
                                           name="new-password"
                                           value="{{ old('new-password') }}">

                                    @if ($errors->has('new-password'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('new-password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmed-new-password" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Xác Nhận Mật Khẩu Mới') }}
                                </label>

                                <div class="col-md-6">
                                    <input id="confirmed-new-password"
                                           type="password"
                                           class="form-control @if($errors->has('confirmed-new-password')) errors @endif"
                                           name="confirmed-new-password"
                                           value="{{ old('confirmed-new-password') }}">

                                    @if ($errors->has('confirmed-new-password'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('confirmed-new-password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Lưu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
