<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Account;
use App\Models\User;
use App\Notifications\RequestDayOff;
use App\Notifications\RequestDayOffNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\Random;

class UserController extends Controller implements ShouldQueue
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->account->role->role_id;;
        $users = User::all();
        if ($role == 1) {
            return view('user.admin.list_employee', compact(['user', 'role', 'users']));
        }
        return view('user.index', compact('user'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('user.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
            'fingerprint' => '0'

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
        return redirect()->back()->with('Success', 'Create user successfully, tell user to check email for password');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     */
    public function show(User $user)
    {
        return view('user.index', compact('user'));
        //
    }

    public function showAttendance()
    {
        return view('user.attendance');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     */
    public function edit(User $user)
    {
        return view('user.password');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->user_id;
        dd($user_id);
        User::find($user_id)->update([]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user && $user->account->role != 1){
            User::destroy($id);
        }
        return back()->with("Error", "Something wrong");
        //
    }


    public function info(Request $request)
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function updateInfo(UserCreateRequest $request)
    {
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        $user = Auth::user();
        $user_id = Auth::user()->user_id;
        User::find($user_id)->update([
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
        $user = User::find($id);
        event(new RequestDayOffNotification($user));
        return back()->with('Success', 'Tạo đơn xin nghỉ thành công');
    }

    public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'password_confirmation' => 'required|string'
        ]);
        $user_id = User::find($id);
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
        return (new UsersExport)->download('users.xlsx');
    }
}
