@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header row-header">
            <h5>{{__('Thêm thông tin chương trình mới')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/subjects/update/id='.$subject->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label">
                        {{__('Mã Môn Học')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text"
                               id="id"
                               class="form-control @if($errors->has('id')) errors @endif"
                               name="id"
                               value="{{$subject->id}}">
                        @if($errors->has('id'))
                            <div class="errors">
                                <span>{{ $errors->first('id') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">
                        {{__('Tên Môn Học')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text"
                               id="name"
                               class="form-control @if($errors->has('name')) errors @endif"
                               name="name"
                               value="{{$subject->name}}">
                        @if($errors->has('name'))
                            <div class="errors">
                                <span>{{ $errors->first('name') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="credits" class="col-md-4 col-form-label">
                        {{__('Số Tín Chỉ')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text"
                               id="credits"
                               class="form-control @if($errors->has('credits')) errors @endif"
                               name="credits"
                               value="{{$subject->credits}}">
                        @if($errors->has('credits'))
                            <div class="errors">
                                <span>{{ $errors->first('credits') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="faculty" class="col-md-4 col-form-label">
                        {{__('Khoa')}}
                    </label>
                    <div class="col-md-6">
                        <select name="faculty" id="faculty" class="form-control @if($errors->has('faculty')) errors @endif">
                            <option selected>{{__('Khoa')}}</option>
                            @foreach($faculties as $faculty)
                                @if($faculty->status === 'Đang Mở')
                                    <option value="{{$faculty->id}}"
                                            @if($subject->faculty->name === $faculty->name) selected @endif>
                                        {{$faculty->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('faculty'))
                            <div class="errors">
                                <span>{{ $errors->first('faculty') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="program_name" class="col-md-4 col-form-label">
                        {{__('Chương trình đào tạo')}}
                    </label>
                    <div class="col-md-6">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle"
                                    type="button"
                                    id="dropdown"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                {{__('Chương trình đào tạo')}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown">
                                <div class="dropdown-header">
                                    <strong>{{__('Tên Chương Trình Đào Tạo')}}</strong>
                                </div>
                                @foreach($programs->unique('name') as $program)
                                    @if($program->status === 'Đang Mở')
                                        <div class="dropdown-item">
                                            <input name="program_name[]"
                                                   id="program_name"
                                                   class="form-check-input"
                                                   type="checkbox"
                                                   value="{{$program->name}}"
                                                   @foreach($subject->programs as $subject_program) @if($subject_program->name === $program->name) checked @endif @endforeach>
                                            <label class="form-check-label">{{$program->name}}</label>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">
                                    <strong>{{__('Hệ đào tạo')}}</strong>
                                </div>
                                @foreach($programs->unique('system') as $program)
                                    @if($program->status === 'Đang Mở')
                                        <div class="dropdown-item">
                                            <input name="system[]"
                                                   id="system"
                                                   class="form-check-input"
                                                   type="checkbox"
                                                   value="{{$program->system}}"
                                                   @foreach($subject->programs as $subject_program) @if($subject_program->system === $program->system) checked @endif @endforeach>
                                            <label for="system" class="form-check-label">{{$program->system}}</label>
                                        </div>
                                    @endif
                                @endforeach
                                @if($errors->has('program_name'))
                                    <div class="errors">
                                        <span>{{ $errors->first('program_name') }}</span>
                                    </div>
                                @endif
                                @if($errors->has('system'))
                                    <div class="errors">
                                        <span>{{ $errors->first('system') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

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
                                <span>{{ $errors->first('status') }}</span>
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
@endsection
