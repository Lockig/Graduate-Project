<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RequestDayOffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Route::get('/', [UserController::class, 'index'])->middleware('auth');
//Route::get('/home', [UserController::class, 'index'])->middleware('auth');
Route::get('/password-reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.reset');
Route::get('/logout', [LoginController::class, 'logout'])->name('signOut');
Route::get('/', function () {
    if (Auth::user()->role == 'admin') {
        return redirect()->route('admin.index')->with('Success', 'Đăng nhập là admin');
    } elseif (Auth::user()->role == 'teacher') {
        return redirect()->route('teachers.index')->with('Success', 'Đăng nhập là giáo viên');
    } elseif (Auth::user()->role == 'student') {
        return redirect()->route('users.index')->with('Success', 'Đăng nhập là học sinh');
    } else {
        return redirect()->back()->with('Fail', 'Có lỗi xảy ra');
    }
});
////route for mailing
Route::post('/send-mail', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendMail');

//
//Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
////  display user dashboard
//    Route::get('/dashboard', [UserController::class, 'index'])->name('users.index');
////  display user information
//    Route::get('/info', [UserController::class, 'info'])->name('users.info');
////  display user information edit form
//    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
////    display user request day off form
//    Route::get('/request', [RequestDayOffController::class, 'create'])->name('users.createForm');
////    display user password edit form
//    Route::get('/password', [UserController::class, 'editPassword'])->name('users.editPassword');
////    display user attendance record
//    Route::get('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
//
//    Route::post('/info', [UserController::class, 'updateInfo'])->name('users.updateInfo');
//    Route::post('/request', [RequestDayOffController::class, 'store'])->name('users.storeForm');
//
//    Route::post('/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
//    Route::post('/', [UserController::class, 'store'])->name('users.store');
//
//    Route::group(['prefix' => 'export'], function () {
//        Route::get('/list', [UserController::class, 'exportList'])->name('users.export_list');
//    });
//    Route::get('/create', [AdminController::class, 'create'])->name('users.create');
//    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//});
//
//Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
//    Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
//    Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
//    Route::get('/{student}', [TeacherController::class, 'show'])->name('teachers.show');
//    Route::post('/{student}', [TeacherController::class, 'store'])->name('teacher.store');
//});
//
//
//Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
//    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
//
//    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
//    Route::get('/user/{user}', [AdminController::class, 'show'])->name('admin.show')->middleware('auth');
//    Route::get('/{user}/info', [AdminController::class, 'info'])->name('admin.info');
//    //    Route::get('{user}/request', [AdminController::class, 'dayOffForm'])->name('users.day_off_form');
////    Route::get('/{user}/password/', [AdminController::class, 'edit'])->name('users.edit');
//
//    Route::put('/create/user', [AdminController::class, 'store'])->name('admin.store');
//    Route::post('/create/course', [CourseController::class, 'store'])->name('admin.storeCourse');
//    Route::post('/{user}/info', [AdminController::class, 'updateInfo'])->name('admin.info_update');
//    Route::post('/settings/time', [AdminController::class, 'timeSetting'])->name('admin.time_setting');
//    Route::post('/{user}/request', [RequestDayOffController::class, 'update'])->name('admin.requestUpdate');
//    Route::post('/{user}/request/delete', [RequestDayOffController::class, 'destroy'])->name('admin.requestDelete');
//    Route::post('/{user}', [AdminController::class, 'storeDayOffForm'])->name('admin.store_day_off_form');
//    Route::post('/{user}/password', [AdminController::class, 'updatePassword'])->name('admin.update_password');
//    Route::post('/{user}/edit', [AdminController::class, 'update'])->name('admin.update');
//    Route::post('/{user}/promote', [RoleController::class, 'store'])->name('admin.user_promote');
//    Route::get('/{user}/attendance', [AdminController::class, 'showAttendance'])->name('admin.attendance');
//
//    Route::delete('/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
//    Route::group(['prefix' => 'export'], function () {
//        Route::get('/list', [AdminController::class, 'exportList'])->name('admin.export_list');
//    });
//
//
//});
//

Route::get('/layout', function () {
    return view('layout.layout');
});


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('users.index');
    Route::get('/info', [UserController::class, 'show'])->name('users.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::get('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
    Route::post('/edit', [UserController::class, 'updateInfo'])->name('users.updateInfo');
    Route::post('/edit/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/request', [UserController::class, 'storeRequestDayOff'])->name('users.storeRequest');
    Route::get('/request', [UserController::class, 'requestDayOff'])->name('users.request');
});

Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/info', [UserController::class, 'show'])->name('teachers.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('teachers.edit');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('teachers.editPassword');


    Route::post('/edit/password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/create/course', [CourseController::class, 'create'])->name('admin.createCourse');
    Route::put('/create/user', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/info', [UserController::class, 'show'])->name('admin.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('admin.edit');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('admin.editPassword');
    Route::get('/course/list', [AdminController::class, 'show'])->name('admin.listCourse');
    Route::get('/course/{course}',[CourseController::class,'show'])->name('admin.coursesDetails');


    Route::post('/edit/password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.storeCourse');
    Route::post('/course/schedule', [CourseController::class, 'storeCourseSchedule'])->name('admin.storeCourseSchedule');
    Route::delete('/delete/{course}', [CourseController::class, 'destroy'])->name('admin.deleteCourse');
});
