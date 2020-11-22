@extends('dashboard')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Thêm thông tin khoa mới')}}</div>
                    <div class="card-body">
                        <form action="{{url('/admin/faculties/add')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="id" class="col-md-4 col-form-label">
                                    {{__('Mã khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="id" class="form-control" name="id" value="{{old('id')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{__('Tên khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Tạo mới') }}
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
