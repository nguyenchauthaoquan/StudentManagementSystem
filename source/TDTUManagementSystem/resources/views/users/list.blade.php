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
                              class="list-roles form-check-inline">
                            @csrf
                            @method('put')
                            <div class="btn-group">
                                <button type="submit" class="btn btn-outline-success">
                                    {{__('Phân Quyền')}}
                                </button>
                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">

                                </button>
                                <div class="dropdown-menu">
                                    @foreach($roles as $role)
                                        <div class="dropdown-item">
                                            <input type="checkbox"
                                                   name="roles[]"
                                                   value="{{$role->id}}"
                                                   id="{{$role->name}}"
                                                   class="roles form-check-input"
                                                   @foreach($user->roles as $user_role)
                                                   @if($user_role->name === $role->name)
                                                   checked
                                                @endif
                                                @endforeach
                                            >
                                            <label for="{{$role->name}}" class="form-check-label">
                                                {{$role->name}}
                                            </label>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
