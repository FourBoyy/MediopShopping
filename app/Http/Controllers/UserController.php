<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

class UserController extends Controller {
    public function userList () {
      $users =   User::paginate(10); 
        return view('admin.user.user-list', compact('users')); 
    }

    public function userAdd () {
        $roles = Role::all(); 
        return view('admin.user.user-add', compact('roles')) ; 
    }
}