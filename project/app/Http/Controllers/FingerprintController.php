<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Framework\SyntheticSkippedError;

class FingerprintController extends Controller
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('fingerID')) {
            if ($request->input('fingerID') < 254) {
                $user = User::query()
                    ->fingerprint($request)
                    ->get();
                if ($user) {
                    $current_time = Carbon::now();
                    if ($user->value('role') == 'student') {
                        $schedule_id = DB::table('course_schedules')
                            ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
                            ->where('course_students.student_id', '=', $user->value('id'))
                            ->where('course_schedules.start_at', '<=', $current_time)
                            ->where('course_schedules.end_at', '>=', $current_time)
                            ->get();
                    } elseif ($user->value('role') == 'teacher') {
                        $schedule_id = DB::table('course_schedules')
                            ->join('courses', 'courses.course_id', '=', 'course_schedules.course_id')
                            ->where('courses.teacher_id', '=', $user->value('id'))
                            ->where('course_schedules.start_at', '<=', $current_time)
                            ->where('course_schedules.end_at', '>=', $current_time)
                            ->get();
                    }
                    if ($schedule_id->value('id')) {
                        $diff = $current_time->diffInMinutes($schedule_id->value('start_at'));
                        $penalty = NULL;
                        if ($diff <= 10)
                            $penalty = 1;
                        elseif ($diff <= 15)
                            $penalty = 2;
                        else
                            $penalty = 3;
                        DB::table('attendances')->insert([
                            'user_id' => $user->value('id'),
                            'schedule_id' => $schedule_id->value('id'),
                            'time_in' => $current_time->format('Y-m-d H:i:s'),
                            'penalty_id' => $penalty
                        ]);
                    }
                    echo 'hello ' . $user->value('first_name') . ' ' . $user->value('last_name');
                } else {
                    echo 'no user find';
                }
            } else {
                echo 'Waiting for finger!';
            }

        }

//        command
        if ($request->has('check')) {
            if (Cache::get('command') == 'register') {
                echo Cache::get('command') . Cache::get('user_id');
            }
            if (Cache::get('command') == 'clear') {
                echo Cache::get('command') . Cache::get('user_id');
                sleep(1000);
                Cache::flush();
            }
            if(Cache::get('command')=='clear'){
                echo Cache::get('command');
            }
        }

//        get new fingerprint_id
        if ($request->has('newFingerID')) {
            DB::table('users')->where('id', '=', Cache::get('user_id'))
                ->update([
                    'fingerprint' => $request->input('newFingerID'),
                ]);
            echo 'new finger registered';
            Cache::flush();
        }

        if ($request->has('deleted')) {
            DB::table('users')->where('id', '=', $request->input('deleted'))->update(['fingerprint' => 0]);
        }
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Fingerprint $fingerprint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Fingerprint $fingerprint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = User::query()->where('id', '=', $request->user_id)->value('id');
        if($request->input('action')=='clear'){
            Cache::put('command','clear');
            DB::table('users')->update(['fingerprint'=>'0']);
            return back()->with('Success','Xóa toàn bộ vân tay');
        }
        if ($id != null) {
            switch ($request->input('action')):
                case 'create':
                    $fingerprint = User::find($id)->fingerprint;
                    if ($fingerprint != 0) {
                        return back()->with('Fail', 'Đã có vân tay không thể thêm mới!');
                    } else {
                        Cache::put('user_id', $request->user_id);
                        Cache::put('command', 'register');
                        User::find($id)->update(['fingerprint' => $request->user_id]);
                        return back()->with('Success', 'Thêm vân tay thành công!');
                    }
                case 'update':
                    Cache::put('command', 'delete');
                    Cache::put('user_id', $request->user_id);
                    Cache::put('command', 'register');
                    DB::table('users')->where('id', '=', $request->user_id)->update(['fingerprint' => 0]);
                    return back()->with('Success', 'Điền vân tay để cập nhật!');
                case 'delete':
                    Cache::put('command', 'delete');
                    Cache::put('user_id', $request->user_id);
                    DB::table('users')->where('id', '=', $request->user_id)->update(['fingerprint' => 0]);
                    return back()->with('Success', 'Xóa vân tay thành công!');
                default:
                    return back()->with('Fail', 'Chưa chọn hành động');
            endswitch;
        } else {
            return back()->with('Fail', 'Sai ID');
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Fingerprint $fingerprint)
    {
        //
    }
}
