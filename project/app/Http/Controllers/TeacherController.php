<?php

namespace App\Http\Controllers;

use App\Events\CreateClassNotification;
use App\Exports\ListMarkExport;
use App\Exports\UsersExport;
use App\Models\Course;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Maatwebsite\Excel\Facades\Excel;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $notifications = Auth::user()->notifications()->paginate(5);
        $student_count = User::query()->where('role', 'like', '%' . 'student' . '%')->count('id');
        $teacher_count = User::query()->where('role', 'like', '%' . 'teacher' . '%')->count('id');
        $course_count = Course::query()->count('course_id');
        $courses = Course::query()
            ->where('teacher_id', '=', Auth::user()->id)
            ->get();
        $course_schedule = DB::table('course_schedules')
            ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
            ->where('courses.teacher_id', '=', Auth::user()->id)->get();
        $today_courses = DB::table('course_schedules')
            ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
            ->where('courses.teacher_id', '=', Auth::user()->id)
            ->whereDate('start_at', Carbon::today())
            ->get();
        $tomorrow_courses = DB::table('course_schedules')
            ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
            ->where('courses.teacher_id', '=', Auth::user()->id)
            ->whereDate('start_at', Carbon::tomorrow())
            ->get();
        $users = User::query()->name($request)->paginate(5);

        return view('user.admin.dashboard', compact(['courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses', 'notifications']));
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
            $teachers = User::query()->name($request)
                ->select('id', 'first_name', 'last_name', 'date_of_birth', 'email', 'mobile_number','avatar')
                ->where('role', '=', 'teacher')->paginate(5);
        } else {
            $teachers = User::query()
                ->select('id', 'first_name', 'last_name', 'date_of_birth', 'email', 'mobile_number','avatar')
                ->where('role', '=', 'teacher')->paginate(5);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_teacher', compact('teachers'));
        } else {
            return Excel::download(new UsersExport($teachers), 'teacher_list.xlsx');
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



    public function createMark($course)
    {
        $students = DB::table('course_students')
            ->leftJoin('users', 'users.id', '=', 'course_students.student_id')
            ->where('course_id', '=', $course)
            ->where('users.role','=','student')
            ->where('users.deleted_at','=',null)
            ->get();
        $grades = DB::table('student_grades')
            ->join('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.course_id', '=', $course)
            ->get();
        return view('user.mark', compact('grades', 'students', 'course'));
    }

    public function storeMark($course, Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'diem_lan_1' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'diem_lan_2' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'diem_lan_3' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $id = DB::table('course_students')->where('course_id', '=', $course)
            ->where('student_id', '=', $validated['student_id'])->value('id');
        $check = DB::table('student_grades')->where('user_id', '=', $id)->value('user_id');
        if ($check == null) {
            DB::table('student_grades')->insert([
                'user_id' => $id,
                'diem_lan_1' => $validated['diem_lan_1'],
                'diem_lan_2' => $validated['diem_lan_2'],
                'diem_lan_3' => $validated['diem_lan_3']
            ]);
            return back()->with('Success', 'Cập nhập điểm thành công');
        } else {
            return back()->with('Warning', 'Người dùng đã có điểm, không được thêm mới, chỉ được chỉnh sửa');
        }

    }

    public function editMark($course_id, $student_id)
    {
        $course = $course_id;
        $students = DB::table('course_students')
            ->leftJoin('users', 'users.id', '=', 'course_students.student_id')
            ->where('course_id', '=', $course)->get();
        return view('user.mark', compact('course_id', 'student_id', 'course', 'students'));
    }

    public function destroyMark($course, $student_id)
    {
        $id = DB::table('course_students')
            ->where('course_id', '=', $course)
            ->where('student_id', '=', $student_id)
            ->value('id');
        DB::table('student_grades')->where('user_id', '=', $id)
            ->delete();
        return back()->with('Success', 'Xóa điểm thành công');
    }

    //export to pdf
    public function listMark($course, Request $request)
    {
        $grades = DB::table('student_grades')
            ->leftJoin('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.course_id', '=', $course)
            ->get(['student_id', 'diem_lan_1', 'diem_lan_2', 'diem_lan_3']);
        $students = DB::table('course_students')->where('course_id', '=', $course)->get();
        if ($request->has('pdf')) {
            $pdf = Pdf::loadView('user.export.list_mark', compact('students', 'course'));
            return $pdf->download('list_mark.pdf');
        }
        if ($request->has('excel')) {
            return Excel::download(new ListMarkExport($grades), 'list_mark.xlsx');
        }
//        dd($students);
    }

    public function createNotification($id, Request $request)
    {
        $content = $request->input('content');
        DB::table('course_notifications')->insert([
            'course_id' => $id,
            'content' => $content,
            'created_at'=>Carbon::now()
        ]);
        $students = User::query()
            ->join('course_students', 'course_students.student_id', '=', 'users.id')
            ->where('course_id', '=', $id)->get();
//        $students = DB::table('course_students')->where('course_id', '=', $id)->get();
        $teacher = Auth::user();
        Event::dispatch(new CreateClassNotification($students, $teacher, $content));
        return back()->with('Success', 'Tạo thông báo thành công');
    }

    public function exportUserCourse(Request $request,$course,$id){
        $grade = DB::table('student_grades')
            ->join('course_students', 'course_students.id', '=', 'student_grades.user_id')
            ->where('course_students.student_id','=',$id)
            ->where('course_students.course_id', '=', $course)
            ->get();
        $total_period = DB::table('course_schedules')->where('course_id', '=', $course)->count('course_id');
        $learned_period = DB::table('course_schedules')->where('course_id', '=', $course)->where('start_at', '<', Carbon::now())->count('course_id');
        $attendances = DB::table('attendances')
            ->join('course_schedules','attendances.schedule_id','=','course_schedules.id')
            ->join('users','users.id','=','attendances.user_id')
            ->where('users.deleted_at','=',null)
            ->where('attendances.user_id','=',$id)
            ->where('course_schedules.course_id','=',$course)
            ->count('time_in');
        $pdf = Pdf::loadView('user.export.user_course_information',compact('id','course','grade','total_period','attendances'));
            return $pdf->download('user_course_information.pdf');
    }
    public function updateMark($course,$id,Request $request){

        $user_id = DB::table('course_students')->where('course_id','=',$course)->where('student_id','=',$id)->value('id');
        DB::table('student_grades')
            ->where('user_id','=',$user_id)
            ->update([
                'diem_lan_1'=>$request->diem_lan_1,
                'diem_lan_2'=>$request->diem_lan_2,
                'diem_lan_3'=>$request->diem_lan_3
            ]);
        return back()->with('Success','Cập nhật điểm thành công');
    }
}
