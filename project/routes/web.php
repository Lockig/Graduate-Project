<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [UserController::class, 'index'])->middleware('auth');
Route::get('/home', [UserController::class, 'index'])->middleware('auth');
Route::get('/password-reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
Route::get('/log-out', [LoginController::class, 'logout'])->name('signOut');
//route for mailing
Route::post('/send-mail', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendMail');


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/info', [UserController::class, 'info'])->name('users.info');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
    Route::get('/request', [UserController::class, 'dayOffForm'])->name('users.day_off_form');
    Route::get('/password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::get('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
    Route::get('/request', [UserController::class, 'dayOffForm'])->name('users.day_off_form');

    Route::post('/request', [UserController::class, 'storeDayOffForm'])->name('users.request');
    Route::post('/info', [UserController::class, 'updateInfo'])->name('users.info_update');
    Route::post('/password', [UserController::class, 'updatePassword'])->name('users.update_password');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::post('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
    Route::group(['prefix' => 'export'], function () {
        Route::get('/list', [UserController::class, 'exportList'])->name('users.export_list');
    });
    Route::get('/create', [AdminController::class, 'create'])->name('users.create');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/user/{user}', [AdminController::class, 'show'])->name('admin.show')->middleware('auth');
    Route::get('/{user}/info',[AdminController::class,'info'])->name('admin.info');
    //    Route::get('{user}/request', [AdminController::class, 'dayOffForm'])->name('users.day_off_form');
//    Route::get('/{user}/password/', [AdminController::class, 'edit'])->name('users.edit');

    Route::put('/create', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/{user}/info', [AdminController::class, 'updateInfo'])->name('admin.info_update');
    Route::post('/setting', [AdminController::class, 'time_setting'])->name('admin.time_setting');
    Route::post('/{user}/request', [AdminController::class, 'storeDayOffForm'])->name('admin.request');
    Route::post('/{user}', [AdminController::class, 'storeDayOffForm'])->name('admin.store_day_off_form');
    Route::post('/{user}/password', [AdminController::class, 'updatePassword'])->name('admin.update_password');
    Route::post('/{user}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/{user}/attendance', [AdminController::class, 'showAttendance'])->name('admin.attendance');

    Route::delete('/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::group(['prefix' => 'export'], function () {
        Route::get('/list', [AdminController::class, 'exportList'])->name('admin.export_list');
    });

});


Route::get('layout', function () {
    return view('user.get_log_data');
});
