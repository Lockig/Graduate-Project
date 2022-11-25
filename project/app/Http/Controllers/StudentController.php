<?php

namespace App\Http\Controllers;

use App\Events\ConfirmDayOff;
use App\Exports\UsersExport;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        if ($request->has('last_name')) {
            $students = User::query()->name($request)->where('role', 'like', '%' . 'student' . '%')->paginate(10);
        } else {
            $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(10);
        }
        if (!$request->has('export')) {
            $request->flashOnly('last_name');
            return view('user.admin.list_student', compact('students'));
        } else {
//            return (new UsersExport($students))->download('users.xlsx');
            return Excel::download(new UsersExport($students), 'student_list.xlsx');
        }
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

    public function listCourse(Request $request)
    {
        if ($request->input('course_name') != null) {
            $courses = DB::table('courses')
                ->join('course_students', 'course_students.course_id', '=', 'courses.course_id')
                ->where('student_id', '=', Auth::user()->id)
                ->where('courses.course_name', 'like', '%' . $request->course_name . '%')->paginate(5);
        } else {
            $courses = DB::table('courses')
                ->join('course_students', 'course_students.course_id', '=', 'courses.course_id')
                ->where('student_id', '=', Auth::user()->id)->paginate(5);
        }
        return view('user.admin.list_course', compact('courses'));
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
     */
    public function destroy(Student $student)
    {
        //
    }

    public function listStudent(Request $request)
    {

        if ($request->has('last_name')) {
            $students = User::query()
                ->select('id', 'first_name', 'last_name', 'date_of_birth', 'email', 'mobile_number','avatar')
                ->where('role', 'like', '%' . 'student' . '%')
                ->orWhere('id','=',$request->input('last_name'))
                ->name($request)
                ->paginate(20);
        } else {
            $students = User::query()
                ->select('id', 'first_name', 'last_name', 'date_of_birth', 'email', 'mobile_number','avatar')
                ->where('role', 'like', '%' . 'student' . '%')->paginate(10);
        }
        if (!$request->has('export')) {

            return view('user.admin.list_student', compact('students'));
        } else {
            return Excel::download(new UsersExport($students), 'student_list.xlsx');
        }
    }


}


