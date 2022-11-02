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
    Route::get('/admin/hapususr/{id}', [App\Http\Controllers\UserController::class, 'destroyuser']);
    Route::get('/admin/{id}/changeuserpass', [App\Http\Controllers\UserController::class, 'changeuserpass']);
    Route::post('/admin/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);
    Route::get('/admin/services', [App\Http\Controllers\ServiceController::class, 'index']);
    Route::get('/admin/{id}/editsrv', [App\Http\Controllers\ServiceController::class, 'editsrv']);
    Route::put('/admin/editsrv/{id}', [App\Http\Controllers\ServiceController::class, 'updatesrv']);
    Route::get('/admin/addservice', [App\Http\Controllers\ServiceController::class, 'addservice']);
    Route::post('/admin/storesrv', [App\Http\Controllers\ServiceController::class, 'storesrv']);
    Route::get('/admin/delsrv/{id}', [App\Http\Controllers\ServiceController::class, 'destroysrv']);
    Route::get('/admin/prospective', [App\Http\Controllers\ProspecController::class, 'index']);
    Route::get('/admin/addprospec', [App\Http\Controllers\ProspecController::class, 'addprospec']);
    Route::post('/admin/storeprospec', [App\Http\Controllers\ProspecController::class, 'storeprospec']);
    Route::get('/admin/{id}/updatepros', [App\Http\Controllers\ProspecController::class, 'addupdate']);
    Route::post('/admin/saveupdatepros', [App\Http\Controllers\ProspecController::class, 'updatepros']);
    Route::get('/admin/{id}/detailpros', [App\Http\Controllers\ProspecController::class, 'detailpros']);
    Route::get('/admin/delpros/{id}', [App\Http\Controllers\ProspecController::class, 'destroypros']);
    Route::get('/admin/clients', [App\Http\Controllers\ClientController::class, 'index']);
    Route::get('/admin/addclient', [App\Http\Controllers\ClientController::class, 'addclient']);
    Route::post('/admin/storeclient', [App\Http\Controllers\ClientController::class, 'storeclient']); 
    Route::get('/admin/delcli/{id}', [App\Http\Controllers\ClientController::class, 'destroycli']); 
    Route::get('/admin/{id}/editcli', [App\Http\Controllers\ClientController::class, 'editcli']);
    Route::put('/admin/updatecli/{id}', [App\Http\Controllers\ClientController::class, 'updatecli']);
    Route::get('/admin/{id}/detailcli', [App\Http\Controllers\ClientController::class, 'detailcli']);
    Route::get('/admin/{id}/addsrvcli', [App\Http\Controllers\ClientController::class, 'addsrvcli']);
    Route::post('/admin/storesrvcli', [App\Http\Controllers\ClientController::class, 'storesrvcli']);
    Route::get('/admin/{id}/editsrvcli', [App\Http\Controllers\ClientController::class, 'editsrvcli']);
    Route::put('/admin/updatesrvcli/{id}', [App\Http\Controllers\ClientController::class, 'updatesrvcli']);
    Route::get('/admin/{id}/addsumcli', [App\Http\Controllers\ClientlogController::class, 'addsumcli']);
    Route::post('/admin/storesumcli', [App\Http\Controllers\ClientlogController::class, 'storesumcli']);
    Route::get('/admin/{id}/editsumcli', [App\Http\Controllers\ClientlogController::class, 'editsumcli']);
    Route::put('/admin/updatesumcli/{id}', [App\Http\Controllers\ClientlogController::class, 'updatesumcli']);
    Route::get('/admin/{id}/addnote', [App\Http\Controllers\NoteController::class, 'addnote']);
    Route::post('/admin/storenote', [App\Http\Controllers\NoteController::class, 'storenote']);
    Route::get('/admin/{id}/editnote', [App\Http\Controllers\NoteController::class, 'editnote']);
    Route::put('/admin/updatenote/{id}', [App\Http\Controllers\NoteController::class, 'updatenote']);
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

