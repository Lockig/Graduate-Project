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


Route::get('/list', function () {
    return view('user.admin.list_employee');
});


