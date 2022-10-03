<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Events\RequestDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Account;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.list_employee', compact('users'));
        //
    }

    public function create()
    {
        $positions = Position::all();
        return view('user.create', compact('positions'));
    }

    public function store(UserCreateRequest $request)
    {
        $credentials = $request->validated();
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $date = Carbon::createFromFormat('m/d/Y', $credentials['date_of_birth'])->format('Y-m-d');
        $position_id = Position::query()->name($credentials['positions'])->value('position_id');

        DB::table('users')->insert([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'date_of_birth' => $date,
            'email' => $credentials['email'],
            'mobile_number' => $credentials['mobile_number'],
            'avatar' => $profile_avatar ?? null,
            'position_id' => $position_id
        ]);

        $user_id = User::query()->email($request)->value('user_id');
        $password = Random::generate(8);
        DB::table('accounts')->insert([
            'user_id' => $user_id,
            'role_id' => 2,
            'password' => Hash::make($password)
        ]);

        $user = User::find($user_id);

        event(new CreateUser($user, $password));
        Cache::put('command', 'register');
        Cache::put('user_id', $user_id);
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

    public function updateInfo(UserUpdateRequest $request,$id)
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
        $users = User::all();
        return (new UsersExport($users))->download('users.xlsx');
    }

    public function settings(){
        return view('user.admin.settings');
    }
}
