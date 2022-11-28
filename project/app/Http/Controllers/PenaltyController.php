<?php

namespace App\Http\Controllers;


use App\Http\Requests\PenaltyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = DB::table('penalties')->get();
        return view('user.penalty', compact('penalties'));
    }

    public function store(PenaltyRequest $request): \Illuminate\Http\RedirectResponse
    {
        DB::table('penalties')->insert([
            'penalty_amount'=>$request->input('penalty_amount'),
            'penalty_description'=>$request->input('penalty_description')
        ]);
        return back()->with('Success','Thêm mới thành công');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        DB::table('penalties')->where('penalty_id', $id)->delete();
        return back()->with('Success', 'Xóa thành công');
    }
    //
}
