@extends('welcome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đăng nhập') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{url('/login')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="account" class="col-md-4 col-form-label text-md-right">{{ __('Tên Đăng Nhập') }}</label>

                                <div class="col-md-6">
                                    <input id="account"
                                           type="text"
                                           class="form-control @if($errors->has('account')) errors @endif"
                                           name="account"
                                           value="{{ old('account') }}">

                                    @if ($errors->has('account'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('account') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password"
                                           type="password"
                                           class="form-control @if($errors->has('password')) errors @endif"
                                           name="password">

                                    @if($errors->has('password'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{session('Failure')}}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đăng nhập') }}
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
