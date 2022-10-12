<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        Course::query()->where('');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $courses = Course::paginate(5);
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->get();
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->get();
        return view('user.admin.course', compact(['courses', 'teachers', 'students']));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'course_name' => 'required|string',
            'teacher' => 'required|string',
            'day_start' => 'required|date',
            'day_end' => 'required|date',
            'course_description' => 'required'
        ]);
        DB::table('courses')->insert([
            'teacher_id' => $credentials['teacher'],
            'course_name' => $credentials['course_name'],
            'start_date' => Carbon::parse($credentials['day_start'])->format('Y-m-d'),
            'end_date' => Carbon::parse($credentials['day_end'])->format('Y-m-d'),
            'course_description' => $credentials['course_description'],
            'course_status' => 'Bắt đầu'
        ]);
        return redirect()->back()->with('Success', 'Tạo khóa học thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     */
    public function destroy(Course $course)
    {
        DB::table('course_schedules')->where('course_id', '=', $course->course_id)->delete();
        DB::table('course_students')->where('course_id', '=', $course->course_id)->delete();
        Course::query()
            ->where('course_id', '=', $course->course_id)
            ->delete();
        return back()->with('Success', 'Xóa lớp học thành công');
        //
    }
}
