<?php

namespace App\Http\Controllers;

use App\Events\RequestDayOff;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestDayOffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_requests = DB::table('day_off_requests')
            ->where('stage', 'like', '%' . 'Chờ duyệt' . '%')
            ->paginate(5);
        return view('user.admin.settings', compact('list_requests'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $list = DB::table('day_off_requests')
            ->where('user_id', '=', Auth::user()->user_id)
            ->paginate(5);
        return view('user.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'content' => 'required|string',
            'day_start' => 'required|date',
            'day_end' => 'required|date'
        ]);

        DB::table('day_off_requests')->insert([
            'user_id' => $user->user_id,
            'day_start' => Carbon::parse($validated['day_start'])->format('Y-m-d'),
            'day_end' => Carbon::parse($validated['day_end'])->format('Y-m-d'),
            'content' => $validated['content'],
            'stage' => 'Chờ duyệt'
        ]);
        RequestDayOff::dispatch($user);
        return back()->with('Success', 'Tạo đơn xin nghỉ thành công');
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
    public function update(Request $request, $id)
    {
        DB::table('day_off_requests')->where('id', '=', $id)->update(['stage' => 'Đã duyệt']);
        return back()->with('Success', 'Đã duyệt đơn xin nghỉ');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('day_off_requests')->where('id', '=', $id)->update(['stage' => 'Từ chối']);
        return back()->with('Success', 'Đã từ chối đơn xin nghỉ');
        //
    }
}
