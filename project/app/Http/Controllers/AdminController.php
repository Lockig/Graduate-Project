<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Account;
use App\Models\Course;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Promise\Coroutine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Random;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $student_count = User::query()->where('role','like','%'.'student'.'%')->count('id');
        $teacher_count = User::query()->where('role','like','%'.'teacher'.'%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::all();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['courses', 'users','student_count','teacher_count','course_count']));
        //
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserCreateRequest $request)
    {
        $credentials = $request->validated();
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $password = Random::generate(8);
        $date = Carbon::createFromFormat('m/d/Y', $credentials['date_of_birth'])->format('Y-m-d');
        DB::table('users')->insert([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'date_of_birth' => $date,
            'email' => $credentials['email'],
            'mobile_number' => $credentials['mobile_number'],
            'avatar' => $profile_avatar ?? null,
            'password' => Hash::make($password),
            'address' => $credentials['address'] ?? '',
            'role' => $credentials['role'],
            'fingerprint' => '0'
        ]);

        $user_id = User::query()->email($request)->value('id');

        $user = User::find($user_id);

        event(new CreateUser($user, $password));
        Cache::put('command', 'register');
        Cache::put('user_id', $user_id);
        return redirect()->back()->with('Success', 'Tạo tài khoản thành công, kiểm tra hòm thư để nhận mật khẩu');
    }

    public function show(User $user)
    {
        $courses = Course::query()->paginate(5);
        return view('user.admin.list_course',compact(['courses']));
        //
    }

    public function showAttendance($id)
    {
        $user = User::find($id);
        $logs = DB::table('daily_logs')
            ->where('user_id', '=', $user->user_id)
            ->paginate(5);
        return view('user.attendance', compact(['user', 'logs']));
    }

    public function edit(User $user, Request $request)
    {
        $users = User::find($request->id);
        return view('user.password', compact('users'));
        //
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->account->role->role_id != 1) {
            Cache::put('command', 'delete');
            Cache::put('user_id', $id);
            User::destroy($id);
            return back()->with("Success", "Xóa người dùng thành công");
        }
        return back()->with("Error", "Có lỗi xảy ra");
        //
    }


    public function info(Request $request)
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function updateInfo(UserUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        User::find($user->user_id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'email' => $validated['email'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return back()->with("Success", "Update personal information successfully");
    }


    public function storeDayOffForm(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);
        $validated = $request->validate([
            'content' => 'required|string',
            'day_start' => 'required|date',
            'day_end' => 'required|date'
        ]);

        DB::table('day_off_requests')->insert([
            'user_id' => $id,
            'day_start' => Carbon::parse($validated['day_start'])->format('Y-m-d'),
            'day_end' => Carbon::parse($validated['day_end'])->format('Y-m-d'),
            'content' => $validated['content'],
        ]);
        RequestDayOff::dispatch($user);
        return back()->with('Success', 'Tạo đơn xin nghỉ thành công');
    }

    public function updatePassword(Request $request, $id): RedirectResponse
    {
        $user_id = Auth::user()->user_id;
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $password = $user_id->account->password;
        if (Hash::check($validated['current_password'], $password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = Account::query()
                    ->where('user_id', $id)
                    ->update(['password' => Hash::make($validated['password_confirmation'])]);
                return back()->with("Success", "Update password successfully");
            }
        }
        return back()->with('Fail', 'Wrong current password');

    }

    public function exportList(Request $request)
    {
        return (new UsersExport($request))->download('users.xlsx');
    }

    public function settings()
    {
        $list_requests = DB::table('day_off_requests')
            ->where('stage', 'like', '%' . 'Chờ duyệt' . '%')
            ->paginate(5);
        return view('user.admin.settings', compact('list_requests'));
    }

    public function timeSetting(Request $request)
    {
        DB::table('check_times')->update([
            'time_in' => $request->time_start,
            'time_out' => $request->time_end
        ]);
        return back()->with('Success', 'Cài đặt thời gian thành công');
    }
}
