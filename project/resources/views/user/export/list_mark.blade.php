<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Sans-serif, serif;
        }
        .container{
            display: flex;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .title{
            align-items: center;
        }
    </style>
</head>
<body>


<div class="container d-flex">
    <div class="title">
        <h3 class="text-uppercase text-center">Class score {{\App\Models\Course::find($course)->course_name}}</h3>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr class="text-left table-danger">
            <th class="pl-0" style="width: 20px">
                Order
            </th>
            <th style="min-width: 50px">Full Name</th>
            <th style="min-width: 100px">Exam 1</th>
            <th style="min-width: 100px">Exam 2</th>
            <th style="min-width: 100px">Exam 3</th>
            <th style="min-width: 100px">Medium</th>
        </tr>
        </thead>
        <tbody>
        @foreach($grades as $grade)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{ucfirst(\App\Models\User::find($grade->student_id)->first_name) . ' ' . ucfirst(\App\Models\User::find($grade->student_id)->first_name)}}</td>
                <td>{{$grade->diem_lan_1}}</td>
                <td>{{$grade->diem_lan_2}}</td>
                <td>{{$grade->diem_lan_3}}</td>
                <td>
                    @if($grade->diem_lan_1 != null && $grade->diem_lan_2 != null && $grade->diem_lan_3 != null)
                        {{round(($grade->diem_lan_1+$grade->diem_lan_2+$grade->diem_lan_3)/3,2)}}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
