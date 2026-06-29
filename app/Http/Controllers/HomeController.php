<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index () {
        $users = User::all(); 


        return $users; 
    }
    public function show($id) {
        $user = User::find($id); 
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return $user;
    }
}
