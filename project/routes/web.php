<?php

use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/',[UserController::class,'index'])->middleware('auth');
Route::get('/home',[UserController::class,'index'])->middleware('auth');

Route::get('/password-reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.reset');

Route::get('/log-out',[LoginController::class,'logout'])->name('signOut');

//route for mailing
Route::post('/send-mail',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('sendMail');


Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
//    get list of users information
    Route::get('/', [UserController::class, 'index'])->name('users.index');
//    get create account form
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
//    get user information
    Route::get('/info',[UserController::class,'info'])->name('users.info');;

    Route::post('/info',[UserController::class,'infoUpdate'])->name('users.info_update');;
//    get details of user attendance
    Route::get('/attendance',[UserController::class,'showAttendance'])->name('users.attendance');
//    get day off request form
    Route::get('{user}/request',[UserController::class,'dayOffForm'])->name('users.day_off_form');
//    send day off request form
    Route::post('/{user}/request',[UserController::class,'storeDayOffForm'])->name('users.request');
//    get user by id
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
//    get form edit user by id
    Route::get('/{user}/edit/', [UserController::class, 'edit'])->name('users.edit');
//    save form create account
    Route::post('/', [UserController::class, 'store'])->name('users.store');
//    send form request
    Route::post('/{user}',[UserController::class,'storeDayOffForm'])->name('users.store_day_off_form');
//    update account by id
    Route::post('/{user}/password', [UserController::class, 'updatePassword'])->name('users.update_password');
    //    update account by id
    Route::post('/{user}',[UserController::class,'update'])->name('users.update');

//    delete account by id
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

});

