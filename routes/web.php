<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->
    middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin (Users Control)
Route::get('/admin/users', [UserController::class, 'dashboard'])->
middleware(['auth','admin'])->name('admin.user');
Route::get('/admin/users/{id}', [UserController::class, 'form'])->
middleware(['auth','admin'])->name('admin.user.form');
Route::put('/admin/users/{id}', [UserController::class, 'edit'])->
middleware(['auth','admin'])->name('admin.user.edit');
Route::post('/admin/users/{id}', [UserController::class, 'addUserDivision'])->
middleware(['auth','admin'])->name('admin.user.addUserDivision');
Route::delete('/admin/users/{id}', [UserController::class, 'delete'])->
middleware(['auth','admin'])->name('admin.user.delete');


// Admin, Karyawan, Kadepartemen, Kahrd (LeaveRequest Control)
Route::get('/admin/leave-request', [LeaveRequestController::class, 'dashboard'])
->middleware(['auth','admin'])->name('admin.leave-request');
Route::get('/admin/leave-request/download', [LeaveRequestController::class, 'download'])
->middleware(['auth','admin'])->name('admin.leave-request.download');
Route::delete('/admin/leave-request/{id}', [LeaveRequestController::class, 'delete'])
->middleware(['auth','admin'])->name('admin.leave-request.delete');
Route::get('/admin/leave-request/form/{id}', [LeaveRequestController::class, 'form'])
->middleware(['auth','admin'])->name('admin.leave-request.edit');
Route::post('/admin/leave-request/form/{id}', [LeaveRequestController::class, 'edit']);

Route::get('/kadepartemen/leave-request', [LeaveRequestController::class, 'dashboard'])
->middleware(['auth','kadepartemen'])->name('kadepartemen.leave-request');
Route::get('/kadepartemen/leave-request/form/{id}', [LeaveRequestController::class, 'form'])
->middleware(['auth','kadepartemen'])->name('kadepartemen.leave-request.edit');
Route::post('/kadepartemen/leave-request/form/{id}', [LeaveRequestController::class, 'edit']);

Route::get('/kahrd/leave-request', [LeaveRequestController::class, 'dashboard'])
->middleware(['auth','kahrd'])->name('kahrd.leave-request');
Route::get('/kahrd/leave-request/download', [LeaveRequestController::class, 'download'])
->middleware(['auth','kahrd'])->name('kahrd.leave-request.download');
Route::get('/kahrd/leave-request/form/{id}', [LeaveRequestController::class, 'form'])
->middleware(['auth','kahrd'])->name('kahrd.leave-request.edit');
Route::post('/kahrd/leave-request/form/{id}', [LeaveRequestController::class, 'edit']);

Route::get('/leave-request', [LeaveRequestController::class, 'dashboard'])
->middleware(['auth','karyawan'])->name('leave-request');
Route::get('/leave-request/form', [LeaveRequestController::class, 'form'])
->middleware(['auth','karyawan'])->name('leave-request.form');
Route::get('/leave-request/form/{id}', [LeaveRequestController::class, 'form'])
->middleware(['auth','karyawan'])->name('leave-request.form.detail');
Route::post('/leave-request/form', [LeaveRequestController::class, 'store'])
->middleware(['auth','karyawan'])->name('leave-request.store');



require __DIR__.'/auth.php';
