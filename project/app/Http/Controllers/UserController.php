<?php

namespace App\Http\Controllers;

use App\Events\ResetPassword;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Account;
use App\Models\Course;
use App\Models\User;
use App\Notifications\RequestDayOffNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller implements ShouldQueue
{

    public function index(Request $request)
    {
        $student_count = User::query()->where('role', 'like', '%' . 'student' . '%')->count('id');
        $teacher_count = User::query()->where('role', 'like', '%' . 'teacher' . '%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::query()
            ->join('course_students', 'courses.course_id', '=', 'course_students.course_id')
            ->where('course_students.student_id', '=', Auth::user()->id)
            ->get();
        $query = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id);
        $course_schedule = $query->get();
        $today_courses = $query->whereDate('start_at', Carbon::today())->get();
        $tomorrow_courses = $query->whereDate('start_at', Carbon::tomorrow())->get();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses']));
    }

    public function show(User $user)
    {
        $user = User::find($user->id);
        return view('user.info', compact('user'));
    }

    public function showAttendance(Request $request)
    {
        $user = Auth::user();
        $courses = Course::query()
            ->join('course_students', 'courses.course_id', '=', 'course_students.course_id')
            ->where('course_students.student_id', '=', $user->id)
            ->get();
        $records = DB::table('attendances')->where('user_id', '=', $user->id)->paginate(5);
        return view('user.attendance', compact('records', 'user', 'courses'));
    }

    public function editPassword(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.password', compact('user'));
    }


    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        if ($user && $user->role != 'admin') {
            User::destroy($id);
            return back()->with("Success", "Delete user successfully");
        }
        return back()->with("Error", "Có lỗi xảy ra");
        //
    }


    public function info(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.info', compact('user'));
    }

    public function editInfo(Request $request)
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function editInfos($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function updateInfo(UserUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        if ($request->has('profile_avatar')) {
            if ($user->avatar != "") {
                Storage::delete($user->avatar);
            }
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        User::find($user->id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'address' => $validated['address'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return back()->with("Success", "Cập nhật thông tin thành công");
    }


    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $password = $user->password;
//        if(strcmp($validated['current_password'],$password) == 0){
        if (Hash::check($validated['current_password'], $password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = User::query()
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($validated['password_confirmation'])]);
                return back()->with("Success", "Cập nhật mật khẩu thành công");
            }
        }
        return back()->with('Fail', 'Mật khẩu cũ không chính xác');

    }

    public function exportList(Request $request)
    {
        return (new UsersExport($request->users))->download('users.xlsx');
    }

    public function requestDayOff(Request $request)
    {
        $list = DB::table('day_off_requests')->paginate(3);
        $courses = DB::table('course_students')->where('student_id', '=', Auth::user()->id)->get();
        return view('user.request', compact('list'));
    }

    public function storeRequestDayOff(Request $request)
    {

    }


    public function listStudent(Request $request)
    {
        if ($request->has('last_name')) {
            $students = User::query()->name($request)->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        } else {
            $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_student', compact('students'));
        } else {
            return (new UsersExport($students))->download('users.xlsx');
        }
    }

    public function listTeacher(Request $request)
    {
        if ($request->has('last_name')) {
            $teachers = User::query()->name($request)->where('role', 'like', '%' . 'teacher' . '%')->paginate(5);
        } else {
            $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->paginate(5);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_teacher', compact('teachers'));
        } else {
            return (new UsersExport($teachers))->download('users.xlsx');
        }
    }

    public
    function updateInfos(UserUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);
        if ($request->has('profile_avatar')) {
            if ($user->avatar != "") {
                Storage::delete($user->avatar);
            }
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        User::find($user->id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'address' => $validated['address'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return back()->with("Success", "Cập nhật thông tin thành công");
    }


    public
    function updatePasswords(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);
        $password = $user->password;

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);

        if (Hash::check($validated['current_password'], $password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = User::query()
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($validated['password_confirmation'])]);
                return back()->with("Success", "Cập nhật mật khẩu thành công");
            }
        }
        return back()->with('Fail', 'Mật khẩu cũ không chính xác');

    }
}
