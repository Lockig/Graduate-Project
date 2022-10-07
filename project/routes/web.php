<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RequestDayOffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeacherController;
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
    // hiển thị danh sách các khóa học của học sinh
    Route::get('/', [UserController::class, 'index'])->name('users.index');

    Route::get('/info', [UserController::class, 'info'])->name('users.info');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
    Route::get('/request', [RequestDayOffController::class, 'create'])->name('users.createForm');
    Route::get('/password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::get('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');

    Route::post('/request', [RequestDayOffController::class, 'store'])->name('users.storeForm');
    Route::post('/info', [UserController::class, 'updateInfo'])->name('users.info_update');
    Route::post('/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/', [UserController::class, 'store'])->name('users.store');
//    Route::post('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
    Route::group(['prefix' => 'export'], function () {
        Route::get('/list', [UserController::class, 'exportList'])->name('users.export_list');
    });
    Route::get('/create', [AdminController::class, 'create'])->name('users.create');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::group(['prefix'=>'teacher','middleware'=>'auth'],function(){
    Route::get('/',[TeacherController::class,'index'])->name('teacher.index');
    Route::get('/create',[TeacherController::class,'create'])->name('teacher.create');
    Route::get('/{student}',[TeacherController::class,'show'])->name('teachers.show');
    Route::post('/{student}',[TeacherController::class,'store'])->name('teacher.store');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');

    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/user/{user}', [AdminController::class, 'show'])->name('admin.show')->middleware('auth');
    Route::get('/{user}/info', [AdminController::class, 'info'])->name('admin.info');
    //    Route::get('{user}/request', [AdminController::class, 'dayOffForm'])->name('users.day_off_form');
//    Route::get('/{user}/password/', [AdminController::class, 'edit'])->name('users.edit');

    Route::put('/create/user', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/create/course',[CourseController::class,'store'])->name('admin.storeCourse');
    Route::post('/{user}/info', [AdminController::class, 'updateInfo'])->name('admin.info_update');
    Route::post('/settings/time', [AdminController::class, 'timeSetting'])->name('admin.time_setting');
    Route::post('/{user}/request', [RequestDayOffController::class, 'update'])->name('admin.requestUpdate');
    Route::post('/{user}/request/delete', [RequestDayOffController::class, 'destroy'])->name('admin.requestDelete');
    Route::post('/{user}', [AdminController::class, 'storeDayOffForm'])->name('admin.store_day_off_form');
    Route::post('/{user}/password', [AdminController::class, 'updatePassword'])->name('admin.update_password');
    Route::post('/{user}/edit', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/{user}/promote', [RoleController::class, 'store'])->name('admin.user_promote');
    Route::get('/{user}/attendance', [AdminController::class, 'showAttendance'])->name('admin.attendance');

    Route::delete('/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::group(['prefix' => 'export'], function () {
        Route::get('/list', [AdminController::class, 'exportList'])->name('admin.export_list');
    });


});


Route::get('layout', function () {
    return view('layout.layout');
});



Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
//    dashboard chứa danh sách các khóa học
    Route::get('/',[UserController::class,'index'])->name('user.index');
//    route chứa thông tin cá nhân
    Route::get('/info',[UserController::class,'show'])->name('user.show');
//    route chứa thông tin điểm danh cá nhân
    Route::get('/attendance',[UserController::class,'attendance'])->name('user.attendance');
//
});
