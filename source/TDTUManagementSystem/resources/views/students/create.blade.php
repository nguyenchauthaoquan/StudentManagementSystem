@extends('dashboard')


@section('content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <h1>{{__('Thêm sinh viên mới')}}</h1>
        </div>
    </div>
    <form method="post" action="{{url('/admin/students/add')}}">
        @csrf
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin cơ bản')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md">
                    <div class="form-group">
                        <label for="id">{{__('MSSV')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('id')) errors @endif"
                                   name="id"
                                   id="id"
                                   value="{{old('id')}}"
                            >
                            @if($errors->has('id'))
                                <div class="errors">
                                    <strong>{{ $errors->first('id') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="firstname">{{__('Họ')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('firstname')) errors @endif"
                                   name="firstname"
                                   id="firstname"
                                   value="{{old('firstname')}}"
                            >
                            @if($errors->has('id'))
                                <div class="errors">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="middlename">{{__('Tên đệm')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control"
                                   name="middlename"
                                   id="middlename"
                                   value="{{old('middlename')}}">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="lastname">{{__('Tên')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('lastname')) errors @endif"
                                   name="lastname"
                                   id="lastname"
                                   value="{{old('lastname')}}">
                            @if($errors->has('lastname'))
                                <div class="errors">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin học tại trường')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-4">
                    <label for="major">{{__('Nghành')}}</label>
                    <div>
                        <select type="text"
                                id="major"
                                class="form-control @if($errors->has('major')) errors @endif"
                                name="major">
                            <option selected>{{__('Nghành')}}</option>
                            @foreach($majors->unique('name') as $major)
                                <option value="{{$major->name}}">{{$major->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('major'))
                            <div class="errors">
                                <strong>{{ $errors->first('major') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="program_name">{{__('Chương trình đào tạo')}}</label>
                    <div>
                        <select type="text"
                                id="program_name"
                                class="form-control @if($errors->has('program_name')) errors @endif"
                                name="program_name">
                            <option selected>{{__('Chương trình đào tạo')}}</option>
                            @foreach($programs->unique('name') as $program)
                                <option value="{{$program->name}}">{{$program->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('program_name'))
                            <div class="errors">
                                <strong>{{ $errors->first('program_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="program_system">{{__('Hệ đào tạo')}}</label>
                    <div>
                        <select type="text"
                                id="program_system"
                                class="form-control @if($errors->has('program_system')) errors @endif"
                                name="program_system">
                            <option selected>{{__('Hệ đào tạo')}}</option>
                            @foreach($programs->unique('system') as $program)
                                <option value="{{$program->system}}">
                                    {{$program->system}}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('program_system'))
                            <div class="errors">
                                <strong>{{ $errors->first('program_system') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-4">
                    <label for="group">{{__('Lớp')}}</label>
                    <div>
                        <select class="form-control @if($errors->has('group')) errors @endif"
                                id="group"
                                name="group">
                            <option selected>{{__('Lớp')}}</option>
                            @foreach($groups->unique('name') as $group)
                                <option value="{{$group->name}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('group'))
                            <div class="errors">
                                <strong>{{ $errors->first('group') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="faculty">{{__('Khoa')}}</label>
                    <div>
                        <select name="faculty" id="faculty" class="form-control">
                            <option selected>{{__('Khoa')}}</option>
                            @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="status">{{__('Tình trạng')}}</label>
                    <div>
                        <select name="status" id="status" class="form-control">
                            <option value="Đi học">
                                {{__('Đi học')}}
                            </option>
                            <option value="Thôi học">
                                {{__('Thôi học')}}
                            </option>
                            <option value="Tốt nghiệp">{{__('Tốt nghiệp')}}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin cá nhân')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-2">
                    <label for="gender">{{__('Giới tính')}}</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Nam">{{__('Nam')}}</option>
                        <option value="Nữ">{{__('Nữ')}}</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="birthday">{{__('Ngày sinh')}}</label>
                    <div>
                        <input id="birthday"
                               class="form-control date-picker @if($errors->has('birthday')) errors @endif"
                               name="birthday"
                               type="text"
                               value="{{old('birthday')}}">
                        @if($errors->has('birthday'))
                            <div class="errors">
                                <strong>{{ $errors->first('birthday') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    <label for="origin">{{__('Nguyên quán')}}</label>
                    <div>
                        <input type="text"
                               id="origin"
                               class="form-control @if($errors->has('origin')) errors @endif"
                               name="origin"
                               value="{{old('origin')}}">
                        @if($errors->has('origin'))
                            <div class="errors">
                                <strong>{{ $errors->first('origin') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    <label for="id_number">{{__('Số CMND')}}</label>
                    <div>
                        <input type="text"
                               id="id_number"
                               class="form-control @if($errors->has('id_number')) errors @endif"
                               name="id_number"
                               value="{{old('id_number')}}">
                        @if($errors->has('id_number'))
                            <div class="errors">
                                <strong>{{ $errors->first('id_number') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md">
                    <label for="place_of_id_number">{{__('Nơi cấp')}}</label>
                    <div>
                        <input type="text"
                               id="place_of_id_number"
                               class="form-control @if($errors->has('place_of_id_number')) errors @endif"
                               name="place_of_id_number"
                               value="{{old('place_of_id_number')}}">
                        @if($errors->has('place_of_id_number'))
                            <div class="errors">
                                <strong>{{ $errors->first('place_of_id_number') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-4">
                    <label for="place_of_birth">{{__('Nơi sinh')}}</label>
                    <div>
                        <input type="text"
                               id="place_of_birth"
                               class="form-control @if($errors->has('place_of_birth')) errors @endif"
                               name="place_of_birth"
                               value="{{old('place_of_birth')}}">
                        @if($errors->has('place_of_birth'))
                            <div class="errors">
                                <strong>{{ $errors->first('place_of_birth') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nationality">{{__('Quốc tịch')}}</label>
                    <div>
                        <input type="text"
                               id="nationality"
                               class="form-control @if($errors->has('nationality')) errors @endif"
                               name="nationality"
                               value="{{old('nationality')}}">
                        @if($errors->has('nationality'))
                            <div class="errors">
                                <strong>{{ $errors->first('nationality') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-2">
                    <label for="religion">{{('Tôn giáo')}}</label>
                    <div>
                        <input type="text"
                               id="religion"
                               class="form-control"
                               name="religion" value="{{old('religion')}}">
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="kin">{{('Dân tộc')}}</label>
                    <div>
                        <input type="text"
                               id="kin"
                               class="form-control"
                               name="kin"
                               value="{{old('kin')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông tin liên lạc')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-6">
                    <label for="email">{{__('Địa chỉ email')}}</label>
                    <div>
                        <input type="text"
                               id="email"
                               class="form-control @if($errors->has('email')) errors @endif"
                               name="email"
                               value="{{old('email')}}">
                        @if($errors->has('email'))
                            <div class="errors">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="phone">{{__('Số điện thoại')}}</label>
                    <div>
                        <input type="text"
                               id="phone"
                               class="form-control @if($errors->has('phone')) errors @endif"
                               name="phone"
                               value="{{old('phone')}}">
                        @if($errors->has('phone'))
                            <div class="errors">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Chỗ ở')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-12">
                    <label for="address">{{__('Địa chỉ thường trú')}}</label>
                    <div>
                        <input type="text"
                               id="address"
                               class="form-control @if($errors->has('address')) errors @endif"
                               name="address"
                               value="{{old('address')}}">
                        @if($errors->has('address'))
                            <div class="errors">
                                <strong>{{ $errors->first('address') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-2">
                    <label for="date_of_dormitory">{{__('Ngày ở ký túc xá')}}</label>
                    <div>
                        <input id="date_of_dormitory"
                               class="form-control date-picker @if($errors->has('date_of_dormitory')) errors @endif"
                               name="date_of_dormitory"
                               value="{{old('date_of_dormitory')}}">
                        @if($errors->has('date_of_dormitory'))
                            <div class="errors">
                                <strong>{{ $errors->first('date_of_dormitory') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="room_of_dormitory">{{__('Phòng ký túc xá')}}</label>
                    <div>
                        <input id="room_of_dormitory"
                               class="form-control"
                               name="room_of_dormitory"
                               value="{{old('room_of_dormitory')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12"><h5>{{('Thông tin đoàn hội')}}</h5></div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-4">
                    <label for="date_of_union">{{__('Ngày vào Đoàn')}}</label>
                    <div>
                        <input id="date_of_union"
                               class="form-control date-picker @if($errors->has('date_of_union')) errors @endif"
                               name="date_of_union"
                               type="text"
                               value="{{old('date_of_union')}}">
                        @if($errors->has('date_of_union'))
                            <div class="errors">
                                <strong>{{ $errors->first('date_of_union') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="date_of_communist">{{__('Ngày vào Đảng')}}</label>
                    <div>
                        <input id="date_of_communist"
                               class="form-control date-picker @if($errors->has('date_of_communist')) errors @endif"
                               name="date_of_communist"
                               value="{{old('date_of_communist')}}">
                        @if($errors->has('date_of_communist'))
                            <div class="errors">
                                <strong>{{ $errors->first('date_of_communist') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="date_of_student_union">{{__('Ngày vào hội sinh viên')}}</label>
                    <div>
                        <input id="date_of_student_union"
                               class="form-control date-picker @if($errors->has('date_of_student_union')) errors @endif"
                               name="date_of_student_union"
                               value="{{old('date_of_student_union')}}">
                        @if($errors->has('date_of_student_union'))
                            <div class="errors">
                                <strong>{{ $errors->first('date_of_student_union') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-6">
                    <label for="military">{{__('Số năm tham gia bộ đội')}}</label>
                    <div>
                        <input type="number"
                               name="military"
                               id="military"
                               class="form-control"
                               value="{{old('military') ? old('military') : 0}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="volunteer">{{__('Số năm tham gia tình nguyện')}}</label>
                    <div>
                        <input type="number"
                               name="volunteer"
                               id="volunteer"
                               class="form-control"
                               value="{{old('volunteer') ? old('volunteer') : 0}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12"><h5>{{__('Thông tin khác')}}</h5></div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-12">
                    <label for="talents">{{__('Năng khiếu')}}</label>
                    <div>
                        <input type="text"
                               id="talents"
                               class="form-control"
                               name="talents"
                               value="{{old('talents')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="career">{{__('Việc làm thêm')}}</label>
                    <div>
                        <input type="text"
                               id="career"
                               class="form-control"
                               name="career"
                               value="{{old('career')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="incomes">{{__('Nguồn thu nhập')}}</label>
                    <div>
                        <input type="text"
                               id="incomes"
                               class="form-control"
                               name="incomes"
                               value="{{old('incomes')}}">
                    </div>
                </div>
            </div>
            <div class="row w-100">
                <div class="col-md-12">
                    <label for="description">{{('Mô tả hoàn cảnh gia đình')}}</label>
                    <div>
                            <textarea class="form-control" id="description" name="description" rows="12">
                                {{old('description')}}
                            </textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">{{__('Thêm thông tin mới')}}</button>
            </div>
        </div>
    </form>

@endsection
