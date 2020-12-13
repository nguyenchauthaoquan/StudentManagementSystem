@extends('dashboard')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Chỉnh sửa thông tin nghành')}}</div>
                <div class="card-body">
                    <form action="{{url('/admin/faculties/majors/update/id='.$major->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label">
                                {{__('Mã nghành')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="id" class="form-control" name="id" value="{{$major->id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">
                                {{__('Tên nghành')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" value="{{$major->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program_name" class="col-md-4 col-form-label">
                                {{__('Tên chương trình đào tạo')}}
                            </label>
                            <div class="col-md-6">
                                <select name="program_name" id="program_name" class="form-control">
                                    @foreach($programs->unique('name') as $program)
                                        <option value="{{$program->name}}"
                                                @if($program->name === $program_major->name) selected @endif>
                                            {{$program->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program_system" class="col-md-4 col-form-label">
                                {{__('Hệ đào tạo')}}
                            </label>
                            <div class="col-md-6">
                                <select name="program_system" id="program_system" class="form-control">
                                    @foreach($programs->unique('system') as $program)
                                        <option value="{{$program->system}}" @if($program->system === $program_major->system) selected @endif>{{$program->system}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label">
                                {{__('Tình trạng')}}
                            </label>
                            <div class="col-md-6">
                                <select id="status"
                                        name="status"
                                        class="form-control @if($errors->has('status')) errors @endif">
                                    <option value="Đang mở" @if($major->status === "Đang mở") selected @endif>{{__('Đang mở')}}</option>
                                    <option value="Đóng lại" @if($major->status === "Đóng lại") selected @endif>{{__('Đóng lại')}}</option>
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

@endsection
