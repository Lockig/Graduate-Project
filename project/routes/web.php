<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('user.index');
});

Route::get('/password', function () {
    return view('user.password');
});


Route::get('/attendance', function () {
    return view('user.attendance');
});

Route::get('/create', function () {
    return view('user.create');
});

Route::get('/list', function () {
    return view('user.admin.list_employee');
});


Route::get('/form', function () {
    return view('user.form');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/create',[UserController::class,'store'])->name('users.store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('send-mail',[ForgotPasswordController::class,'sendMail'])->name('sendMail');
