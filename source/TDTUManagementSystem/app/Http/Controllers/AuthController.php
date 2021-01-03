<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt($credential, $request['remember'])) {
            return redirect('/home')->with('Success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('Failure', 'Đăng nhập thất bại');
    }

    public function home() {
        $user = null;
        if (Auth::check()) {
            $student = Student::find(auth()->user()->account);
            $teacher = Teacher::find(auth()->user()->account);

            if ($student) {
               $user = $student;
            } else if ($teacher) {
                $user = $teacher;
            }
        }

        return view('home', [
            'user' => $user,
        ]);
    }

    public function profileStudent() {
        $user = null;
        if (Auth::check()) {
            $student = Student::find(auth()->user()->account);
            $teacher = Teacher::find(auth()->user()->account);

            if ($student) {
                $user = $student;
            } else if ($teacher) {
                $user = $teacher;
            }
        }

        return view('profile', [
            'user' => $user,
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function users() {
        Role::firstOrCreate(
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
}
