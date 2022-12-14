<?php

namespace App\Http\Controllers;

use App\Events\ResetPassword;
use App\Events\RequestDayOff;
use App\Exports\CourseExport;
use App\Exports\UsersExport;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use App\Notifications\UpdatePaymentNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\Random;

class AdminController extends Controller
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

        $tomorrow_courses = DB::table('course_schedules')
            ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
            ->where('courses.course_status', '=', '2')
            ->whereDate('start_at', Carbon::tomorrow())->get();
        $today_courses = DB::table('course_schedules')
            ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
            ->where('courses.course_status', '=', '2')
            ->whereDate('start_at', Carbon::today())->get();
        $courses = Course::all();
        $course_schedule = DB::table('course_schedules')
//            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
            ->get();
        $users = User::query()->name($request)->paginate(5);
        return view('user.admin.dashboard', compact(['notifications', 'courses', 'users', 'student_count', 'teacher_count', 'course_count', 'course_schedule', 'today_courses', 'tomorrow_courses']));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserCreateRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $password = Random::generate(8);
        $date = Carbon::createFromFormat('m/d/Y', $credentials['date_of_birth'])->format('Y-m-d');
        $id = DB::table('users')->insertGetId([
            'first_name' => $credentials['first_name'],
            'last_name' => $credentials['last_name'],
            'date_of_birth' => $date,
            'email' => $credentials['email'],
            'mobile_number' => $credentials['mobile_number'],
            'avatar' => $profile_avatar ?? null,
            'password' => Hash::make($password),
            'address' => $credentials['address'] ?? '',
            'role' => $credentials['role'],
            'fingerprint' => '0'
        ]);


        $user_id = User::query()->email($request)->value('id');

        $user = User::find($user_id);

        event(new ResetPassword($user, $password));
        Cache::put('command', 'register');
        Cache::put('user_id', $user_id);
        if (User::find($id)->role == 'student') {
            return redirect()->route('admin.listStudent')->with('Success', 'T???o t??i kho???n th??nh c??ng, ki???m tra h??m th?? ????? nh???n m???t kh???u');
        } else
            return redirect()->route('admin.listTeacher')->with('Success', 'T???o t??i kho???n th??nh c??ng, ki???m tra h??m th?? ????? nh???n m???t kh???u');
    }

    public function show(Request $request)
    {
        if ($request->has('pdf')) {
            $pdf = Pdf::loadView('user.export.export');
            return $pdf->download('list.pdf');
        }
        if ($request->has('export')) {
            $courses = Course::query()
                ->join('users', 'users.id', '=', 'courses.teacher_id')
                ->select('course_name', 'users.first_name', 'users.last_name', 'start_date', 'end_date', 'course_hour', 'course_description')
                ->name($request)
                ->orderBy('course_status','asc')
                ->paginate(10);
            $request->flashOnly('course_name');
            return Excel::download(new CourseExport($courses), 'course.xlsx');
        } else {
            $courses = Course::query()->name($request)->orderBy('course_status','asc')
                ->paginate(10);
        }
        $teachers = User::query()->where('role', 'like', '%' . 'teacher' . '%')->paginate(10);
        $students = User::query()->where('role', 'like', '%' . 'student' . '%')->paginate(10);
        $subjects = DB::table('subjects')->get();
        return view('user.admin.list_course', compact(['courses', 'teachers', 'students', 'subjects']));
    }

    public function showAttendance($id)
    {
        $user = User::find($id);
        $logs = DB::table('daily_logs')
            ->where('user_id', '=', $user->user_id)
            ->paginate(5);
        return view('user.attendance', compact(['user', 'logs']));
    }

    public function edit(User $user, Request $request)
    {
        $users = User::find($request->id);
        return view('user.password', compact('users'));
        //
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->account->role->role_id != 1) {
            Cache::put('command', 'delete');
            Cache::put('user_id', $id);
            User::destroy($id);
            return back()->with("Success", "X??a ng?????i d??ng th??nh c??ng");
        }
        return back()->with("Error", "C?? l???i x???y ra");
        //
    }


    public function info(Request $request)
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function updateInfo(UserUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);
        if ($request->hasFile('profile_avatar')) {
            $profile_avatar = $request->file('profile_avatar')->store('images');
        }
        $validated = $request->validated();
        User::find($user->user_id)->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'date_of_birth' => Carbon::parse($validated['date_of_birth'])->format('Y-m-d'),
            'mobile_number' => $validated['mobile_number'],
            'email' => $validated['email'],
            'avatar' => $profile_avatar ?? $user->avatar
        ]);
        return back()->with("Success", "Update personal information successfully");
    }


    public function storeDayOffForm(Request $request, $id): RedirectResponse
    {
        $user = User::find($id);
        $validated = $request->validate([
            'content' => 'required|string',
            'day_start' => 'required|date',
            'day_end' => 'required|date'
        ]);

        DB::table('day_off_requests')->insert([
            'user_id' => $id,
            'day_start' => Carbon::parse($validated['day_start'])->format('Y-m-d'),
            'day_end' => Carbon::parse($validated['day_end'])->format('Y-m-d'),
            'content' => $validated['content'],
        ]);
        RequestDayOff::dispatch($user);
        return back()->with('Success', 'T???o ????n xin ngh??? th??nh c??ng');
    }

    public function exportList(Request $request)
    {
        return (new UsersExport($request))->download('users.xlsx');
    }

    public function settings()
    {
        $list_requests = User::all();
//        $list_requests = DB::table('day_off_requests')
//            ->where('stage', 'like', '%' . 'Ch??? duy???t' . '%')
//            ->paginate(5);
        $fingerprints = User::query()->paginate(10, ['*'], 'fingerprint');
        return view('user.admin.settings', compact('list_requests', 'fingerprints'));
    }

    public function timeSetting(Request $request)
    {
        DB::table('check_times')->update([
            'time_in' => $request->time_start,
            'time_out' => $request->time_end
        ]);
        return back()->with('Success', 'C??i ?????t th???i gian th??nh c??ng');
    }

    public function destroyUser($course, $student)
    {
        DB::transaction(function () use ($course, $student) {
            $query = DB::table('course_students')->where('student_id', '=', $student)
                ->where('course_id', '=', $course)
                ->get();
            DB::table('attendances')
                ->join('course_schedules', 'course_schedules.id', '=', 'attendances.schedule_id')
                ->join('courses', 'course_schedules.course_id', '=', 'courses.course_id')
                ->where('courses.course_id', '=', $course)
                ->where('attendances.user_id', '=', $student)
                ->delete();
            DB::table('student_grades')->where('user_id', '=', $query->value('id'))->delete();
            DB::table('course_students')->where('id', '=', $query->value('id'))->delete();
        }, 5);
        return back()->with('Success', 'X??a h???c sinh kh???i l???p th??nh c??ng');
    }


    public function getSalary(Request $request)
    {
        $uncheck_attendances = DB::table('attendances')
            ->join('course_schedules', 'course_schedules.id', '=', 'attendances.schedule_id')
            ->join('users', 'users.id', '=', 'attendances.user_id')
            ->join('courses', 'courses.course_id', '=', 'course_schedules.course_id')
            ->where('users.role', '=', 'teacher')
            ->where('status', '=', '0')
            ->orderBy('time_in', 'asc')
            ->get(['attendances.id', 'courses.teacher_id', 'users.first_name', 'users.last_name', 'courses.course_id', 'courses.course_name', 'attendances.time_in', 'courses.money', 'attendances.penalty_id']);
        $test = [];
        if ($request->input('month') != NULL) {
            $all = DB::table('attendances')
                ->join('users', 'users.id', '=', 'attendances.user_id')
                ->join('course_schedules', 'course_schedules.id', '=', 'attendances.schedule_id')
                ->join('courses', 'courses.course_id', '=', 'course_schedules.course_id')
                ->join('penalties', 'penalties.penalty_id', '=', 'attendances.penalty_id')
                ->whereMonth('attendances.time_in', Carbon::parse($request->input('month'))->format('m'))
                ->whereYear('attendances.time_in', Carbon::parse($request->input('month'))->format('Y'))
                ->where('status', '=', '1')
                ->get();
//            dd($all);
            foreach ($all as $value) {
                $test[$value->user_id][] = $value;
            }
        }
        return view('user.admin.teacher_salary', compact('uncheck_attendances', 'test'));
    }

    public function updateSalary(Request $request)
    {
        if ($request->has('check')) {
            DB::transaction(function () use ($request) {
                foreach ($request->input('check') as $item) {
                    DB::table('attendances')->where('id', '=', $item)->update([
                        'status' => '1'
                    ]);

                    $teacher = User::find(DB::table('attendances')->where('id', '=', $item)->value('user_id'));
                    \Illuminate\Support\Facades\Notification::send($teacher, new UpdatePaymentNotification());
                }
            });
            return back()->with('Success', 'Duy???t t???t c??? th??nh c??ng!');
        }
        if ($request->has('decline')) {
            DB::transaction(function () use ($request) {
                DB::table('attendances')->where('id', '=', $request->input('decline'))->update(['status' => '3']);
            });
            return back()->with('Success', 'T??? ch???i th??nh c??ng');
        }
        if ($request->has('accept')) {
            DB::transaction(function () use ($request) {
                DB::table('attendances')->where('id', '=', $request->input('accept'))->update(['status' => '1']);
            });
            return back()->with('Success', 'Duy???t th??nh c??ng');
        }
        return back();
    }

    public function exportSalary(Request $request){
        $data = json_decode($request->data);
//        return view('user.export.salary',compact('data'));
        $pdf = Pdf::loadView('user.export.salary',compact('data'));
        $pdf->setPaper('A4','landscape');
        return $pdf->download('salary.pdf');
    }

}
