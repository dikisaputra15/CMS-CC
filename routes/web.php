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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['role:user']], function(){
    Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/user/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
});

Route::group(['middleware' => ['role:admin']], function(){
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
});

