@extends('dashboard')

@section('content')
    <div class="card">
        <div class="card-header row-header">
            <h5>{{__('Chỉnh sửa thông tin chương trình')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/programs/update/id='.$program->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">
                        {{__('Tên chương trình đào tạo')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text"
                               id="name"
                               class="form-control @if($errors->has('name')) errors @endif"
                               name="name"
                               value="{{$program->name}}">
                        @if($errors->has('name'))
                            <div class="errors">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="system" class="col-md-4 col-form-label">
                        {{__('Hệ đào tạo')}}
                    </label>
                    <div class="col-md-6">
                        <select id="system"
                                name="system"
                                class="form-control @if($errors->has('system')) errors @endif"
                        >
                            <option value="Đại học"
                                    @if($program->system === "Đại học") selected @endif
                            >
                                {{__('Đại học')}}
                            </option>
                            <option value="Cao đẳng"
                                    @if($program->system === "Cao đẳng") selected @endif
                            >
                                {{__('Cao đẳng')}}
                            </option>
                            <option value="Trung cấp"
                                    @if($program->system === "Trung cấp") selected @endif
                            >
                                {{__('Trung cấp')}}
                            </option>
                        </select>
                        @if($errors->has('system'))
                            <div class="errors">
                                <strong>{{ $errors->first('system') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label">
                        {{__('Tình trạng')}}
                    </label>
                    <div class="col-md-6">
                        <select id="status" name="status" class="custom-select">
                            <option value="Đang Mở"
                                    @if($program->status === "Đang Mở") selected @endif>
                                {{__('Đang Mở')}}
                            </option>
                            <option value="Đang Đóng"
                                    @if($program->status === "Đang Đóng") selected @endif>
                                {{__('Đang Đóng')}}
                            </option>
                        </select>
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
@endsection
