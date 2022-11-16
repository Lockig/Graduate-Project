<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $courses = Course::query()
            ->join('course_students', 'courses.course_id', '=', 'course_students.course_id')
            ->where('course_students.student_id', '=', $user->id)
            ->get();
        if ($request->has('course_name')) {
            $records = DB::table('attendances')
                ->join('course_schedules', 'course_schedules.id', '=', 'attendances.schedule_id')
                ->where('course_schedules.course_id', '=', $request->input('course_name'))
                ->where('user_id', '=', $user->id)->orderBy('time_in', 'desc')->paginate(5);
        } else {
            $records = DB::table('attendances')->where('user_id', '=', $user->id)->orderBy('time_in', 'desc')->paginate(5);
        }
        return view('user.attendance', compact('records', 'user', 'courses'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create($id)
    {
        $course_schedule = DB::table('course_schedules')->where('course_id', '=', $id)->get();
        $students = DB::table('course_students')
            ->join('users','users.id','=','course_students.student_id')
            ->where('users.deleted_at','=',null)
            ->where('users.role','=','student')
            ->where('course_id', '=', $id)->orderBy('student_id')->get();
        return view('user.attendance_create', compact('course_schedule', 'students', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request, $id)
    {

        $query = DB::table('course_schedules')
            ->where('course_id', '=', $id)
            ->where('start_at', '=', Carbon::parse($request->schedule)->format('Y-m-d H:i:s'));
        $time_in = Carbon::parse($request->time_in)->format('Y-m-d H:i:s');
        if ($time_in > $query->value('start_at') && $time_in < $query->value('end_at')) {
            DB::table('attendances')->insert([
                'schedule_id' => $query->value('id'),
                'user_id' => $request->user_id,
                'time_in' => Carbon::parse($request->time_in)->format('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('Success', 'Điểm danh cho học sinh thành công!');
        } else {
            return redirect()->back()->with('Fail', 'Thời gian nhập vào không đúng!');
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($course,Request $request)
    {
        if($request->input('schedule_id')){
            $records = DB::table('attendances')
                ->where('schedule_id','=',$request->input('schedule_id'))
                ->get();
        }
        else{
            $records = DB::table('attendances')
                ->where('schedule_id','=',$request->input('schedule_id'))
                ->get();
        }
        return redirect()->back(compact('records'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
