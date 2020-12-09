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
                            <a href="{{url('/admin/users/create')}}" class="dropdown-item">
                                {{__('Thêm tài khoản mới')}}
                            </a>
                            <a href="{{url('/admin/roles/create')}}" class="dropdown-item">
                                {{__('Thêm quyền truy cập')}}
                            </a>
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
                        @foreach($roles as $role)
                            @foreach($user->roles as $user_role)
                                <td>
                                    <label>
                                        <input type="checkbox"
                                               name="roles[]"
                                               value="{{$role->name}}"
                                               @if($role->name === $user_role->name) checked @endif>{{$role->name}}
                                    </label>
                                </td>
                            @endforeach
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
