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

Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'index']);
    Route::post('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'changepassword']);
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/adduser', [App\Http\Controllers\UserController::class, 'adduser']);
    Route::post('/admin/storeregister', [App\Http\Controllers\UserController::class, 'storeregister']);
    Route::get('/admin/{id}/edituser', [App\Http\Controllers\UserController::class, 'edituser']);
    Route::put('/admin/edituser/{id}', [App\Http\Controllers\UserController::class, 'updateuser']);
    Route::delete('/admin/{id}', [App\Http\Controllers\UserController::class, 'destroyuser']);
    Route::get('/admin/{id}/changeuserpass', [App\Http\Controllers\UserController::class, 'changeuserpass']);
    Route::post('/admin/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);
    Route::get('/admin/services', [App\Http\Controllers\ServiceController::class, 'index']);
    Route::get('/admin/{id}/editsrv', [App\Http\Controllers\ServiceController::class, 'editsrv']);
    Route::put('/admin/editsrv/{id}', [App\Http\Controllers\ServiceController::class, 'updatesrv']);
    Route::get('/admin/addservice', [App\Http\Controllers\ServiceController::class, 'addservice']);
    Route::post('/admin/storesrv', [App\Http\Controllers\ServiceController::class, 'storesrv']);
    Route::delete('/admin/delsrv/{id}', [App\Http\Controllers\ServiceController::class, 'destroysrv']);
});

Route::middleware(['auth', 'user-access:Finance'])->group(function () {
    Route::get('/user/finance', [App\Http\Controllers\HomeController::class, 'index'])->name('finance');
});

Route::middleware(['auth', 'user-access:HR'])->group(function () {
    Route::get('/user/hr', [App\Http\Controllers\HomeController::class, 'hr'])->name('hr');
});

Route::middleware(['auth', 'user-access:Data Entry'])->group(function () {
    Route::get('/user/dataentry', [App\Http\Controllers\HomeController::class, 'dataentry'])->name('dataentry');
});

// Route::group(['middleware' => ['role:user']], function(){
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index']);
//     Route::post('/user/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
// });

