@extends('user.export.layout')

@section('content')

    <div class="container">
        <div class="header d-flex align-center">
            <h3>Lop {{\App\Models\Course::find($course)->course_name}}</h3>
        </div>
        <div class="section-1 d-flex justify-content-start">
            <h3>Giao vien: {{\App\Models\User::find(\App\Models\Course::find($course)->teacher_id)->first_name .' ' .\App\Models\User::find(\App\Models\Course::find($course)->teacher_id)->last_name}}</h3>
            <h3>Thong tin khoa hoc:</h3>
            <h3 class="ml-5">Gio bat dau : {{Carbon\Carbon::parse(\App\Models\Course::find($course)->start_date)->format('d-m-Y')}}</h3>
            <h3 class="ml-5">Gio ket thuc : {{Carbon\Carbon::parse(\App\Models\Course::find($course)->end_date)->format('d-m-Y')}}</h3>
            <h3 class="ml-5">Thoi luong : {{\App\Models\Course::find($course)->course_hour}}h</h3>
        </div>
{{--        bảng điểm--}}
        <div class="section-2">
            <table style="border: 1px solid black" class="table table-bordered">
                <h3>Bang diem</h3>
                <thead>
                <tr class="text-left">
                    <th class="pr-0" style="width: 100px">Diem lan 1</th>
                    <th class="pr-0" style="width: 100px">Diem lan 2</th>
                    <th class="pr-0" style="width: 100px">Diem lan 3</th>
                    <th class="pr-0 text-right" style="min-width: 50px">Trung binh</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="pr-0">
                        <a
                           class="text-dark-75 font-weight-bold mb-1 font-size-lg">{{$grade['0']->diem_lan_1}}</a>
                    </td>
                    <td class="pr-0">
                        <a
                           class="text-dark-75 font-weight-bold mb-1 font-size-lg">{{$grade['0']->diem_lan_2}}</a>
                    </td>
                    <td class="pr-0">
                        <a
                           class="text-dark-75 font-weight-bold mb-1 font-size-lg">{{$grade['0']->diem_lan_3}}</a>
                    </td>
                    <td class="pr-0">
                        <a
                           class="text-dark-75 font-weight-bold mb-1 font-size-lg">{{round(($grade['0']->diem_lan_3+$grade['0']->diem_lan_2+$grade['0']->diem_lan_1)/3),2}}</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="section-3">
            <table class="table table-bordered">
                <h3>Thong tin diem danh</h3>
                <h3>So buoi di hoc: {{$attendances}} / {{$total_period}}</h3>
                <h3>So buoi di muon: 5</h3>
            </table>
        </div>
    </div>
@endsection


@section('style')
    <style>
        table{
            border-collapse: collapse;
        }

    </style>
@endsection
