<?php

namespace App\Http\Controllers;

use App\Events\ResetPassword;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
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
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller implements ShouldQueue
{

    public function index(Request $request)
    {
        $notifications = Auth::user()->unreadNotifications;
        $student_count = User::query()->where('role', 'like', '%' . 'student' . '%')->count('id');
        $teacher_count = User::query()->where('role', 'like', '%' . 'teacher' . '%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::query()
            ->join('course_students', 'courses.course_id', '=', 'course_students.course_id')
            ->where('course_students.student_id', '=', Auth::user()->id)
            ->get();
        $course_schedule = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id)
            ->get();
        $today_courses = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id)
            ->whereDate('start_at', Carbon::today())
            ->get();
        $tomorrow_courses = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id)
            ->whereDate('start_at', Carbon::tomorrow())
            ->get();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['notifications', 'courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses']));
    }

    public function show(User $user)
    {
        $user = User::find($user->id);
        return view('user.info', compact('user'));
    }


    public function editPassword(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();
        return view('user.password', compact('user'));
    }


    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::find($id);
        if ($user && $user->role == 'student') {
            DB::transaction(function () use ($id) {
                DB::table('attendances')->where('user_id', '=', $id)->delete();
                DB::table('course_students')->where('student_id', '=', $id)->delete();
                DB::table('day_off_requests')->where('student_id', '=', $id)->delete();
                DB::table('student_grades')->where('user_id', '=', $id)->delete();
            });
            User::find($id)->delete();
            return back()->with("Success", "Xóa người dùng thành công");
        } elseif ($user->role == 'teacher') {
            DB::transaction(function () use ($id) {
                DB::table('attendances')->where('user_id', '=', $id)->delete();
                DB::table('course_students')->where('student_id', '=', $id)->delete();
                DB::table('day_off_requests')->where('student_id', '=', $id)->delete();
                DB::table('courses')->where('teacher_id', '=', $id)->update(['teacher_id' => '10']);
                DB::table('student_grades')->where('user_id', '=', $id)->delete();
            });
            User::find($id)->delete();
            return back()->with("Success", "Xóa người dùng thành công");
        } else {
            return back()->with("Error", "Có lỗi xảy ra");
        }

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
                Storage::delete('app/' . $user->avatar);
            }
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        DB::table('users')->where('id', '=', $user->id)->update([
            'first_name' => ucwords($validated['first_name']),
            'last_name' => ucwords($validated['last_name']),
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'address' => $validated['address'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return to_route('users.info')->with("Success", "Cập nhật thông tin thành công");
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
        if ($validated['current_password'] == $validated['new_password']) {
            return back()->with('Fail', 'Mật khẩu mới không được trùng mật khẩu cũ');
        }
        if (Hash::check($validated['current_password'], $password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = User::query()
                    ->where('id', $user->id)
                    ->update(['password' => Hash::make($validated['password_confirmation'])]);
                return to_route('users.info')->with('Success', 'Đổi mật khẩu thành công');
            } else {
                return back()->with('Fail', 'Xác nhận mậ khẩu không khớp');
            }
        } else {
            return back()->with('Fail', 'Mật khẩu cũ không chính xác');
        }
    }

    public function exportList(Request $request)
    {
        return (new UsersExport($request->users))->download('users.xlsx');
    }

    public function requestDayOff(Request $request, Course $course)
    {
        $course = Course::find($request->course_id);
        $schedules = DB::table('course_schedules')
            ->where('course_id', '=', $request->course_id)
            ->where('start_at', '>=', Carbon::parse(Carbon::now())->format('Y-m-d H:i:s'))->get();
        $list = DB::table('day_off_requests')
            ->join('course_schedules', 'course_schedules.id', '=', 'day_off_requests.schedule_id')
            ->where('student_id', '=', Auth::user()->id)->paginate(5);
        return view('user.request', compact(['list', 'course', 'schedules']));
    }

    public function storeRequestDayOff(Request $request): RedirectResponse
    {
        $validated = $request->validate(['schedule_id' => 'required', 'content' => 'required|min:10']);
        $query = DB::table('day_off_requests')
            ->where('schedule_id', '=', $validated['schedule_id'])
            ->where('student_id', '=', Auth::user()->id);
        $id = $query->value('id');

        if ($id == null) {
            DB::table('day_off_requests')->insert([
                'student_id' => Auth::user()->id,
                'schedule_id' => $validated['schedule_id'],
                'content' => $validated['content'],
                'stage' => 'Chờ duyệt'
            ]);
            $request = $query->value('student_id');

            $user = User::query()
                ->leftJoin('courses', 'courses.teacher_id', '=', 'users.id')
                ->leftJoin('course_schedules', 'course_schedules.course_id', '=', 'courses.course_id')
                ->where('course_schedules.id', '=', $validated['schedule_id'])->get();
            Event::dispatch(new RequestDayOff($user, $request));
            return back()->with('Success', 'Tạo đơn xin nghỉ thành công');
        } else {
            return back()->with('Fail', 'Đơn đã được tạo');
        }

    }


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
        DB::table('users')->where('id', '=', $id)->update([
            'first_name' => ucwords($validated['first_name']),
            'last_name' => ucwords($validated['last_name']),
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'address' => $validated['address'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return to_route('admin.listStudent')->with("Success", "Cập nhật thông tin thành công");
    }


    public function updatePasswords(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        if (Hash::check($validated['current_password'], $user->password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                User::query()
                    ->where('id', '=', $id)
                    ->update(['password' => Hash::make($validated['password_confirmation'])]);
                return back()->with('Success', 'Cập nhật mật khẩu thành công');
            } else {
                return back()->with('Fail', 'Mật khẩu xác nhận không khớp');
            }
        } else {
            return back()->with('Fail', 'Mật khẩu cũ không đúng');
        }
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        return response()->noContent();
    }

    public function editPasswords($id)
    {
        $user = User::find($id);
        return view('user.password', compact('user'));
    }

    public function calendar()
    {
        $notifications = Auth::user()->notifications()->paginate(5);
        $course_schedule = DB::table('course_schedules')->get();
        $tomorrow_courses = DB::table('course_schedules')->whereDate('start_at', Carbon::tomorrow())->get();
        $today_courses = DB::table('course_schedules')->whereDate('start_at', Carbon::today())->get();
        return view('user.calendar', compact('today_courses', 'tomorrow_courses', 'course_schedule', 'notifications'));
    }

    public function mark()
    {
        $user_marks = DB::table('student_grades')
            ->rightJoin('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.student_id', '=', Auth::user()->id)->get();
        return view('user.user_mark', compact('user_marks'));
    }

}
