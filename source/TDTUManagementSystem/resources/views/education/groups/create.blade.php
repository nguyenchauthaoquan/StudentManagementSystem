@extends('dashboard')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('Nhập thông tin lớp mới')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/admin/groups/add')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">
                                    {{__('Tên lớp')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           id="name"
                                           class="form-control @if($errors->has('name')) errors @endif"
                                           name="name"
                                           value="{{old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="faculty" class="col-md-4 col-form-label">
                                    {{__('Khoa')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="faculty"
                                            id="faculty"
                                            class="form-control @if($errors->has('faculty')) errors @endif">
                                        <option selected>{{__('Khoa')}}</option>
                                        @foreach($faculties as $faculty)
                                            @if ($faculty->status === "Đang Mở")
                                                <option value="{{$faculty->id}}">
                                                    {{$faculty->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('faculty'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('faculty') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_name" class="col-md-4 col-form-label">
                                    {{__('Tên chương trình đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="program_name"
                                            id="program_name"
                                            class="form-control @if($errors->has('program_name')) errors @endif">
                                        <option selected>{{__('Tên Chương Trình Đào Tạo')}}</option>
                                        @foreach($programs->unique('name') as $program)
                                            @if ($program->status === 'Đang Mở')
                                                <option value="{{$program->name}}">
                                                    {{$program->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('program_name'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('program_name') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_system" class="col-md-4 col-form-label">
                                    {{__('Hệ đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="program_system"
                                            id="program_system"
                                            class="form-control @if($errors->has('program_system')) errors @endif">
                                        <option selected>{{__('Hệ đào tạo')}}</option>
                                        @foreach($programs->unique('system') as $program)
                                            @if($program->status === 'Đang Mở')
                                                <option value="{{$program->system}}">{{$program->system}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if($errors->has('program_system'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('program_system') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_admission" class="col-md-4 col-form-label">
                                    {{__('Ngày tuyển sinh')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           id="date_admission"
                                           class="form-control @if($errors->has('date_admission')) errors @endif date-picker"
                                           name="date_admission"
                                           value="{{old('date_admission')}}">
                                    @if($errors->has('date_admission'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('date_admission') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_graduation" class="col-md-4 col-form-label">
                                    {{__('Ngày tốt nghiệp')}}
                                </label>
                                <div class="col-md-6">
                                    <input type="text"
                                           id="date_graduation"
                                           class="form-control @if($errors->has('date_graduation')) errors @endif date-picker"
                                           name="date_graduation"
                                           value="{{old('date_graduation')}}">
                                    @if($errors->has('date_graduation'))
                                        <div class="errors">
                                            <strong>{{ $errors->first('date_graduation') }}</strong>
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
                                            class="form-control @if($errors->has('status')) errors @endif">
                                        <option value="Đang Mở">{{__('Đang Mở')}}</option>
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
