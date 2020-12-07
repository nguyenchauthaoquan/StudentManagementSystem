@extends('dashboard')


@section('content')

    <form method="post" action="{{url('/admin/teachers/update/id='.$teacher->id)}}">
        @csrf
        @method('put')
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>{{__('Chỉnh sửa thông tin giảng viên')}}</h3>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12"><h5>{{__('Thông tin cơ bản')}}</h5></div>
            </div>
            <div class="row row-information">
                <div class="row w-100">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="id">{{__('MSGV')}}</label>
                            <div>
                                <input type="text" class="form-control" name="id" id="id" value="{{$teacher->id}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="firstname">{{__('Họ')}}</label>
                            <div>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$teacher->firstname}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="middlename">{{__('Tên đệm')}}</label>
                            <div>
                                <input type="text" class="form-control" name="middlename" id="middlename" value="{{$teacher->middlename}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group">
                            <label for="lastname">{{__('Tên')}}</label>
                            <div>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$teacher->lastname}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-3">
                        <label for="faculty">{{__('Khoa')}}</label>
                        <div>
                            <select name="faculty" id="faculty" class="form-control">
                                @foreach($faculties as $faculty)
                                    <option value="{{$faculty->id}}" @if($faculty->id === $teacher->faculty->id) selected @endif>
                                        {{$faculty->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="academic_rank">{{__('Học hàm')}}</label>
                        <div>
                            <input type="text" class="form-control" id="academic_rank" name="academic_rank" value="{{$teacher->academic_rank}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="degree">{{__('Học vị')}}</label>
                        <div>
                            <input type="text" class="form-control" id="degree" name="degree" value="{{$teacher->degree}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="status">{{__('Tình trạng')}}</label>
                        <div>
                            <select name="status" id="status" class="form-control">
                                <option selected>{{__('Tình trạng')}}</option>
                                <option value="Đang công tác" @if($teacher->status === "Đang công tác") selected @endif>{{__('Đang công tác')}}</option>
                                <option value="Thôi việc" @if($teacher->status === "Thôi việc") selected @endif>{{__('Thôi việc')}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-header">
                <div class="col-md-12"><h5>{{__('Thông tin cá nhân')}}</h5></div>
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
                        <input id="birthday"
                               class="form-control date-picker"
                               name="birthday"
                               type="text"
                               value="{{$teacher->birthday}}">
                    </div>
                    <div class="col-md">
                        <label for="origin">{{__('Nguyên quán')}}</label>
                        <input type="text"
                               id="origin"
                               class="form-control"
                               name="origin"
                               value="{{$teacher->origin}}">
                    </div>
                    <div class="col-md">
                        <label for="id_number">{{__('Số CMND')}}</label>
                        <input type="text"
                               id="id_number"
                               class="form-control"
                               name="id_number"
                               value="{{$teacher->id_number}}">
                    </div>
                    <div class="col-md">
                        <label for="place_of_id_number">{{__('Nơi cấp')}}</label>
                        <input type="text"
                               id="place_of_id_number"
                               class="form-control"
                               name="place_of_id_number"
                               value="{{$teacher->place_of_id_number}}">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-4">
                        <label for="place_of_birth">{{__('Nơi sinh')}}</label>
                        <input type="text"
                               id="place_of_birth"
                               class="form-control"
                               name="place_of_birth"
                               value="{{$teacher->place_of_birth}}">
                    </div>
                    <div class="col-md-4">
                        <label for="nationality">{{__('Quốc tịch')}}</label>
                        <input type="text"
                               id="nationality"
                               class="form-control"
                               name="nationality"
                               value="{{$teacher->nationality}}">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-2">
                        <label for="religion">{{__('Tôn giáo')}}</label>
                        <input type="text"
                               id="religion"
                               class="form-control"
                               name="religion"
                               value="{{$teacher->religion}}">
                    </div>
                    <div class="col-md-2">
                        <label for="kin">{{__('Dân tộc')}}</label>
                        <input type="text" id="kin" class="form-control" name="kin" value="{{$teacher->kin}}">
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
                        <input type="text" id="email" class="form-control" name="email" value="{{$teacher->email}}">
                    </div>
                    <div class="col-md-6">
                        <label for="phone">{{__('Số điện thoại')}}</label>
                        <input type="text" id="phone" class="form-control" name="phone" value="{{$teacher->phone}}">
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
                        <input id="date_of_union" class="form-control date-picker" name="date_of_union" type="text" value="{{$teacher->date_of_union}}">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_communist">{{__('Ngày vào Đảng')}}</label>
                        <input id="date_of_communist" class="form-control date-picker" name="date_of_communist" value="{{$teacher->date_of_communist}}">
                    </div>
                    <div class="col-md-4">
                        <label for="date_of_student_union">{{__('Ngày vào hội sinh viên')}}</label>
                        <input id="date_of_student_union" class="form-control date-picker" name="date_of_student_union" value="{{$teacher->date_of_student_union}}">
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
                                   value="{{$teacher->military}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="volunteer">{{__('Số năm tham gia tình nguyện')}}</label>
                        <div>
                            <input type="number"
                                   name="volunteer"
                                   id="volunteer"
                                   class="form-control"
                                   value="{{$teacher->volunteer}}">
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
                        <input type="text" id="address" class="form-control" name="address" value="{{$teacher->address}}">
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
                            <input type="text" class="form-control" id="talents" name="talents" value="{{$teacher->talents}}">
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-6">
                        <label for="career">{{__('Nghề nghiệp khác')}}</label>
                        <input type="text" id="career" class="form-control" name="career" value="{{$teacher->career}}">
                    </div>
                    <div class="col-md-6">
                        <label for="incomes">{{__('Thu nhập')}}</label>
                        <input type="text" id="incomes" class="form-control" name="incomes" value="{{$teacher->incomes}}">
                    </div>
                </div>
                <div class="row w-100">
                    <div class="col-md-12">
                        <label for="description">{{__('Hoàn cảnh gia đình')}}</label>
                        <textarea class="form-control" id="description" name="description" rows="12">
                            {{$teacher->description}}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">{{__("Chỉnh sửa")}}</button>
                </div>
            </div>
        </div>
    </form>

@endsection
