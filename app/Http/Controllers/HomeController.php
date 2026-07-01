<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;


class HomeController extends Controller
{

public function index () {
      return view('home'); 
}

public function about () {
    return view('about');
}
public function getname() {
    $name = User::paginate(10);
    return view('admin.dashboard', compact('name'));
}
}
