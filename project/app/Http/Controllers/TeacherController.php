<?php

namespace App\Http\Controllers;

use App\Models\Course;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $student_count = User::query()->where('role', 'like', '%' . 'student' . '%')->count('id');
        $teacher_count = User::query()->where('role', 'like', '%' . 'teacher' . '%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::query()
            ->where('teacher_id','=',Auth::user()->id)
            ->get();
        $query = DB::table('course_schedules')
            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->where('student_id', '=', Auth::user()->id);
        $course_schedule = $query->get();
        $today_courses = $query->whereDate('start_at', Carbon::today())->get();
        $tomorrow_courses = $query->whereDate('start_at', Carbon::tomorrow())->get();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses']));
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
     * @param  \Illuminate\Http\Request  $request
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
            ->where('teacher_id','=',Auth::user()->id)
            ->name($request)->status($request)->paginate(5);
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->paginate(5);
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        return view('user.admin.list_course', compact(['courses','teachers','students']));
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
     * @param  \Illuminate\Http\Request  $request
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
}
