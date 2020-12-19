@extends('dashboard')


@section('content')

    <form method="post" action="{{url('/admin/teachers/add')}}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>{{__('Thêm giảng viên mới')}}</h2>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12">
                    <h5>{{__('Thông tin cơ bản')}}</h5>
                </div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="id">{{__('MSGV')}}</label>
                            <div>
                                <input type="text"
                                       class="form-control @if($errors->has('id')) errors @endif"
                                       name="id"
                                       id="id"
                                       value="{{old('id')}}">
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
                                       value="{{old('firstname')}}">
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
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="faculty">{{__('Khoa')}}</label>
                        <div>
                            <select name="faculty"
                                    id="faculty"
                                    class="form-control @if($errors->has('faculty')) errors @endif">
                                <option selected>{{__('Khoa')}}</option>
                                @foreach($faculties as $faculty)
                                    @if($faculty->status === 'Đang Mở')
                                        <option value="{{$faculty->id}}">
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
                        <label for="academic_rank">{{__('Học hàm')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('academic_rank')) errors @endif"
                                   id="academic_rank"
                                   name="academic_rank"
                                   value="{{old('academic_rank')}}">
                            @if($errors->has('academic_rank'))
                                <div class="errors">
                                    <span>{{$errors->first('academic_rank')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="degree">{{__('Học vị')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('degree')) errors @endif"
                                   id="degree"
                                   name="degree"
                                   value="{{old('degree')}}">
                            @if($errors->has('degree'))
                                <div class="errors">
                                    <span>{{$errors->first('degree')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="status">{{__('Tình trạng')}}</label>
                        <div>
                            <select name="status" id="status" class="form-control">
                                <option value="Đang Công Tác">{{__('Đang Công Tác')}}</option>
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
                        <div>
                            <select name="gender"
                                    id="gender"
                                    class="form-control @if($errors->has('gender')) errors @endif">
                                <option selected>{{__('Giới Tính')}}</option>
                                <option value="Nam">{{__('Nam')}}</option>
                                <option value="Nữ">{{__('Nữ')}}</option>
                            </select>
                            @if($errors->has('gender'))
                                <div class="errors">
                                    <span>{{$errors->first('gender')}}</span>
                                </div>
                            @endif
                        </div>
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
                                    <span>{{$errors->first('birthday')}}</span>
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
                                    <span>{{$errors->first('origin')}}</span>
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
                                    <span>{{$errors->first('id_number')}}</span>
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
                                    <span>{{$errors->first('place_of_id_number')}}</span>
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
                                    <span>{{$errors->first('place_of_birth')}}</span>
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
                                    <span>{{$errors->first('nationality')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="religion">{{__('Tôn giáo')}}</label>
                        <div>
                            <input type="text"
                                   id="religion"
                                   class="form-control @if($errors->has('religion')) errors @endif"
                                   name="religion"
                                   value="{{old('religion')}}">
                            @if($errors->has('religion'))
                                <div class="errors">
                                    <span>{{$errors->first('religion')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="kin">{{__('Dân tộc')}}</label>
                        <div>
                            <input type="text"
                                   id="kin"
                                   class="form-control @if($errors->has('kin')) errors @endif"
                                   name="kin"
                                   value="{{old('kin')}}">
                            @if($errors->has('kin'))
                                <div class="errors">
                                    <span>{{$errors->first('kin')}}</span>
                                </div>
                            @endif
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
                        <label for="email">{{__('Email')}}</label>
                        <div>
                            <input type="text"
                                   id="email"
                                   class="form-control @if($errors->has('email')) errors @endif"
                                   name="email"
                                   value="{{old('email')}}">
                            @if($errors->has('email'))
                                <div class="errors">
                                    <span>{{$errors->first('email')}}</span>
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
                                    <span>{{$errors->first('phone')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12"><h5>{{__('Thông tin đoàn hội')}}</h5></div>
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
                                    <span>{{$errors->first('date_of_union')}}</span>
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
                                    <span>{{$errors->first('date_of_communist')}}</span>
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
                                    <span>{{$errors->first('date_of_student_union')}}</span>
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
                <div class="col-md-12">
                    <h5>{{__('Thông tin chỗ ở')}}</h5>
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
                                    <span>{{$errors->first('address')}}</span>
                                </div>
                            @endif
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
                        <label for="talents">{{__('Sở thích')}}</label>
                        <div>
                            <input type="text"
                                   class="form-control @if($errors->has('talents')) errors @endif"
                                   id="talents"
                                   name="talents"
                                   value="{{old('talents')}}">
                            @if ($errors->has('talents'))
                                <div class="errors">
                                    <span>{{$errors->first('talents')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6">
                        <label for="career">{{__('Nghề nghiệp khác')}}</label>
                        <div>
                            <input type="text"
                                   id="career"
                                   class="form-control @if($errors->has('career')) errors @endif"
                                   name="career"
                                   value="{{old('career')}}">
                            @if ($errors->has('carrer'))
                                <div class="errors">
                                    <span>{{$errors->first('carrer')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="incomes">{{__('Thu nhập')}}</label>
                        <div>
                            <input type="text"
                                   id="incomes"
                                   class="form-control @if($errors->has('incomes')) errors @endif"
                                   name="incomes"
                                   value="{{old('incomes')}}">
                            @if ($errors->has('incomes'))
                                <div class="errors">
                                    <span>{{$errors->first('incomes')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="description">{{__('Hoàn cảnh gia đình')}}</label>
                        <div>
                            <textarea class="form-control @if($errors->has('description')) errors @endif"
                                      id="description"
                                      name="description"
                                      rows="12"
                                      cols="12">
                            {{old('description')}}
                        </textarea>
                            @if ($errors->has('description'))
                                <div class="errors">
                                    <span>{{$errors->first('description')}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">{{__('Thêm mới')}}</button>
                </div>
            </div>
        </div>
    </form>

@endsection
