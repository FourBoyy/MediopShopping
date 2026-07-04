<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Models\User;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

//GET /about

Route::get('/about', [HomeController::class, 'about']);


Route::group(['prefix' => ''], function () {
    // Register
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Login
    Route::get("/login", [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


// Admin Routes (Private Route)

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin.role']], function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/list', [ProductController::class, 'productList'])->name('admin.products.list');
        Route::get('/add', [ProductController::class, 'productAdd'])->name('admin.products.add');
        Route::get('/detail', [ProductController::class, 'productDetail'])->name('admin.products.detail');
        Route::get('/edit', [ProductController::class, 'productEdit'])->name('admin.products.edit');

    }); 
    // user
    Route::group(['prefix' => 'user'], function() {
        Route::get('/list', [UserController::class, 'userList'])->name('admin.user.list'); 
        Route::get('/add', [UserController::class, 'userAdd'])->name('admin.users.add'); 
        Route::get('/detail', [UserController::class, 'userDetail'])->name('admin.users.detail'); 
        Route::post('/create', [UserController::class, 'create']); 
    }); 
    // order
    Route::group(['prefix' => 'order'], function() {
        Route::get('/list', [OrderController::class, 'orderList'])->name('admin.order.list');
        Route::get('/detail/{id}', [OrderController::class, 'orderDetail'])->name('admin.order.detail');
        Route::put('/admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');
    });


});
//404
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
