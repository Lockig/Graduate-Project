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
                $check = User::query()
                    ->fingerprint($request)
                    ->value('id');
                if ($check) {
                    $current_time = Carbon::now();
                    $schedule_id = DB::table('course_schedules')
                        ->join('course_students', 'course_schedules.course_id', '=', 'course_students.course_id')
                        ->where('course_students.student_id', '=', $check)
                        ->where('course_schedules.start_at', '<', $current_time)
                        ->where('course_schedules.end_at', '>', $current_time)
                        ->value('course_schedules.id');
                    if ($schedule_id) {
                        DB::table('attendances')->insert([
                            'user_id' => $check,
                            'schedule_id' => $schedule_id,
                            'time_in' => $current_time->format('Y-m-d H:i:s'),
                        ]);
                    }
                    echo 'hello ' . User::find($check)->first_name . ' '. User::find($check)->last_name ;
                } else {
                    echo 'no user find';
                }
            } else {
                echo 'Waiting for finger!';
            }

        }

//        check to register
        if ($request->has('check')) {
            if (Cache::get('command') == 'register') {
                echo Cache::get('command') . Cache::get('user_id');
            }
            if (Cache::get('command') == 'delete') {
                echo Cache::get('command') . Cache::get('user_id');
                sleep(1000);
                Cache::flush();
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
//        if($request->input('action')=='delete'){
//            Cache::put('command', 'delete');
//            Cache::put('user_id',$request->user_id);
//            return back()->with('Success','Xóa vân tay thành công!');
//        }
//        return back()->with('Fail','Error!');
        $id = User::query()->where('id','=',$request->user_id)->value('id');
        if ($id != null) {
            switch ($request->input('action')):
                case 'create':
                    $fingerprint  = User::find($id)->fingerprint;
                    if($fingerprint != 0){
                        return back()->with('Fail','Đã có vân tay không thể thêm mới!');
                    }else{
                        Cache::put('user_id', $request->user_id);
                        Cache::put('command','register');
                        User::find($id)->update(['fingerprint'=>$request->user_id]);
                        return back()->with('Success','Thêm vân tay thành công!');
                    }
                case 'update':
                    Cache::put('command','delete');
                    Cache::put('user_id',$request->user_id);
                    Cache::put('command','register');
                    User::find($id)->update(['fingerprint'=>0]);
                    return back()->with('Success','Điền vân tay để cập nhật!');
                case 'delete':
                    Cache::put('command', 'delete');
                    Cache::put('user_id',$request->user_id);
                    User::find($id)->update(['fingerprint'=>0]);
                    return back()->with('Success','Xóa vân tay thành công!');
                default:
                    return back()->with('Fail','Chưa chọn hành động');
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
