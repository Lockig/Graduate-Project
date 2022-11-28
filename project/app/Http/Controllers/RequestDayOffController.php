<?php

namespace App\Http\Controllers;

use App\Events\ConfirmDayOff;
use App\Events\RequestDayOff;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

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
     */
    public function show()
    {
        $notifications = Auth::user()->unreadNotifications;
        if (Auth::user()->role == 'student') {
            $requests = DB::table('day_off_requests')->where('student_id', '=', Auth::user()->id)->orderBy('id','desc')->paginate(5);
            $accept = DB::table('day_off_requests')
                ->join('course_schedules', 'day_off_requests.schedule_id', '=', 'course_schedules.id')
                ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
                ->where('day_off_requests.student_id', '=', Auth::user()->id)
                ->paginate(5, ['*'], 'stage');

        } else {
            $requests = DB::table('day_off_requests')
                ->join('course_schedules', 'day_off_requests.schedule_id', '=', 'course_schedules.id')
                ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
                ->where('courses.teacher_id', '=', Auth::user()->id)
                ->where('day_off_requests.stage', '=', 'Chờ duyệt')
                ->paginate(5, ['day_off_requests.id', 'day_off_requests.content', 'day_off_requests.schedule_id', 'day_off_requests.student_id', 'day_off_requests.stage'], 'requests');
            $accept = DB::table('day_off_requests')
                ->join('course_schedules', 'day_off_requests.schedule_id', '=', 'course_schedules.id')
                ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
                ->where('courses.teacher_id', '=', Auth::user()->id)
                ->where('day_off_requests.stage', '=', 'Đã duyệt')
                ->orWhere('day_off_requests.stage', '=', 'Từ chối')
                ->paginate(5, ['*'], 'stage');
        }
        return view('user.list_request', compact('requests', 'accept', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Request $request, $id)
    {
        $teacher_id = Auth::user()->id;

        $query = DB::table('day_off_requests')->where('id', '=', $id);
        $student_id = $query->value('student_id');
        $schedule_id = $query->value('schedule_id');
        if ($request->has('accept')) {
            $query->update(['stage' => 'Đã duyệt']);
            DB::table('attendances')->insert([
                'user_id'=>$student_id,
                'schedule_id'=>$schedule_id,
                'time_in'=>Schedule::find($schedule_id)->value('start_at'),
                'penalty_id'=>'5'
            ]);
        } elseif ($request->has('reject')) {
            $query->update(['stage' => 'Từ chối']);
        }
        Event::dispatch( new ConfirmDayOff($teacher_id, $student_id));
        return back()->with('Success', 'Duyệt đơn thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
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

     */
    public function destroy($id)
    {
        DB::table('day_off_requests')->where('id', '=', $id)->update(['stage' => 'Từ chối']);
        return back()->with('Success', 'Đã từ chối đơn xin nghỉ');
        //
    }
}
