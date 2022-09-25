<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Account;
use App\Models\User;
use App\Notifications\RequestDayOffNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class UserController extends Controller implements ShouldQueue
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $user->account->role->role_id;;
        $users = User::query()->name($request)->paginate(5);
        return view('user.index', compact(['user', 'role', 'users']));
    }

    public function show(User $user)
    {
        return view('user.index', compact('user'));
    }

    public function showAttendance()
    {
        $user = Auth::user();
        $logs = DB::table('daily_logs')
            ->where('user_id', '=', $user->user_id)
            ->get();
        return view('user.attendance', compact(['user', 'logs']));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.password', compact('user'));
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->user_id;
        dd($user_id);
        User::find($user_id)->update([]);

    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user && $user->account->role != 1) {
            User::destroy($id);
            return back()->with("Success", "Delete user successfully");
        }
        return back()->with("Error", "Có lỗi xảy ra");
        //
    }


    public function info(Request $request)
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function updateInfo(UserCreateRequest $request)
    {
        $user = Auth::user();
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
        return back()->with("Success", "Cập nhật thông tin thành công");
    }

    public function dayOffForm()
    {
        return view('user.form');
    }

    public function storeDayOffForm(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'content' => 'required|string|max:200',
            'day_start' => 'required|date',
            'day_end' => 'required|date'
        ]);

        DB::table('day_off_requests')->insert([
            'user_id' => $user->user_id,
            'day_start' => Carbon::parse($validated['day_start'])->format('Y-m-d'),
            'day_end' => Carbon::parse($validated['day_end'])->format('Y-m-d'),
            'content' => $validated['content'],
        ]);
//        event(new RequestDayOff($user));
        return back()->with('Success', 'Tạo đơn xin nghỉ thành công');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $password = $user->account->password;
        if ($password == $validated['current_password']) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = Account::query()
                    ->where('user_id', $user->user_id)
                    ->update(['password' => $validated['password_confirmation']]);
                return back()->with("Success", "Cập nhật mật khẩu thành công");
            }
            return back()->with("Fail", "Mật khẩu mới không trùng khớp");
        }
        return back()->with('Fail', 'Mật khẩu cũ không đúng');

    }

    public function exportList(Request $request)
    {
        $users = User::all();
        return (new UsersExport($users))->download('users.xlsx');
    }
}
