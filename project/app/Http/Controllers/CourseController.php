<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use MongoDB\Driver\Session;
use PHPUnit\Exception;
use Symfony\Component\Console\Helper\Table;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $courses = Course::paginate(5);
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->get();
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->get();
        return view('user.admin.course', compact(['courses', 'teachers', 'students']));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $courses = Course::paginate(5, ['*'], 'course');
        $course_schedules = DB::table('course_schedules')->orderBy('start_at')->paginate(10, ['*'], 'schedule');
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->get();
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->get();
        return view('user.admin.course', compact(['courses', 'teachers', 'students', 'course_schedules']));
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
            'duration' => 'required',
            'course_description' => 'required'
        ]);
        DB::table('courses')->insert([
            'teacher_id' => $credentials['teacher'],
            'course_name' => $credentials['course_name'],
            'start_date' => Carbon::parse($credentials['day_start'])->format('Y-m-d'),
            'end_date' => Carbon::parse($credentials['day_end'])->format('Y-m-d'),
            'course_hour' => $credentials['duration'],
            'course_description' => $credentials['course_description'],
            'course_status' => 'Bắt đầu'
        ]);
        return redirect()->back()->with('Success', 'Tạo khóa học thành công');
    }

    public function storeCourseSchedule(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string',
            'start_time' => 'required',
        ]);
        $course_id = Course::query()->name($request)->value('course_id');
        $duration = Course::query()->name($request)->value('course_hour');
        $start_date = Carbon::parse(Course::find($course_id)->start_date)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse(Course::find($course_id)->end_date)->format('Y-m-d H:i:s');
        $input_time = Carbon::parse($request->input('start_time'))->format('Y-m-d H:i:s');
//        dd($input_time . ' ' . $start_date . ' ' . $end_date);
        if ($input_time < $start_date || $input_time > $end_date) {
            return redirect()->back()->with('Fail', 'Giờ nhập vào không được phép');
        }
        while ($input_time < $end_date) {

            DB::table('course_schedules')->insert([
                'course_id' => $course_id,
                'start_at' => $input_time,
                'end_at' => Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addHour($duration),
            ]);
            if ($request->has('auto_create')) {
                $input_time = Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addDay(7);
            } else {
                break;
            }
        }
        return redirect()->back()->with('Success', 'Thêm lịch học thành công');
    }

    public function storeCourseStudent(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string',
            'course_name' => 'required'
        ]);
        $student_id = User::find($validated['student_id']);
        if ($student_id) {
            $course_id = Course::query()->name($request)->value('course_id');
            DB::table('course_students')->insert([
                'student_id' => $student_id->id,
                'course_id' => $course_id
            ]);
            return redirect()->back()->with('Success', 'Thêm học sinh vào lớp thành công');
        }
        return redirect()->back()->with('Fail', 'Mã học sinh không đúng');
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     */
    public function show(Course $course,Request $request)
    {
        $total_period = DB::table('course_schedules')->where('course_id', '=', $course->course_id)->count('course_id');
        $learned_period = DB::table('course_schedules')->where('course_id', '=', $course->course_id)->where('start_at', '<', Carbon::now())->count('course_id');

        $course = Course::find($course->course_id);
        $course_schedule = DB::table('course_schedules')->where('course_id', '=', $course->course_id)->orderByDesc('start_at')->get();
        if(isset($request->schedule_id)){
            $attendances = DB::table('attendances')
                ->join('course_schedules','attendances.schedule_id','=','course_schedules.id')
                ->where('course_schedules.start_at','=',$request->input('schedule_id'))
                ->where('course_schedules.course_id','=',$course->course_id)->paginate(5,['*'],'attendance');
        }else{
            $attendances = DB::table('attendances')
                ->join('course_schedules','attendances.schedule_id','=','course_schedules.id')
                ->where('course_schedules.course_id','=',$course->course_id)->paginate(5,['*'],'attendance');
        }
        $student_count = DB::table('course_students')->where('course_id', '=', $course->course_id)->count();
        $students = DB::table('course_students')
            ->join('courses', 'courses.course_id', '=', 'course_students.course_id')
            ->join('users', 'users.id', '=', 'course_students.student_id')
            ->where('courses.course_id', '=', $course->course_id)
            ->where('users.role', 'like', '%student%')
            ->paginate(5);
        $grades = DB::table('student_grades')
            ->join('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.course_id', '=', $course->course_id)
            ->get();
        return view('user.admin.course_details', compact(['course', 'course_schedule', 'students', 'student_count', 'total_period', 'learned_period','attendances','grades']));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     */
    public function edit(Course $course)
    {
        return view('user.admin.course_edit', compact('course'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();
        $teacher_id = DB::table('users')->where('id', '=', $data['teacher_id'])->where('role', '=', 'teacher')->value('id');
        if ($teacher_id != null) {
            $course->update([
                'course_name' => $data['course_name'],
                'teacher_id' => $teacher_id,
                'start_at' => $data['start_at'],
                'end_at' => $data['end_at'],
                'course_hour' => $data['duration'],
                'course_description' => $data['course_description'],
                'course_status'=>$data['course_status']
            ]);
            return redirect()->route('admin.listCourse')->with('Success', 'Cập nhật thông tin lớp học thành công!');
        }
        return back()->with('Fail', 'Mã giáo viên không đúng!');

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

    public function listCourse(Request $request)
    {
        if ($request->has('last_name')) {
            $students = User::query()->name($request)->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        } else {
            $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(5);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_student', compact('students'));
        } else {
            return (new UsersExport($students))->download('users.xlsx');
        }
    }

}
