<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string'
        ], [
            'email.required'    => 'Vui lòng nhập Email.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'email.email'       => 'Email không đúng định dạng.',
            
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $roleid = Auth::user()->roleId;
            if ($roleid == 1) {
                return redirect()->route('dashboard')->with('success', 'Chào mừng Admin quay trở lại!');
            } elseif ($roleid == 2) {
                return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
            }
        }

        return back()->with('error', 'Email hoặc mật khẩu không chính xác!')->withInput($request->only('email'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
