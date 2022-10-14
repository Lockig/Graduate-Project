<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('layout.layout');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Student $student
     */
    public function show(Student $student)
    {
        $user = Auth::user();
        return view('user.info', compact('user'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function update(UserUpdateRequest $request)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
