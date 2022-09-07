<?php

use Illuminate\Support\Facades\Route;


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

