<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login2');
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login2', [App\Http\Controllers\AuthController::class, 'postlogin'])->name('login2');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['role:user']], function(){
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index']);
//     Route::post('/user/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
// });

// Route::group(['middleware' => ['role:admin']], function(){
//     Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
//     Route::get('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'index']);
//     Route::post('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'changepassword']);
//     Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
//     Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
//     Route::get('/admin/adduser', [App\Http\Controllers\UserController::class, 'adduser']);
//     Route::post('/admin/storeregister', [App\Http\Controllers\UserController::class, 'storeregister']);
// });

