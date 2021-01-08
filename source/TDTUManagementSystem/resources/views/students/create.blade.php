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
                                    <span>{{ $errors->first('id') }}</span>
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
                            @if($errors->has('firstname'))
                                <div class="errors">
                                    <span>{{ $errors->first('firstname') }}</span>
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
                                    <span>{{ $errors->first('lastname') }}</span>
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
                            <option value="" selected>{{__('Nghành')}}</option>
                            @foreach($majors->unique('name') as $major)
                                @if ($major->status === 'Đang Mở')
                                    <option value="{{$major->name}}"
                                            @if(old('major') === $major->name) selected @endif>
                                        {{$major->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('major'))
                            <div class="errors">
                                <span>{{ $errors->first('major') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="program">{{__('Chương trình đào tạo')}}</label>
                    <div>
                        <select type="text"
                                id="program"
                                class="form-control @if($errors->has('program')) errors @endif"
                                name="program">
                            <option value="" selected>{{__('Chương trình đào tạo')}}</option>
                            @foreach($programs as $program)
                                @if ($program->status === 'Đang Mở')
                                    <option value="{{$program->name." - Hệ ".$program->system}}"
                                            @if(old('program') === ($program->name." - Hệ ".$program->system)) selected @endif>
                                        {{$program->name." - Hệ ".$program->system}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('program'))
                            <div class="errors">
                                <span>{{ $errors->first('program') }}</span>
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
                            <option value="" selected>{{__('Lớp')}}</option>
                            @foreach($groups->unique('name') as $group)
                                @if ($group->status === 'Đang Mở')
                                    <option value="{{$group->name}}" @if(old('group') === $group->name) selected @endif>
                                        {{$group->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @if($errors->has('group'))
                            <div class="errors">
                                <span>{{ $errors->first('group') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="faculty">{{__('Khoa')}}</label>
                    <div>
                        <select name="faculty"
                                id="faculty"
                                class="form-control @if($errors->has('faculty')) errors @endif">
                            <option value="" selected>{{__('Khoa')}}</option>
                            @foreach($faculties as $faculty)
                                @if($faculty->status === 'Đang Mở')
                                    <option value="{{$faculty->id}}" @if(old('faculty') === $faculty->id) selected @endif>
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
                <div class="col-md-3">
                    <label for="status">{{__('Tình trạng')}}</label>
                    <div>
                        <select name="status" id="status" class="form-control">
                            <option value="Đi Học">
                                {{__('Đi Học')}}
                            </option>
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
                    <select name="gender" id="gender" class="form-control @if($errors->has('gender')) errors @endif">
                        <option selected>{{__('Giới Tính')}}</option>
                        <option value="Nam" @if(old('gender') === "Nam") selected @endif>{{__('Nam')}}</option>
                        <option value="Nữ" @if(old('gender') === "Nữ") selected @endif>{{__('Nữ')}}</option>
                    </select>
                    @if($errors->has('gender'))
                        <div class="errors">
                            <span>{{ $errors->first('gender') }}</span>
                        </div>
                    @endif
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
                                <span>{{ $errors->first('birthday') }}</span>
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
                                <span>{{ $errors->first('origin') }}</span>
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
                                <span>{{ $errors->first('id_number') }}</span>
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
                                <span>{{ $errors->first('place_of_id_number') }}</span>
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
                                <span>{{ $errors->first('place_of_birth') }}</span>
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
                                <span>{{ $errors->first('nationality') }}</span>
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
                                <span>{{ $errors->first('email') }}</span>
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
                                <span>{{ $errors->first('phone') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Chỗ ở Hiện Tại')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md-12">
                    <label for="address">{{__('Địa chỉ')}}</label>
                    <div>
                        <input type="text"
                               id="address"
                               class="form-control @if($errors->has('address')) errors @endif"
                               name="address"
                               value="{{old('address')}}">
                        @if($errors->has('address'))
                            <div class="errors">
                                <span>{{ $errors->first('address') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-header">
            <div class="col-md-12">
                <h5>{{__('Thông Tin Chỗ Ở (Ký Túc Xá Tại Trường)')}}</h5>
            </div>
        </div>
        <div class="row row-information">
            <div class="row w-100">
                <div class="col-md">
                    <label for="date_of_dormitory">{{__('Ngày ở ký túc xá')}}</label>
                    <div>
                        <input id="date_of_dormitory"
                               class="form-control date-picker @if($errors->has('date_of_dormitory')) errors @endif"
                               name="date_of_dormitory"
                               value="{{old('date_of_dormitory')}}">
                        @if($errors->has('date_of_dormitory'))
                            <div class="errors">
                                <span>{{ $errors->first('date_of_dormitory') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md">
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
                                <span>{{ $errors->first('date_of_union') }}</span>
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
                                <span>{{ $errors->first('date_of_communist') }}</span>
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
                                <span>{{ $errors->first('date_of_student_union') }}</span>
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
