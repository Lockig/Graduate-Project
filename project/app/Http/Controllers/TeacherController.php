<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\Course;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $notifications = Auth::user()->unreadNotifications;
        $student_count = User::query()->where('role', 'like', '%' . 'student' . '%')->count('id');
        $teacher_count = User::query()->where('role', 'like', '%' . 'teacher' . '%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::query()
            ->where('teacher_id', '=', Auth::user()->id)
            ->get();
        $query = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id);
        $course_schedule = $query->get();
        $today_courses = $query->whereDate('start_at', Carbon::today())->get();
        $tomorrow_courses = $query->whereDate('start_at', Carbon::tomorrow())->get();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses','notifications']));
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
     */
    public function show(Request $request)
    {
        $courses = Course::query()
            ->where('teacher_id', '=', Auth::user()->id)
            ->name($request)->status($request)->paginate(5);
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->paginate(5);
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        return view('user.admin.list_course', compact(['courses', 'teachers', 'students']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function listTeacher(Request $request)
    {
        if ($request->has('last_name')) {
            $teachers = User::query()->name($request)->where('role', '=' , 'teacher')->paginate(5);
        } else {
            $teachers = User::query()->where('role',  '=' , 'teacher')->paginate(5);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_teacher', compact('teachers'));
        } else {
            return Excel::download(new UsersExport($teachers),'teacher_list.xlsx');
        }
    }

    public function showAttendance(Request $request)
    {
        $user = Auth::user();
        $courses = Course::query()
            ->where('teacher_id', '=', $user->id)->get();
        if (!$request->has('course_name')) {
            $records = DB::table('attendances')
                ->where('user_id', '=', $user->id)->orderBy('time_in', 'asc')->paginate(5);
        } else {
            $records = DB::table('attendances')
                ->join('course_schedules', 'course_schedules.id', '=', 'attendances.schedule_id')
                ->where('course_schedules.course_id', '=', $request->course_name)
                ->where('user_id', '=', $user->id)
                ->orderBy('time_in', 'desc')->paginate(5);
        }
        return view('user.attendance', compact('records', 'user', 'courses'));
    }

    public function createAttendance($id)
    {
        $course_schedule = DB::table('course_schedules')->where('course_id', '=', $id)->get();
        $students = DB::table('course_students')->where('course_id', '=', $id)->orderBy('student_id')->get();
        return view('user.attendance_create', compact('course_schedule', 'students', 'id'));
    }

    public function storeAttendance(Request $request, $id)
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
}
