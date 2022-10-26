<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FingerprintController;
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
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.index')->with('Success', 'Đăng nhập là admin');
        } elseif (Auth::user()->role == 'teacher') {
            return redirect()->route('teachers.index')->with('Success', 'Đăng nhập là giáo viên');
        } elseif (Auth::user()->role == 'student') {
            return redirect()->route('users.index')->with('Success', 'Đăng nhập là học sinh');
        } else {
            return redirect()->back()->with('Fail', 'Có lỗi xảy ra');
        }
    } else {
        return redirect('login');
    }
});
////route for mailing
Route::post('/send-mail', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendMail');


Route::get('/layout', function () {
    return view('layout.layout');
});


Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/info', [UserController::class, 'info'])->name('users.info');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
    Route::get('/password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::get('/attendance', [UserController::class, 'showAttendance'])->name('users.attendance');
    Route::get('/request', [UserController::class, 'requestDayOff'])->name('users.request');
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('users.coursesDetails');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UserController::class, 'editInfos'])->name('users.editInfos');
    Route::get('/{user}/password', [UserController::class, 'editPasswords'])->name('users.editPasswords');

    Route::post('/edit', [UserController::class, 'updateInfo'])->name('users.updateInfo');
    Route::post('/edit/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/{user}/edit', [UserController::class, 'updateInfos'])->name('users.updateInfos');
    Route::post('/{user}/password', [UserController::class, 'updatePasswords'])->name('users.updatePasswords');
    Route::post('/request', [UserController::class, 'storeRequestDayOff'])->name('users.storeRequest');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('users.deleteUser');
});

Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/info', [UserController::class, 'show'])->name('teachers.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('teachers.edit');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('teachers.editPassword');
    Route::get('/course/list', [TeacherController::class, 'show'])->name('teacher.listCourse');

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
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('admin.coursesDetails');
    Route::get('/course/{course}/attendance', [\App\Http\Controllers\UserAttendanceController::class, 'show'])->name('admin.listAttendance');
    Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('admin.editCourse');
    Route::post('/course/{course}/edit', [CourseController::class, 'update'])->name('admin.updateCourse');

    Route::get('/list/student', [UserController::class, 'listStudent'])->name('admin.listStudent');
    Route::get('/list/teacher', [UserController::class, 'listTeacher'])->name('admin.listTeacher');

    Route::get('/settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::post('/settings/fingerprint',[FingerprintController::class,'update'])->name('admin.fingerprintSetting');


    Route::post('/edit/password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.storeCourse');
    Route::post('/course/schedule', [CourseController::class, 'storeCourseSchedule'])->name('admin.storeCourseSchedule');
    Route::post('/course/student', [CourseController::class, 'storeCourseStudent'])->name('admin.storeCourseStudent');
    Route::delete('/delete/{course}', [CourseController::class, 'destroy'])->name('admin.deleteCourse');
    Route::delete('/course/{course}/{user}', [AdminController::class, 'destroyUser'])->name('admin.deleteCourseStudent');

});
