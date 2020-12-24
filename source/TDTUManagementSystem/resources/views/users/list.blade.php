@extends('dashboard')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>{{__('Tên Đăng Nhập')}}</th>
                    <th>{{__('Email')}}</th>
                    <th rowspan="{{count($roles)}}">{{__('Quyền Truy Cập')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->account}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{action('App\Http\Controllers\AuthController@grantAccess', $user->id)}}"
                              method="post"
                              class="list-roles">
                            @csrf
                            @method('put')
                            @foreach($roles as $role)
                                <input type="checkbox"
                                       name="roles[]"
                                       value="{{$role->id}}"
                                       id="{{$role->name}}"
                                       class="roles"
                                       @if($user->roles()->where('name', $role->name)->first() !== null)
                                       checked
                                       @endif
                                >
                                <label for="{{$role->name}}">
                                    {{$role->name}}
                                </label>
                            @endforeach
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
