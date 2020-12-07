@extends('dashboard')


@section('content')

    <div class="card">
        <div class="card-header row-header">
            <h5>{{__('Thêm thông tin chương trình mới')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{url('/admin/programs/add')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">
                        {{__('Tên chương trình đào tạo')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="system" class="col-md-4 col-form-label">
                        {{__('Hệ đào tạo')}}
                    </label>
                    <div class="col-md-6">
                        <select id="system" name="system" class="custom-select">
                            <option value="Đại học">{{__('Đại học')}}</option>
                            <option value="Cao đẳng">{{__('Cao đẳng')}}</option>
                            <option value="Trung cấp">{{__('Trung cấp')}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-md-4 col-form-label">
                        {{__('Tình trạng')}}
                    </label>
                    <div class="col-md-6">
                        <select id="status" name="status" class="custom-select">
                            <option value="Đang mở">{{__('Đang mở')}}</option>
                            <option value="Đóng lại">{{__('Đóng lại')}}</option>
                        </select>
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
