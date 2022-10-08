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
        $user = Auth::user();
        $role = $user->account->role->role_id;
        $users = User::query()->name($request)->paginate(5);
        $courses = DB::table('courses')
            ->join('course_accounts','courses.course_id','=','course_accounts.course_id')
            ->where('account_id','=',$user->account->account_id)
            ->get();
        return view('user.dashboard', compact(['user', 'role', 'users','courses']));
    }

    public function show(User $user)
    {
        return view('user.index', compact('user'));
    }

    public function showAttendance(Request $request)
    {
        $user = Auth::user();
        if ($request->input('request_date') == '') {
            $logs = DB::table('logs')
                ->select('*')
                ->where('user_id', '=', $user->user_id)
                ->paginate(5);
        } else {
            $logs = DB::table('logs')
                ->select('*')
                ->where('user_id', '=', $user->user_id)
                ->where('date', '=', $request->input('request_date'))
                ->orderByDesc('date')
                ->orderBy('time_in')
                ->paginate(5);
        }
        $start_time = DB::table('check_times')->select('time_in')->where('id', '=', 1)->value('time_in');
        $end_time = DB::table('check_times')->select('time_out')->where('id', '=', 1)->value('time_out');
        return view('user.attendance', compact(['user', 'logs', 'start_time', 'end_time']));
    }

    public function editPassword()
    {
        $user = Auth::user();
        return view('user.password', compact('user'));
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
        return view('user.info', compact('user'));
    }

    public function editInfo(Request $request)
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function updateInfo(UserUpdateRequest $request)
    {
        $user = Auth::user();
        if ($request->has('profile_avatar')) {
            if($user->avatar != ""){
                Storage::delete($user->avatar);
            }
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        User::find($user->user_id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return back()->with("Success", "Cập nhật thông tin thành công");
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
        if (Hash::check($validated['current_password'], $password)) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = Account::query()
                    ->where('user_id', $user->user_id)
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
}
