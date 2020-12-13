@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Chỉnh sửa thông tin Khoa')}}</div>
                    <div class="card-body">
                        <form action="{{url('/admin/faculties/update/id='.$faculty->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label">
                                    {{__('Mã khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           id="id"
                                           class="form-control @if($errors->has('id')) errors @endif"
                                           name="id"
                                           value="{{$faculty->id}}">
                                    @if($errors->has('id'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{__('Tên khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           id="name"
                                           class="form-control @if($errors->has('name')) errors @endif"
                                           name="name"
                                           value="{{$faculty->name}}">
                                    @if($errors->has('name'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label">
                                    {{__('Tình trạng')}}
                                </label>
                                <div class="col-md-6">
                                    <select id="status"
                                            name="status"
                                            class="form-control @if($errors->has('status')) errors @endif"
                                            >
                                        <option value="Đang mở" @if($faculty->status === "Đang mở") selected @endif>{{__('Đang mở')}}</option>
                                        <option value="Đóng lại" @if($faculty->status === "Đóng lại") selected @endif>{{__('Đóng lại')}}</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Chỉnh sửa') }}
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
