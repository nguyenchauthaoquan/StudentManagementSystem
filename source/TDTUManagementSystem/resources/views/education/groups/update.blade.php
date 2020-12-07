@extends('dashboard')


@section('content')

    <div class="container">
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
                                    <select name="faculty" id="faculty" class="custom-select">
                                        @foreach($faculties as $faculty)
                                            <option value="{{$faculty->id}}" @if($faculty->id === $faculty_group->id) selected @endif>{{$faculty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_name" class="col-md-4 col-form-label">
                                    {{__('Tên chương trình đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="program_name" id="program_name" class="custom-select">
                                        @foreach($programs->unique('name') as $program)
                                            <option value="{{$program->name}}"
                                                    @if($program->name === $program_group->name) selected @endif>
                                                {{$program->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="program_system" class="col-md-4 col-form-label">
                                    {{__('Hệ đào tạo')}}
                                </label>
                                <div class="col-md-6">
                                    <select name="program_system" id="program_system" class="custom-select">
                                        @foreach($programs->unique('system') as $program)
                                            <option value="{{$program->system}}"
                                                    @if($program->system === $program_group->system) selected @endif
                                            >
                                                {{$program->system}}
                                            </option>
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
    </div>

@endsection
