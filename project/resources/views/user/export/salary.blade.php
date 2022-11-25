@php
    $money = $total =  0;
@endphp
    <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body {
            font-family: "Roboto-Black", 'sans-serif';
        }

        .container {
            width: 100%;
        }
        td,tr,th{
            text-align: center;
        }
    </style>
</head>
<body>

<div style="display: flex;width: 90%; justify-content: end; " class="container d-flex">
    <div style="align-items: end" class="header align-items-center">
        <label style="font-weight: bold; text-transform: uppercase">phiếu lương
            tháng {{\Carbon\Carbon::parse($data[0]->time_in)->format('m')}}
            năm {{\Carbon\Carbon::parse($data[0]->time_in)->format('Y')}}</label>
        <table style="width: 200px;">
            <tr>
                <td style="text-align: start">Mã giáo viên:</td>
                <td style="text-align: end;">{{$data[0]->teacher_id}}</td>
            </tr>
            <tr>
                <td style="text-align: start">Tên giáo viên:</td>
                <td style="text-align: end;">{{\App\Models\User::find($data[0]->teacher_id)->first_name .' '.\App\Models\User::find($data[0]->teacher_id)->last_name}}</td>
            </tr>
            <tr>
                <td style="text-align: start">Chức vụ:</td>
                <td style="text-align: end;">{{$data[0]->role}}</td>
            </tr>
        </table>
    </div>

</div>
<div class="container">
    <h5 style="margin-bottom: 0; text-align: end;">Đơn vị: <i>đồng</i></h5>
    <table class="table" style="width: 100%; border-collapse: collapse;" border="1">
        <thead>
        <tr class="text-left">
            <th class="pl-0">#</th>
            <th>Lớp</th>
            <th>Tổng số buổi</th>
            <th>Tiền lương</th>
            <th>Thành tiền</th>
            <th>Đi muộn</th>
            <th>Thực lĩnh</th>
        </tr>
        </thead>
        <tbody>
        {{--        @dd(collect($data)->groupBy('course_name'));--}}
        @foreach(collect($data)->groupBy('course_name') as  $key => $item)
            <tr>
                <td><span>{{$loop->index+1}}</span></td>

                <td><span>{{$key}}</span></td>

                <td><span>{{collect($item)->count()}}</span></td>

                <td>
                    <span>{{number_format(\Illuminate\Support\Facades\DB::table('courses')->where('course_name','like','%'.$key.'%')->value('money'),0)}}đ</span>
                </td>
                <td>
                    <span>{{number_format(collect($item)->count() * \Illuminate\Support\Facades\DB::table('courses')->where('course_name','like','%'.$key.'%')->value('money'),0) }}đ</span>
                </td>
                <td>
                    <span>{{number_format(collect($item)->sum('penalty_amount'),0)}}đ</span>
                </td>
                <td>
                    <span>{{number_format(collect($item)->count() * \Illuminate\Support\Facades\DB::table('courses')->where('course_name','like','%'.$key.'%')->value('money') - collect($item)->sum('penalty_amount'),0)}}đ</span>
                    @php
                        $money+= collect($item)->count() * \Illuminate\Support\Facades\DB::table('courses')->where('course_name','like','%'.$key.'%')->value('money') - collect($item)->sum('penalty_amount');
                    @endphp
                </td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="height: 30px; font-weight: bold; background-color: #00ff80;">{{number_format($money,0)}}</td>
        </tr>
        </tbody>
    </table>

</div>
<div class="container footer" style="display: flex; justify-content: space-between">
    <div style="margin-left: 20px;">
        <h3 style="margin:0; font-size: 16px; text-align: center">Người lập</h3>
        <h3 style="margin:0; font-size: 16px; text-align: center">Admin</h3>
    </div>
    <div style="margin-right: 20px;">
        <h3 style="margin:0; font-size: 16px; text-align: center">Người lao động</h3>
    </div>
</div>
</body>
</html>
