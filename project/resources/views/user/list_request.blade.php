@extends('layout.layout')


@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b table-responsive">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-uppercase">Danh sách đơn xin nghỉ</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                        <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 20px">
                                STT
                            </th>
                            <th class="text-left" style="min-width: 50px">Lớp</th>
                            <th style="min-width: 100px">Buổi</th>
                            <th style="min-width: 100px">Lý do</th>
                            <th style="min-width: 100px">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td class="pr-0">
                                    <label class="checkbox checkbox-lg checkbox-inline">
                                        {{$loop->index + 1}}
                                    </label>
                                </td>
                                <td class="pr-0">
                                    <a href="#"
                                       class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                        {{\Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','course_schedules.course_id','=','courses.course_id')
                                        ->join('day_off_requests','course_schedules.id','=','day_off_requests.schedule_id')
                                        ->where('day_off_requests.schedule_id','=',$request->schedule_id)
                                        ->value('course_name')
                                        }}
                                    </a>
                                </td>
                                <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Illuminate\Support\Facades\DB::table('course_schedules')->where('id','=',$request->schedule_id)->value('start_at') }}
                                            </span>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$request->content}}
                                   </span>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$request->stage}}
                                   </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        {!! $requests->links() !!}
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
    </div>

@endsection


@section('script')


@endsection
