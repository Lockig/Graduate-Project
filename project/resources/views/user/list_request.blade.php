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
                            <th style="min-width: 100px">Hành động</th>
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
                                            class="d-flex justify-content-between btn btn-icon btn-light btn-hover-primary btn-sm"
                                            method="post"
                                            action="{{route('users.updateRequest',$request->id)}}">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" data-toggle="tooltip"
                                                    title="Duyệt" name="accept"
                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                     version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"/>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button type="submit" data-toggle="tooltip"
                                                    title="Từ chối" name="reject"
                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                     version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path
                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                            fill="#000000" fill-rule="nonzero"/>
                                                        <path
                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                            fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <!--Modal-->
                                            {{--                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"--}}
                                            {{--                                                 aria-labelledby="deleteModal" aria-hidden="true">--}}
                                            {{--                                                <div class="modal-dialog" role="document">--}}
                                            {{--                                                    <div class="modal-content">--}}
                                            {{--                                                        <div class="modal-header">--}}
                                            {{--                                                            <h5 class="modal-title" id="exampleModalLabel">Cảnh báo</h5>--}}
                                            {{--                                                            <button type="button" class="close" data-dismiss="modal"--}}
                                            {{--                                                                    aria-label="Close">--}}
                                            {{--                                                                <i aria-hidden="true" class="ki ki-close"></i>--}}
                                            {{--                                                            </button>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <div class="modal-body">--}}
                                            {{--                                                            <p>Bạn có chắc muốn xóa chứ?</p>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                        <div class="modal-footer">--}}
                                            {{--                                                            <button type="button"--}}
                                            {{--                                                                    class="btn btn-light-primary font-weight-bold"--}}
                                            {{--                                                                    data-dismiss="modal">Hủy--}}
                                            {{--                                                            </button>--}}
                                            {{--                                                            <button type="submit"--}}
                                            {{--                                                                    class="btn btn-primary font-weight-bold">Chọn--}}
                                            {{--                                                            </button>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            <!--endModal-->
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
