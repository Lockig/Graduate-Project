<?php

namespace App\Http\Controllers;

use App\Models\Fingerprint;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('fingerID')) {
            if ($request->input('fingerID') >= 200) {
                echo 'no user find';
            }
            $check = User::query()
                ->select('user_id')
                ->where('fingerprint_id', '=', $request->input('fingerID'))
                ->value('user_id');
            $current_time = Carbon::now();
            $check_time = DB::table('course_schedules')->where('start_at');
            if ($check) {
                DB::table('attendances')->insert([
                    'user_id' => $check,
                    'time_in' => Carbon::now()->format('Y-m-d H:i:s'),
                    'date' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                echo 'login';
            } else {
                echo 'no user find';
            }
        }

//        check to register
        if ($request->has('check')) {
            if (Cache::get('command') == 'register') {
                echo Cache::get('command') . Cache::get('user_id');
            }
            if (Cache::get('command') == 'delete') {
                echo Cache::get('command') . Cache::get('user_id');
            }
        }
//
//        get new fingerprint_id
        if ($request->has('newFingerID')) {
            DB::table('fingerprints')
                ->insert([
                    'user_id' => Cache::get('user_id'),
                    'fingerprint_id' => $request->input('newFingerID'),
                    'add_fingerprint_id' => '1'
                ]);
            echo 'dang ky van tay thanh cong';
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
     * @param \Illuminate\Http\Request $request
     */
    public function update(Request $request, Fingerprint $fingerprint)
    {
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
