<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = DB::table('penalties')->get();
        return view('user.penalty', compact('penalties'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'penalty_amount'=>'required|integer',
            'penalty_description'=>'required|string'
        ]);
        DB::table('penalties')->insert([
            'penalty_amount'=>$validated['penalty_amount'],
            'penalty_description'=>$validated['penalty_description']
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
