<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã được đăng ký.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'phonenumber.required' => 'Vui lòng nhập số điện thoại.',
        ]);
        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'phonenumber' => $request->phonenumber ?? null,
            'password' => Hash::make($request->password),
            'roleId' => 2,
        ]);
        return redirect()->route('login')->with('success', 'Đăng ký tài khoản thành công!');
    }
}
