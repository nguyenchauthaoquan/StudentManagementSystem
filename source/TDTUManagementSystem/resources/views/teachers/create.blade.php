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
                                <input type="text" class="form-control" name="id" id="id" value="{{old('id')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="firstname">{{__('Họ')}}</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{old('firstname')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="middlename">{{__('Tên đệm')}}</label>
                            <div>
                                <input type="text" class="form-control" name="middlename" id="middlename" value="{{old('middlename')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="lastname">{{__('Tên')}}</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{old('lastname')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="faculty">{{__('Khoa')}}</label>
                        <div>
                            <select name="faculty" id="faculty" class="form-control">
                                <option selected>{{__('Khoa')}}</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{$faculty->name}}">{{$faculty->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="academic_rank">{{__('Học hàm')}}</label>
                        <div>
                            <input type="text" class="form-control" id="academic_rank" name="academic_rank" value="{{old('academic_rank')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="degree">{{__('Học vị')}}</label>
                        <div>
                            <input type="text" class="form-control" id="degree" name="degree" value="{{old('degree')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="status">{{__('Tình trạng')}}</label>
                        <div>
                            <select name="status" id="status" class="form-control">
                                <option value="Đang công tác">{{__('Đang công tác')}}</option>
                                <option value="Thôi việc">{{__('Thôi việc')}}</option>
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
                            <option value="Male">{{__('Nam')}}</option>
                            <option value="Female">{{__('Nữ')}}</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="birthday">{{__('Ngày sinh')}}</label>
                        <input id="birthday" class="form-control date-picker" name="birthday" type="text" value="{{old('birthday')}}">
                    </div>
                    <div class="col-md">
                        <label for="origin">{{__('Nguyên quán')}}</label>
                        <input type="text" id="origin" class="form-control" name="origin" value="{{old('origin')}}">
                    </div>
                    <div class="col-md">
                        <label for="id_number">{{__('Số CMND')}}</label>
                        <input type="text" id="id_number" class="form-control" name="id_number" value="{{old('id_number')}}">
                    </div>
                    <div class="col-md">
                        <label for="place_of_id_number">{{__('Nơi cấp')}}</label>
                        <input type="text" id="place_of_id_number" class="form-control" name="place_of_id_number" value="{{old('place_of_id_number')}}">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="place_of_birth">{{__('Nơi sinh')}}</label>
                        <input type="text" id="place_of_birth" class="form-control" name="place_of_birth" value="{{old('place_of_birth')}}">
                    </div>
                    <div class="col-md-4">
                        <label for="nationality">{{__('Quốc tịch')}}</label>
                        <input type="text" id="nationality" class="form-control" name="nationality" value="{{old('nationality')}}">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="religion">{{__('Tôn giáo')}}</label>
                        <input type="text" id="religion" class="form-control" name="religion" value="{{old('religion')}}">
                    </div>
                    <div class="col-md-2">
                        <label for="kin">{{__('Dân tộc')}}</label>
                        <input type="text" id="kin" class="form-control" name="kin" value="{{old('kin')}}">
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
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">{{__('Số điện thoại')}}</label>
                        <input type="text" id="phone" class="form-control" name="phone">
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
                        <input id="date_of_union" class="form-control date-picker" name="date_of_union" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_communist">{{__('Ngày vào Đảng')}}</label>
                        <input id="date_of_communist" class="form-control date-picker" name="date_of_communist">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_student_union">{{__('Ngày vào hội sinh viên')}}</label>
                        <input id="date_of_student_union" class="form-control date-picker" name="date_of_student_union">
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
                        <input type="text" id="address" class="form-control" name="address">
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
                            <input type="text" class="form-control" id="talents" name="talents" value="{{old('talents')}}">
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6">
                        <label for="career">{{__('Nghề nghiệp khác')}}</label>
                        <input type="text" id="career" class="form-control" name="career">
                    </div>
                    <div class="col-md-6">
                        <label for="incomes">{{__('Thu nhập')}}</label>
                        <input type="text" id="incomes" class="form-control" name="incomes">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="description">{{__('Hoàn cảnh gia đình')}}</label>
                        <textarea class="form-control" id="description" name="description" rows="12"></textarea>
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
