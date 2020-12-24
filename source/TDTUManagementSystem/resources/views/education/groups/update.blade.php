@extends('dashboard')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Chỉnh sửa thông tin lớp')}}</div>
                <div class="card-body">
                    <form action="{{url('/admin/groups/update/id='.$group->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">
                                {{__('Tên lớp')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" value="{{$group->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="faculty" class="col-md-4 col-form-label">
                                {{__('Khoa')}}
                            </label>
                            <div class="col-md-6">
                                <select name="faculty" id="faculty" class="form-control">
                                    @foreach($faculties as $faculty)
                                        @if($faculty->status === 'Đang Mở')
                                            <option value="{{$faculty->id}}"
                                                    @if($faculty->id === $faculty_group->id) selected @endif>
                                                {{$faculty->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program_name" class="col-md-4 col-form-label">
                                {{__('Tên chương trình đào tạo')}}
                            </label>
                            <div class="col-md-6">
                                <select name="program_name" id="program_name" class="form-control">
                                    @foreach($programs->unique('name') as $program)
                                        @if ($program->status === 'Đang Mở')
                                            <option value="{{$program->name}}"
                                                    @if($program->name === $program_group->name) selected @endif>
                                                {{$program->name}}
                                            </option>
                                        @endif
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
                                        @if($program->status === 'Đang Mở')
                                        <option value="{{$program->system}}"
                                                @if($program->system === $program_group->system) selected @endif>
                                            {{$program->system}}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_admission" class="col-md-4 col-form-label">
                                {{__('Ngày tuyển sinh')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="date_admission" class="form-control date-picker" name="date_admission" value="{{$group->date_admission}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_graduation" class="col-md-4 col-form-label">
                                {{__('Ngày tốt nghiệp')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="date_graduation" class="form-control date-picker" name="date_graduation" value="{{$group->date_graduation}}">
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
                                    <option value="Đang Mở"
                                            @if($group->status === "Đang Mở") selected @endif
                                    >
                                        {{__('Đang Mở')}}
                                    </option>
                                    <option value="Tốt Nghiệp" @if($group->status === "Tốt Nghiệp") selected @endif>
                                        {{__('Tốt Nghiệp')}}
                                    </option>
                                    <option value="Đang Đóng"
                                            @if($group->status === "Đang Đóng") selected @endif
                                    >
                                        {{__('Đang Đóng')}}
                                    </option>
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
