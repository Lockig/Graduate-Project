<?php

use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/',[LoginController::class,'showLoginForm']);
Route::get('/home',[LoginController::class,'showLoginForm']);

Route::get('/password-reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.reset');

Route::get('/log-out',[LoginController::class,'logout']);

//route for mailing
Route::post('/send-mail',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('sendMail');


Route::group(['prefix'=>'dashboard','middleware'=>'auth'],function(){
//    get list of users information
    Route::get('/', [UserController::class, 'index'])->name('users.index');
//    get create account form
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
//    get user by id
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
//    get form edit user by id
    Route::get('/{user}/edit/', [UserController::class, 'edit'])->name('users.edit');
//    save form create account
    Route::post('/', [UserController::class, 'store'])->name('users.store');
//    update account by id
    Route::patch('/{user}', [UserController::class, 'update'])->name('users.update');
//    delete account by id
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


