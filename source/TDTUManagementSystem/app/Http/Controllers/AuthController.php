<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $this->validate($request, [
            'id' => ['required'],
            'password' => ['required']
        ], [
            'id.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống'
        ]);

        $credential = [
            'id' => $request['id'],
            'password' => $request['password']
        ];

        if (Auth::attempt($credential)) {
            return redirect()->back()->with('Success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('Failure', 'Đăng nhập thất bại');
    }

    public function logout() {
        Auth::logout();

        return redirect();
    }
}
