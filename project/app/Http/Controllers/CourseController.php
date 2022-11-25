<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\Random;
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
        $subjects = DB::table('subjects')->get();
        $course_schedules = DB::table('course_schedules')->orderBy('course_id', 'desc')->paginate(10, ['*'], 'schedule');
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->get();
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->get();
        return view('user.admin.course', compact(['courses', 'teachers', 'students', 'course_schedules', 'subjects']));
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
            'money' => 'required|integer',
            'subject' => 'required|string',
            'course_description' => 'required'
        ]);
        DB::table('courses')->insert([
            'teacher_id' => $credentials['teacher'],
            'subject_id' => $credentials['subject'],
            'course_name' => ucwords($credentials['course_name']),
            'start_date' => Carbon::parse($credentials['day_start'])->format('Y-m-d'),
            'end_date' => Carbon::parse($credentials['day_end'])->format('Y-m-d'),
            'course_hour' => $credentials['duration'],
            'money' => $credentials['money'],
            'course_description' => $credentials['course_description'],
            'course_status' => '2'
        ]);
        return redirect()->back()->with('Success', 'Tạo khóa học thành công');
    }

    public function storeCourseSchedule(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required',
            'start_time' => 'required',
            'action' => 'required'
        ]);
        $course_id = $validated['course_id'];
        $duration = Course::find($course_id)->value('course_hour');
        $start_date = Carbon::parse(Course::find($course_id)->start_date)->format('Y-m-d H:i:s');
        $end_date = Carbon::parse(Course::find($course_id)->end_date)->format('Y-m-d H:i:s');
        $input_time = Carbon::parse($request->input('start_time'))->format('Y-m-d H:i:s');
        if ($input_time < $start_date || $input_time > $end_date) {
            return redirect()->back()->with('Fail', 'Giờ nhập vào không được phép');
        }


        while ($input_time < $end_date) {
            if ($request->input('action') == 'weekly') {
                DB::table('course_schedules')->insert([
                    'course_id' => $course_id,
                    'start_at' => $input_time,
                    'end_at' => Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addHour($duration),
                ]);
                $input_time = Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addDay(7);

            }elseif($request->input('action')=='daily'){
                DB::table('course_schedules')->insert([
                    'course_id' => $course_id,
                    'start_at' => $input_time,
                    'end_at' => Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addHour($duration),
                ]);
                $input_time = Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addWeekday();
            }else{
                break;
            }
        }

        if($request->input('action')=='manually'){
            DB::table('course_schedules')->insert([
                'course_id' => $course_id,
                'start_at' => $input_time,
                'end_at' => Carbon::createFromFormat('Y-m-d H:i:s', $input_time)->addHour($duration),
            ]);
        }

        return redirect()->back()
            ->with('Success', 'Thêm lịch học thành công');
    }

    public function storeCourseStudent(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|string',
            'course_id' => 'required'
        ], [
            'student_id.required' => 'Vui lòng nhập mã ID học sinh',
            'course_name.required' => 'Vui lòng nhập tên lớp học'
        ]);
        $course_id = Course::query()->where('course_name','like','%'.$request->course_id.'%')->value('course_id');
        $student_id = User::find($validated['student_id']);
        if ($student_id && $course_id) {
            DB::table('course_students')->insert([
                'student_id' => $student_id->id,
                'course_id' => $course_id
            ]);
            return redirect()->back()->with('Success', 'Thêm học sinh vào lớp thành công');
        }
        return redirect()->back()->with('Fail', 'Thông tin điền vào không đúng');
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     */
    public function show(Course $course, Request $request)
    {
        $total_period = DB::table('course_schedules')->where('course_id', '=', $course->course_id)->count('course_id');
        $learned_period = DB::table('course_schedules')->where('course_id', '=', $course->course_id)->where('start_at', '<', Carbon::now())->count('course_id');

        $course = Course::find($course->course_id);
        $course_schedule = DB::table('course_schedules')
            ->join('courses', 'courses.course_id', '=', 'course_schedules.course_id')
            ->where('courses.course_status', '=', '2')
            ->where('course_schedules.course_id', '=', $course->course_id)->orderByDesc('start_at')->get();
        if (isset($request->schedule_id)) {
            $attendances = DB::table('attendances')
                ->join('course_schedules', 'attendances.schedule_id', '=', 'course_schedules.id')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('course_schedules.start_at', '=', $request->input('schedule_id'))
                ->where('users.role', '=', 'student')
                ->where('users.deleted_at', '=', null)
                ->where('course_schedules.course_id', '=', $course->course_id)->paginate(5, ['*'], 'attendance');
        } else {
            $attendances = DB::table('attendances')
                ->join('course_schedules', 'attendances.schedule_id', '=', 'course_schedules.id')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->where('users.role', '=', 'student')
                ->where('users.deleted_at', '=', null)
                ->where('course_schedules.course_id', '=', $course->course_id)->paginate(5, ['*'], 'attendance');
        }
        $student_count = DB::table('course_students')->where('course_id', '=', $course->course_id)->count();

        $students = DB::table('users')
            ->leftJoin('course_students', 'course_students.student_id', '=', 'users.id')
            ->join('courses', 'course_students.course_id', '=', 'courses.course_id')
            ->where('course_students.course_id', '=', $course->course_id)
            ->where('users.role', 'like', '%student%')
            ->where('users.deleted_at', '=', null)
            ->paginate(5);
        $grades = DB::table('student_grades')
            ->join('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.course_id', '=', $course->course_id)
            ->get();
        $course_notifications = DB::table('course_notifications')->where('course_id', '=', $course->course_id)->orderBy('created_at', 'desc')->paginate(5);

        $notifications = Auth::user()->unreadNotifications;
        $materials = DB::table('course_materials')->select()->where('course_id', '=', $course->course_id)->get();
        return view('user.admin.course_details', compact([
            'course',
            'course_schedule',
            'students',
            'student_count',
            'total_period',
            'learned_period',
            'attendances',
            'grades',
            'course_notifications',
            'materials',
            'notifications'
        ]));
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
            DB::table('courses')->where('course_id', '=', $course->course_id)->update([
                'course_name' => $data['course_name'],
                'teacher_id' => $teacher_id,
                'start_date' => Carbon::parse($data['start_at'])->format('Y-m-d'),
                'end_date' => Carbon::parse($data['end_at'])->format('Y-m-d'),
                'course_hour' => $data['duration'],
                'course_description' => $data['course_description'],
                'course_status' => $data['course_status']
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

    public function createMaterial($course)
    {
        return view('user.course_material_create', compact('course'));
    }

    public function storeMaterial($course, Request $request)
    {
        $validated = $request->validate([
            'header' => 'required|string',
            'description' => 'required|string',

        ], [
            'header.required' => 'Vui lòng nhập tiêu đề',
            'content.required' => 'Vui lòng nhập nội dung'
        ]);

        $file_names = [];
        if ($request->has('file_upload')) {
            $files = $request->file_upload;
            foreach ($files as $file) {
                $extension = $file->extension();
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('uploads'), $file_name);
                $file_names[] = [
                    'file' => $file_name,
                ];
            }
        }
        $file_store = json_encode($file_names);
        DB::transaction(function () use ($course, $validated, $file_store) {
            DB::table('course_materials')->insert([
                'course_id' => $course,
                'header' => $validated['header'],
                'description' => $validated['description'],
                'file' => $file_store
            ]);
        }, '1');

        return to_route('users.coursesDetails', $course)->with('Success', 'Tạo tài liệu thành công');
//        return view('user.course_material_create', compact('course'));
    }

    public function destroyMaterial($course, $id)
    {
        DB::table('course_materials')->where('course_id', '=', $course)
            ->where('id', '=', $id)
            ->delete();
        return back()->with('Success', 'Xóa tài liệu thành công');
    }

    public function editMaterial($course, $id)
    {
        return view('user.course_material_create', compact('course', 'id'));
    }
}
