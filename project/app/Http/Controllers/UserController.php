<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class UserController extends Controller implements ShouldQueue
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.admin.list_employee', compact(['users']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
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
//        try{
            $credentials = $request->validated();
            if($credentials['profile_avatar']){
                $profile_avatar = $request->file('profile_avatar')->store('public');
            }
            $date = Carbon::createFromFormat('m/d/Y', $credentials['date_of_birth'])->format('Y-m-d');

            DB::table('users')->insert([
                'first_name' => $credentials['first_name'],
                'last_name' => $credentials['last_name'],
                'date_of_birth' => $date,
                'email' => $credentials['email'],
                'mobile_number' => $credentials['mobile_number'],
                'avatar' => $profile_avatar ?? null
            ]);

            $user_id = User::query()
                ->select('user_id')
                ->email($request)
                ->pluck('user_id')->get('0');

            DB::table('accounts')->insert([
                'user_id'=>$user_id,
                'role_id'=>2,
                'password'=>Random::generate(5)
            ]);

            $user = User::find($user_id);
            event(new CreateUser($user));
            return redirect()->back()->with('Success', 'Create user successfully');
//        }
//        catch (Exception $error){
//            return redirect()->back()->with('Fail',$error->getMessage());
//        }

        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function export(){
        return Excel::downlaod(new ExportFile,'users.xlsx');
    }
}
