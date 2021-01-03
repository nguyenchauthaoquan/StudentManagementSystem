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
                            <label for="program" class="col-md-4 col-form-label">{{__('Chương trình đào tạo')}}</label>
                            <div class="col-md-6">
                                <select type="text"
                                        id="program"
                                        class="form-control @if($errors->has('program')) errors @endif"
                                        name="program">
                                    <option value="" selected>{{__('Chương trình đào tạo')}}</option>
                                    @foreach($programs as $program)
                                        @if ($program->status === 'Đang Mở')
                                            <option value="{{$program->name." - Hệ ".$program->system}}"
                                                    @if(($program_major->name." - Hệ ".$program_major->system) === ($program->name." - Hệ ".$program->system))
                                                    selected
                                                @endif>
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
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label">
                                {{__('Tình trạng')}}
                            </label>
                            <div class="col-md-6">
                                <select id="status"
                                        name="status"
                                        class="form-control @if($errors->has('status')) errors @endif">
                                    <option value="Đang Mở"
                                            @if($major->status === "Đang Mở") selected @endif>
                                        {{__('Đang Mở')}}
                                    </option>
                                    <option value="Đang Đóng"
                                            @if($major->status === "Đang Đóng") selected @endif>
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
                            <div class="col-md-8 offset-md-4 justify-content-center">
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
