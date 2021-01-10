<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Group;
use App\Models\Major;
use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TrainingProgram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $this->validate($request, [
            'account' => ['required'],
            'password' => ['required']
        ], [
            'account.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống'
        ]);

        $credential = [
            'account' => $request['account'],
            'password' => $request['password']
        ];

        if (Auth::attempt($credential, $request['remember']) && (Auth::user()->status === 'Cho Phép')) {
            return redirect('/home')->with('Success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('Failure', 'Đăng nhập thất bại');
    }

    public function home() {
        $user = Auth::user();
        $group = Group::find($user->student->id_group);
        $major = Major::find($user->student->id_major);

        return view('profile', [
            'user' => $user,
            'group' => $group,
            'major' => $major,
            'faculties' => Faculty::where('id', $group->id_faculty)->where('id', $major->id_faculty)->get()
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function users() {
        $role = Role::firstOrCreate(
            ['name' => 'Admin'],
            [
                'name' => 'Admin'
            ]
        );

        return view('users.list', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    public function grantAccess(Request $request, $id) {
        $user = User::find($id);
        $user->roles()->sync($request['roles']);

        return redirect('/admin/users');
    }

    public function changePassword(Request $request) {
        $this->validate($request, [
           'current-password' => ['required'],
           'new-password' => ['required'],
           'confirmed-new-password' => ['required', 'same:new-password']
        ], [
            'current-password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new-password.required' => 'Vui lòng nhập mật khẩu mới',
            'confirmed-new-password.required' => 'Vui lòng xác nhận mật khẩu mới',
            'confirmed-new-password.same' => 'Mật khẩu không trùng khớp'
        ]);
        if (Auth::check()) {
            if (Hash::check($request['current-password'], Auth::user()->password)
            ) {
                $user = User::find(Auth::user()->id);
                $user->update([
                    'password' => Hash::make($request['new-password'])
                ]);

                $this->logout();
            } else {
                return redirect()->back()->with('fail', 'Mật khẩu mới không hợp lệ');
            }
        }
        return redirect('/');
    }
}
