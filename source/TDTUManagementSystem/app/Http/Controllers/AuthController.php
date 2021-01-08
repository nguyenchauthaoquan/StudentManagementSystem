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
        $user = null;
        if (Auth::check()) {
            $student = Student::find(auth()->user()->account);
            $teacher = Teacher::find(auth()->user()->account);

            if ($student) {
               $user = $student;
            }
            if ($teacher) {
                $user = $teacher;
            }
        }
        $group = Group::find($user->id_group);
        $major = Major::find($user->id_major);
        $faculties = Faculty::whereIn('id', [$group->id_faculty, $major->id_faculty])->get();
        $programs =TrainingProgram::where('id', $group->id_training)->where('id', $major->id_training)->get();

        return view('profile', [
            'user' => $user,
            'group' => $group,
            'major' => $major,
            'faculties' => $faculties,
            'programs' => $programs
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
}
