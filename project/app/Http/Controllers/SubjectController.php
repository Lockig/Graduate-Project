<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    //

    public function index(Request $request): Factory|View|Application
    {
        $subjects = Subject::query()->name($request)->get();
        return view('user.admin.list_subject', compact('subjects'));
    }

    public function store(Request $request): RedirectResponse
    {
        Subject::query()->insert(['subject_id' => $request->input('subject_id'), 'subject_name' => $request->input('subject_name')]);
        return redirect()->back()->with('Success', 'Tạo môn học thành công');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        DB::table('subjects')->where('subject_id', '=', $id)->update([
            'subject_id' => $request->input('subject_id'),
            'subject_name' => $request->input('subject_name')
        ]);
        return back()->with('Success', 'Cập nhật thông tin lớp học thành công');
    }

    public function destroy($id): RedirectResponse
    {
        $check = DB::table('courses')->where('subject_id', '=', $id)->value('course_id');
        if ($check != NULL) {
            return back()->with('Fail', 'Không thể xóa!');
        } else {
            DB::table('subjects')->where('subject_id', '=', $id)->delete();
            return back()->with('Success', 'Xóa môn học thành công');
        }
    }
}
