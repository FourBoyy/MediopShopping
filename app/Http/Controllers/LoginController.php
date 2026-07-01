<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;

class LoginController extends Controller {
    public function index() {
        return view('auth.login'); 
    }

    public function getInfo(HttpRequest $request)  {
        $email = $request->input('email');
        $password = $request->input('password');  
    if (empty($email) || empty($password)) {
            return redirect()->back()->withErrors(['message' => 'Email and password are required.']);
        }
        return [$email, $password];  
    }
    



}

