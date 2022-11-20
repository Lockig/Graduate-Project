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
use App\Http\Controllers\UserAttendanceController;
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
            return redirect()->route('admin.index')->with('Success', 'Đăng nhập là admin, xin chào ' . Auth::user()->last_name);
        } elseif (Auth::user()->role == 'teacher') {
            return redirect()->route('teachers.index')->with('Success', 'Đăng nhập là giáo viên, xin chào ' . Auth::user()->last_name);
        } elseif (Auth::user()->role == 'student') {
            return redirect()->route('users.index')->with('Success', 'Đăng nhập là học sinh, xin chào ' . Auth::user()->last_name);
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
    Route::get('/calendar', [UserController::class, 'calendar'])->name('users.calendar');
    Route::get('/mark', [UserController::class, 'mark'])->name('users.mark');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('users.editInfo');
    Route::get('/password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::get('/attendance', [UserAttendanceController::class, 'index'])->name('users.attendance');
    Route::get('/request/{course)', [UserController::class, 'requestDayOff'])->name('users.request');
    Route::get('/list/course', [StudentController::class, 'listCourse'])->name('user.listCourse');
    Route::get('/list/request', [RequestDayOffController::class, 'show'])->name('users.listRequest');
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('users.coursesDetails');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/{user}/edit', [UserController::class, 'editInfos'])->name('users.editInfos');
    Route::get('/{user}/password', [UserController::class, 'editPasswords'])->name('users.editPasswords');
    Route::post('/mark-as-read', [UserController::class, 'markNotification'])->name('users.markNotification');
    Route::post('/edit', [UserController::class, 'updateInfo'])->name('users.updateInfo');
    Route::post('/edit/password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::post('/{user}/edit', [UserController::class, 'updateInfos'])->name('users.updateInfos');
    Route::post('/{user}/password', [UserController::class, 'updatePasswords'])->name('users.updatePasswords');
    Route::post('/request', [UserController::class, 'storeRequestDayOff'])->name('users.storeRequest');
    Route::post('/list/request/{request}', [RequestDayOffController::class, 'edit'])->name('users.updateRequest');
    Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');

});

Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/info', [UserController::class, 'show'])->name('teachers.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('teachers.edit');
    Route::get('/attendance', [TeacherController::class, 'showAttendance'])->name('teacher.attendance');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('teachers.editPassword');
    Route::get('/course/list', [TeacherController::class, 'show'])->name('teacher.listCourse');
    Route::get('/course/{course}/material', [CourseController::class, 'createMaterial'])->name('teacher.createCourseMaterial');
    Route::get('/course/{course}/attendance', [UserAttendanceController::class, 'create'])->name('teacher.createAttendance');
    Route::get('/course/{course}/mark', [TeacherController::class, 'createMark'])->name('teacher.createMark');
    Route::get('/course/{course}/material/{material}', [CourseController::class, 'editMaterial'])->name('teacher.editCourseMaterial');
    Route::get('/course/{course}/{user}/mark/edit', [TeacherController::class, 'editMark'])->name('users.editMark');
    Route::get('/course/{course}/list_mark', [TeacherController::class, 'listMark'])->name('teacher.listMark');
    Route::get('/course/{course}/{user}/export', [TeacherController::class, 'exportUserCourse'])->name('teacher.exportUserCourse');
    Route::post('/course/{course}/material', [CourseController::class, 'storeMaterial'])->name('teacher.storeCourseMaterial');
    Route::post('/course/{course}/{user}/mark/edit', [TeacherController::class, 'updateMark'])->name('users.updateMark');
    Route::post('/course/{course}/notification', [TeacherController::class, 'createNotification'])->name('teacher.createNotification');
    Route::patch('/course/{course}/mark', [TeacherController::class, 'storeMark'])->name('users.storeMark');
    Route::post('/course/{course}/create', [UserAttendanceController::class, 'store'])->name('teacher.storeAttendance');
    Route::post('/edit/password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::delete('/course/{course}/{user}/mark', [TeacherController::class, 'destroyMark'])->name('users.deleteMark');
    Route::delete('/course/{course}/material/{material}', [CourseController::class, 'destroyMaterial'])->name('teacher.deleteMaterial');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    user
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/info', [UserController::class, 'show'])->name('admin.show');
    Route::get('/edit', [UserController::class, 'editInfo'])->name('admin.edit');
    Route::get('/edit/password', [UserController::class, 'editPassword'])->name('admin.editPassword');
    Route::put('/create/user', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/edit/password/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
//    course
    Route::get('/create/course', [CourseController::class, 'create'])->name('admin.createCourse');
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('admin.coursesDetails');
    Route::get('/course/{course}/attendance', [UserAttendanceController::class, 'show'])->name('admin.listAttendance');
    Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('admin.editCourse');
    Route::get('/list/course', [AdminController::class, 'show'])->name('admin.listCourse');
    Route::post('/course/schedule', [CourseController::class, 'storeCourseSchedule'])->name('admin.storeCourseSchedule');
    Route::post('/course/create', [CourseController::class, 'store'])->name('admin.storeCourse');
    Route::post('/course/{course}/edit', [CourseController::class, 'update'])->name('admin.updateCourse');
    Route::delete('/delete/{course}', [CourseController::class, 'destroy'])->name('admin.deleteCourse');
    Route::delete('/course/{course}/{user}', [AdminController::class, 'destroyUser'])->name('admin.deleteCourseStudent');
//    subject
    Route::get('/list/subject', [AdminController::class, 'listSubject'])->name('admin.listSubject');
    Route::post('/list/subject', [AdminController::class, 'storeSubject'])->name('admin.storeSubject');
//    student
    Route::get('/list/student', [StudentController::class, 'listStudent'])->name('admin.listStudent');
    Route::post('/course/student', [CourseController::class, 'storeCourseStudent'])->name('admin.storeCourseStudent');
    Route::get('/list/teacher', [TeacherController::class, 'listTeacher'])->name('admin.listTeacher');
//    settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings/fingerprint', [FingerprintController::class, 'update'])->name('admin.fingerprintSetting');




});
