@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{__('Thêm lớp mới')}}
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Nhập thông tin lớp mới')}}</div>
                    <div class="card-body">
                        <form action="{{url('/admin/groups/add')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{__('Tên lớp')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="faculty" class="col-md-4 col-form-label">
                                    {{__('Khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="faculty" class="form-control" name="faculty" value="{{old('faculty')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_name" class="col-md-4 col-form-label">
                                    {{__('Tên chương trình đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="program_name" class="form-control" name="program_name" value="{{old('program_name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_system" class="col-md-4 col-form-label">
                                    {{__('Hệ đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="program_system" class="form-control" name="program_system" value="{{old('program_system')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_admission" class="col-md-4 col-form-label">
                                    {{__('Ngày tuyển sinh')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_admission" class="form-control date-picker" name="date_admission" value="{{old('date_admission')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_graduation" class="col-md-4 col-form-label">
                                    {{__('Ngày tốt nghiệp')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text" id="date_graduation" class="form-control date-picker" name="date_graduation" value="{{old('date_graduation')}}">
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
