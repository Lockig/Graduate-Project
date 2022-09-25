<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Models\Account;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::query()->paginate(1);
        return view('user.admin.list_employee',compact('users'));
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
        $date = Carbon::createFromFormat('m/d/Y', $credentials['date_of_birth'])->format('Y-m-d');

        DB::table('users')->insert([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'date_of_birth' => $date,
            'email' => $credentials['email'],
            'mobile_number' => $credentials['mobile_number'],
            'avatar' => $profile_avatar ?? null,
            'position_id' => '1'
        ]);

        $user_id = User::query()
            ->select('user_id')
            ->email($request)
            ->value('user_id');
        DB::table('accounts')->insert([
            'user_id' => $user_id,
            'role_id' => 2,
            'password' => Random::generate(5)
        ]);

        $user = User::find($user_id);

        event(new CreateUser($user));
        Cache::put(['command', 'user_id'], ['register', $user_id]);
        return redirect()->back()->with('Success', 'Tạo tài khoản thành công, kiểm tra hòm thư để nhận mật khẩu');
    }

    public function show(User $user)
    {
        return view('user.index', compact('user'));
        //
    }

    public function showAttendance($id)
    {
        $user = User::find($id);
        $logs = DB::table('daily_logs')
            ->where('user_id', '=', $user->user_id)
            ->get();
        return view('user.attendance', compact(['user', 'logs']));
    }

    public function edit(User $user, Request $request)
    {
        $users = User::find($request->id);
        return view('user.password', compact('users'));
        //
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
        if ( $user->account->role != 1) {
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
        return back()->with("Success", "Update personal information successfully");
    }

    public function dayOffForm()
    {
        return view('user.form');
    }

    public function storeDayOffForm(Request $request, $id)
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

    public function updatePassword(Request $request, $id)
    {
        $user_id = Auth::user()->user_id;
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $password = $user_id->account->password;
        if ($password == $validated['current_password']) {
            if ($validated['new_password'] == $validated['password_confirmation']) {
                $update = Account::query()
                    ->where('user_id', $id)
                    ->update(['password' => $validated['password_confirmation']]);
                return back()->with("Success", "Update password successfully");
            }
        }
        return back()->with('Fail', 'Wrong current password');

    }

    public function exportList(Request $request)
    {
        $users = User::all();
        return (new UsersExport($users))->download('users.xlsx');
    }
}