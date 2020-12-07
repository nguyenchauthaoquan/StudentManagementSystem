@extends('dashboard')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Thêm thông tin nghành mới')}}</div>
                <div class="card-body">
                    <form action="{{url('/admin/faculties/majors/add/id='.$faculty->id)}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label">
                                {{__('Mã nghành')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="id" class="form-control" name="id" value="{{old('id')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">
                                {{__('Tên nghành')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program_name" class="col-md-4 col-form-label">
                                {{__('Tên chương trình đào tạo')}}
                            </label>
                            <div class="col-md-6">
                                <select name="program_name" id="program_name" class="custom-select">
                                    @foreach($programs->unique('name') as $program)
                                        <option value="{{$program->name}}">{{$program->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program_system" class="col-md-4 col-form-label">
                                {{__('Hệ đào tạo')}}
                            </label>
                            <div class="col-md-6">
                                <select name="program_system" id="program_system" class="custom-select">
                                    @foreach($programs->unique('system') as $program)
                                        <option value="{{$program->system}}">{{$program->system}}</option>
                                    @endforeach
                                </select>
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

@endsection
