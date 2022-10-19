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

class UserController extends Controller implements ShouldQueue
{

    public function index(Request $request)
    {
        if (Auth::user()->role == 'student') {
            return view();
        } elseif (Auth::user()->role == 'teacher') {

        } else {

        }
        $user = Auth::user();
        dd('hello');
//        $role = $user->account->role->role_id;
//        $users = User::query()->name($request)->paginate(5);
//        $courses = DB::table('courses')
//            ->join('course_accounts','courses.course_id','=','course_accounts.course_id')
//            ->where('account_id','=',$user->account->account_id)
//            ->get();
//        return view('user.dashboard', compact(['user', 'role', 'users','courses']));
    }

    public function show(User $user)
    {
        $user = Auth::user();
        return view('user.info', compact('user'));
    }

    public function showAttendance(Request $request)
    {
        $user = Auth::user();
        $courses = Course::query()
            ->join('course_students','courses.course_id','=','course_students.course_id')
            ->where( 'course_students.student_id', '=', $user->id)
            ->get();
        $records = DB::table('attendances')->where('user_id', '=', $user->id)->paginate(5);
        return view('user.attendance', compact('records', 'user','courses'));
    }

    public function editPassword(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.password', compact('user'));
    }


    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        if ($user && $user->account->role != 1) {
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
        return view('user.index', compact('user'));
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

        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        return view('user.admin.list_student', compact('students'));
    }

    public function listTeacher(Request $request)
    {

        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->paginate(5);
        return view('user.admin.list_teacher', compact('teachers'));
    }
}
