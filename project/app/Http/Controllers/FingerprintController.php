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
        //get fingerprint and check to return login
        if ($request->has('fingerID')) {
            $check = Fingerprint::query()
                ->select('user_id')
                ->where('fingerprint_id', '==', $request->input('fingerID'))
                ->value('user_id');
            echo $check;
            if ($check != 0 ) {
                echo 'login';
            } else {
                echo 'no fingerprint found';
            }
        }

        //check to register
        if ($request->has('check')) {
            if (Cache::get('command') == 'register') {
                echo Cache::get('user_id');

                Cache::pull('command');
            }
        }

        //get fingerprint_id
        if ($request->has('newFingerprintID')) {
            DB::table('fingerprints')->insert([
                'user_id' => Cache::get('user_id'),
                'fingerprint_id' => $request->input('newFingerprintID'),
            ]);
            echo 'dang ky van tay thanh cong';
            Cache::flush();
        }

        echo Cache::get('command');
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
