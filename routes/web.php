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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/admin/note', [App\Http\Controllers\NoteController::class, 'index']);
    Route::get('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'index']);
    Route::post('/admin/changepassword', [App\Http\Controllers\ChangepassController::class, 'changepassword']);
    Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'index']);
    Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/admin/adduser', [App\Http\Controllers\UserController::class, 'adduser']);
    Route::post('/admin/storeregister', [App\Http\Controllers\UserController::class, 'storeregister']);
    Route::get('/admin/{id}/edituser', [App\Http\Controllers\UserController::class, 'edituser']);
    Route::put('/admin/edituser/{id}', [App\Http\Controllers\UserController::class, 'updateuser']);
    Route::post('/admin/hapususr', [App\Http\Controllers\UserController::class, 'destroyuser']);
    Route::get('/admin/{id}/changeuserpass', [App\Http\Controllers\UserController::class, 'changeuserpass']);
    Route::post('/admin/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);
    Route::get('/admin/services', [App\Http\Controllers\ServiceController::class, 'index']);
    Route::get('/admin/{id}/editsrv', [App\Http\Controllers\ServiceController::class, 'editsrv']);
    Route::put('/admin/editsrv/{id}', [App\Http\Controllers\ServiceController::class, 'updatesrv']);
    Route::get('/admin/addservice', [App\Http\Controllers\ServiceController::class, 'addservice']);
    Route::post('/admin/storesrv', [App\Http\Controllers\ServiceController::class, 'storesrv']);
    Route::post('/admin/delsrv', [App\Http\Controllers\ServiceController::class, 'destroysrv']);
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
    Route::post('/admin/delcli', [App\Http\Controllers\ClientController::class, 'destroycli']); 
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
    Route::post('/admin/editnote', [App\Http\Controllers\NoteController::class, 'editnote']);
    Route::post('/admin/deldash', [App\Http\Controllers\NoteController::class, 'destroydash']);
    Route::get('/admin/export', [App\Http\Controllers\ExportController::class, 'index']);
    Route::get('/admin/exportxls', [App\Http\Controllers\ExportController::class, 'export']);
    Route::get('/admin/invoice', [App\Http\Controllers\DocumentController::class, 'invoice']);
    Route::get('/admin/addinvoice', [App\Http\Controllers\DocumentController::class, 'addinvoice']);
    Route::post('/admin/storeinvoice', [App\Http\Controllers\DocumentController::class, 'storeinvoice']);
    Route::get('/admin/contract', [App\Http\Controllers\DocumentController::class, 'contract']);
    Route::get('/admin/addcontract', [App\Http\Controllers\DocumentController::class, 'addcontract']);
    Route::post('/admin/storecontract', [App\Http\Controllers\DocumentController::class, 'storecontract']);
    Route::get('/admin/prop', [App\Http\Controllers\DocumentController::class, 'prop']);
    Route::get('/admin/addprop', [App\Http\Controllers\DocumentController::class, 'addprop']);
    Route::post('/admin/storeprop', [App\Http\Controllers\DocumentController::class, 'storeprop']);
    Route::get('/admin/delinv/{id}', [App\Http\Controllers\DocumentController::class, 'destroyinv']);
    Route::get('/admin/delctr/{id}', [App\Http\Controllers\DocumentController::class, 'destroyctr']);
    Route::get('/admin/delprp/{id}', [App\Http\Controllers\DocumentController::class, 'destroyprp']);
    Route::get('/admin/alldoc', [App\Http\Controllers\DocumentController::class, 'alldoc']);
    Route::get('/admin/adddoc', [App\Http\Controllers\DocumentController::class, 'adddoc']);
    Route::post('/admin/storedoc', [App\Http\Controllers\DocumentController::class, 'storedoc']);
    Route::get('/admin/{id}/addfile', [App\Http\Controllers\DocumentController::class, 'addfile']);
    Route::post('/admin/storefile', [App\Http\Controllers\DocumentController::class, 'storefile']);
    Route::post('/admin/deldoc', [App\Http\Controllers\DocumentController::class, 'destroydoc']);
});

// Route::middleware(['auth', 'user-access:Finance'])->group(function () {
//     Route::get('/user/finance', [App\Http\Controllers\HomeController::class, 'index'])->name('finance');
// }); 

// Route::middleware(['auth', 'user-access:HR'])->group(function () {
//     Route::get('/user/hr', [App\Http\Controllers\HomeController::class, 'hr'])->name('hr');
// });

// Route::middleware(['auth', 'user-access:Data Entry'])->group(function () {
//     Route::get('/user/dataentry', [App\Http\Controllers\HomeController::class, 'dataentry'])->name('dataentry');
// });

// Route::group(['middleware' => ['role:user']], function(){
//     Route::get('/user/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     Route::get('/user/profile', [App\Http\Controllers\ProfileController::class, 'index']);
//     Route::post('/user/profile', [App\Http\Controllers\ProfileController::class, 'changeprofile']);
// });

