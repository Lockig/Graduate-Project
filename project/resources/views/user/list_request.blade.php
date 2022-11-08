@extends('layout.layout')


@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Card-->
            <div class="card card-custom gutter-b table-responsive">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-uppercase">ĐƠN XIN NGHỈ CHƯA DUYỆT</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-head-custom table-vertical-center mb-5" id="kt_advance_table_widget_1">
                        <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 20px">
                                STT
                            </th>
                            <th class="text-left" style="min-width: 50px">Họ tên</th>
                            <th class="text-left" style="min-width: 50px">Lớp</th>
                            <th style="min-width: 100px">Buổi</th>
                            <th style="min-width: 100px">Lý do</th>
                            <th style="min-width: 100px">Trạng thái</th>
                            @if(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                                <th class="text-right" style="min-width: 100px">Hành động</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($requests as $request)
                            <tr>
                                <td class="pr-0">
                                    <label class="checkbox checkbox-lg checkbox-inline">
                                        {{$loop->index + 1}}
                                    </label>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\App\Models\User::find($request->student_id)->first_name . ' ' . \App\Models\User::find($request->student_id)->last_name}}
                                   </span>
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
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                                {{Carbon\Carbon::parse(\Illuminate\Support\Facades\DB::table('course_schedules')
                                                    ->where('id','=',$request->schedule_id)->value('start_at'))->format('d/m/Y H:i') }}
                                            </span>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$request->content}}
                                   </span>
                                </td>
                                <td>

                                   <span
                                       @if($request->stage=='Đã duyệt')
                                           class="text-success font-weight-bolder d-block font-size-lg"
                                       @elseif($request->stage=='Từ chối')
                                           class="text-warning font-weight-bolder d-block font-size-lg"
                                       @else
                                           class="text-primary font-weight-bolder d-block font-size-lg"
                                       @endif
                                   >{{$request->stage}}
                                   </span>
                                </td>
                                @if(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                                    <td class="ml-2">
                                        <form
                                            class="d-flex justify-content-end"
                                            method="post"
                                            action="{{route('users.updateRequest',$request->id)}}">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" data-toggle="tooltip"
                                                    title="Duyệt" name="accept"
                                                    class="svg-icon svg-icon-md svg-icon-success btn btn-icon btn-light btn-hover-primary btn-sm">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path
                                                            d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button type="submit" data-toggle="tooltip"
                                                    title="Từ chối" name="reject"
                                                    class="svg-icon svg-icon-md svg-icon-danger btn btn-icon btn-light btn-hover-primary btn-sm">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                           fill="#000000">
                                                            <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                            <rect opacity="0.3"
                                                                  transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) "
                                                                  x="0" y="7" width="16" height="2" rx="1"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            không có đơn xin nghỉ
                        @endforelse
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

            <!--begin::Card-->
            <div class="card card-custom gutter-b table-responsive">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="text-uppercase">Danh sách đơn xin nghỉ</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-head-custom table-vertical-center mb-5" id="kt_advance_table_widget_1">
                        <thead>
                        <tr class="text-left">
                            <th class="pl-0" style="width: 20px">
                                STT
                            </th>
                            <th class="text-left" style="min-width: 50px">Họ tên</th>
                            <th class="text-left" style="min-width: 50px">Lớp</th>
                            <th style="min-width: 100px">Buổi</th>
                            <th style="min-width: 100px">Lý do</th>
                            <th style="min-width: 100px">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($accept as $request)
                            <tr>
                                <td class="pr-0">
                                    <label class="checkbox checkbox-lg checkbox-inline">
                                        {{$loop->index + 1}}
                                    </label>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\App\Models\User::find($request->student_id)->first_name . ' ' . \App\Models\User::find($request->student_id)->last_name}}
                                   </span>
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
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{Carbon\Carbon::parse( \Illuminate\Support\Facades\DB::table('course_schedules')->where('id','=',$request->schedule_id)->value('start_at'))->format('d/m/Y H:s')}}
                                            </span>
                                </td>
                                <td>
                                   <span
                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$request->content}}
                                   </span>
                                </td>
                                <td>
                                   <span
                                       @if($request->stage=='Đã duyệt')
                                           class="text-success font-weight-bolder d-block font-size-lg"
                                       @elseif($request->stage=='Từ chối')
                                           class="text-warning font-weight-bolder d-block font-size-lg"
                                       @else
                                           class="text-primary font-weight-bolder d-block font-size-lg"
                                       @endif
                                      >{{$request->stage}}
                                   </span>
                                </td>
                            </tr>
                        @empty
                            <span class="font-size-h6 text-dark ">không có dữ liệu<span>
                        @endforelse
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
