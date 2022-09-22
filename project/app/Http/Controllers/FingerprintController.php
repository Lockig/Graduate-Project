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
        if ($request->has('Get_Fingerid')) {
            echo "xin chào" . Cache::get('user_id');
        } else {
            echo 'loi';
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
        if ($request->has('newFingerprint')) {
            echo 'user_id la: ' . Cache::get('user_id');
        } else {
            echo 'loi';
        }
        if($request->has('fingerID')){
            echo 'Van tay nhan duoc la:'. $request->fingerID;
        }

//        echo Cache::get('command');
//        $time_in =Carbon::now()->toDateTimeString();
//        if($request->input('fingerId')){
//            DB::table('fingerprints')->insert([
//                'user_id'=>$request->input('fingerId'),
//                'time_in'=>$time_in,
//            ]);
//            echo "ok";
//        }else{
//            echo "Error:";
//        }
        //
        //
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
