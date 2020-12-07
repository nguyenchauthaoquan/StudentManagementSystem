@extends('dashboard')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th colspan="3">
                        <button class="btn btn-primary dropdown-toggle"
                                type="button" id="dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdown-btn">
                            <a href="{{url('/admin/users/create')}}" class="dropdown-item">{{__('Thêm tài khoản mới')}}</a>
                            <a href="{{url('/admin/roles/create')}}" class="dropdown-item">{{__('Thêm quyền truy cập')}}</a>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>{{__('ID Đăng Nhập')}}</th>
                    <th>{{__('Quyền truy cập')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        @foreach($user->roles as $role)
                            <td>{{$role->name}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
