<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//GET /
Route::get('/', [HomeController::class, 'index']); 
// GET /login
Route::get("/login", [LoginController::class, 'index'])->name('login'); 
// GET /register
Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
//POST /login
Route::post('/login', [LoginController::class, 'getInfo']); 

//GET /about

Route::get('/about', [HomeController::class, 'about']);

Route::get('/dashboard', [HomeController::class, 'getname']);
