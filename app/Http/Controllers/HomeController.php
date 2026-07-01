<?php

namespace App\Http\Controllers;

use App\Models\Role;


class HomeController extends Controller
{

public function index () {
    
  $role = Role::where('name', 'admin')->get()[0];
  $userArr  = []; 
  foreach ($role->users as $user) {
   $userArr[]  = [
        'id'=>$user->id,
        'name'=>$user->username,
        'role'=>$role->name,
        'email'=>$user->email
    ]; 
  }

  $userArr = (object) $userArr; 
//   return $userArr; 

  return view('home', compact('userArr')); 

  
}

}
