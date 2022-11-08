@extends('layout.layout')


@section('content')
    @php
        $count_on_time = 0;
        $count_late_time = 0;
    @endphp
    @include('system_message')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">lỚP HỌC</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Lớp học</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">{{$course->course_name}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Thông tin</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Details-->
                <!--begin::Breadcrumb-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="{{asset('media/logos/logo-letter-2.png')}}"/>
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <!--end: Pic-->
                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin: Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <!--begin::Name-->
                                        <a href="#"
                                           class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$course->course_name}}
                                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                        <!--end::Name-->
                                    </div>
                                    <!--begin:Button-->
                                    <div class="d-flex">
                                        @if(\Illuminate\Support\Facades\Auth::user()->role=='student')
                                            <div class="my-lg-0 my-1">
                                                <form action="{{route('users.request',$course)}}" method="get">
                                                    @csrf
                                                    @method('GET')
                                                    <button
                                                        name="course_id" value="{{$course->course_id}}"
                                                        class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3"
                                                        type="submit"> Tạo đơn xin nghỉ phép
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->role=='teacher' || \Illuminate\Support\Facades\Auth::user()->role=='admin')
                                            <div class="my-lg-0 my-1">
                                                <button
                                                    data-toggle="modal" data-target="#createNotification"
                                                    class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3"
                                                    type="button"> Tạo thông báo
                                                </button>
                                                <!-- Modal -->
                                                <div id="createNotification" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <form class="modal-content" method="post"
                                                              action="{{route('teacher.createNotification',$course->course_id)}}">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Tạo thông báo lớp
                                                                    học</h4>
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Tạo thông báo</p>
                                                                <textarea name="content" class="form-control"
                                                                          id="kt_autosize_1"
                                                                          rows="5"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-light-primary"
                                                                        data-dismiss="modal">Đóng
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Lưu
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="my-lg-0 my-1">
                                                <form action="{{route('admin.createMark',$course->course_id)}}"
                                                      method="get">
                                                    @csrf
                                                    @method('GET')
                                                    <button
                                                        name="course_id" value="{{$course->course_id}}"
                                                        class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3"
                                                        type="submit"> Tạo điểm
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                            <div class="my-lg-0 my-1">
                                                <a href="{{route('admin.editCourse',$course)}}"
                                                   class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Chỉnh
                                                    sửa</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--end: Title-->
                                <!--begin: Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div
                                        class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">{{$course->course_description}}</div>
                                    <div class="d-flex flex-wrap align-items-center py-2">
                                        <div class="d-flex align-items-center mr-10">
                                            <div class="mr-6">
                                                <div class="font-weight-bold mb-2">Bắt đầu</div>
                                                <span
                                                    class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{Carbon\Carbon::parse($course->start_date)->format('d/m/Y')}}</span>
                                            </div>
                                            <div class="">
                                                <div class="font-weight-bold mb-2">Kết thúc</div>
                                                <span
                                                    class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{Carbon\Carbon::parse($course->end_date)->format('d/m/Y')}}</span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">
                                            <span class="font-weight-bold">Tiến độ</span>
                                            <div class="progress progress-xs mt-2 mb-2">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: {{$learned_period /$total_period * 100}}%;"
                                                     aria-valuenow="{{round($learned_period /$total_period * 100,1)}}"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-weight-bolder text-dark">{{round($learned_period /$total_period * 100,1)}}%</span>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Content-->
                            </div>
                            <!--end: Info-->
                        </div>
                        <div class="separator separator-solid my-7"></div>
                    </div>
                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 ml-4 mr-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Giáo viên</span>
                                <a href="{{route('users.show',$course->teacher_id)}}"
                                   class="text-dark text-hover-primary font-weight-bolder font-size-h5">
                                    {{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' ' . ucwords(\App\Models\User::find($course->teacher_id)->last_name)}}</a>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon2-hourglass icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Thời lượng</span>
                                <span class="font-weight-bolder font-size-h5">
                                                            {{$course->course_hour}} giờ</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Thành viên</span>
                                <span class="font-weight-bolder font-size-h5">
                                                {{$student_count . ' học sinh'}}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Số buổi đã học</span>
                                <span class="font-weight-bolder font-size-h5">
                                                {{$learned_period .'/'.$total_period}}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                        <span class="mr-4">
                                                            <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Trạng thái</span>
                                <span class="font-weight-bolder font-size-h5">
                                                {{ucfirst($course->course_status)}}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--begin: Items-->
                </div>
                <!--end::Card-->
                <!--begin::Row-->

                <div class="card card-custom gutter-b">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Thông báo</span>
                        </h3>
                    </div>
                    <div class="card-body pt-4">
                        <!--begin::Timeline-->
                        <div class="timeline timeline-6 mt-3">
                            <!--begin::Item-->
                            @forelse($course_notifications as $item)
                                <div class="timeline-item align-items-start">
                                    <!--begin::Label-->
                                    <div
                                        class="timeline-label font-weight-bolder text-dark-75 font-size-lg w-200px">{{\Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')}}</div>
                                    <!--end::Label-->
                                    <!--begin::Badge-->
                                    <div class="timeline-badge">
                                        <i class="fa fa-genderless text-warning icon-xl"></i>
                                    </div>
                                    <!--end::Badge-->
                                    <!--begin::Text-->
                                    <div
                                        class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">{{$item->content}}</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Item-->
                            @empty
                                <span class="pl-3">Không có thông báo mới
                                </span>
                            @endforelse
                        </div>
                        <!--end::Timeline-->
                    </div>
                </div>

                <div class="card card-custom gutter-b">
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-bolder text-dark">Tỷ lệ điểm danh</span>
                        </h3>
                    </div>
                    <div class="card-body d-flex">
                        <div id="pie-chart"></div>
                        <div id="pie-chart-1"></div>
                    </div>
                </div>

                <!--begin::Table-->
                <div class="card card-custom gutter-b table-responsive">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-uppercase">Danh sách học sinh</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="pl-0" style="min-width: 50px"></th>
                                <th class="text-left" style="min-width: 50px">Họ và tên</th>
                                <th style="min-width: 100px">Ngày sinh</th>
                                <th style="min-width: 100px">Email</th>
                                <th style="min-width: 100px">Số điện thoại</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                    <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                        <div class="symbol symbol-40 symbol-circle symbol-sm">
                                            <img
                                                src="{{asset(($student->avatar != "")?($student->avatar):'media/users/default.jpg')}}"
                                                alt="image">
                                        </div>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst($student->first_name) . ' ' . ucfirst($student->last_name)}}
                                        </a>
                                    </td>
                                    <td class="pr-0">
                                                    <span
                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}
                                                    </span>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$student->email}}</span>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$student->mobile_number}}</span>
                                    </td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                        <td class="pr-0 text-right">
                                            <a href="{{route('users.show',$student->id)}}" data-toggle="tooltip"
                                               title="thông tin cá nhân"
                                               class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24"
                                                                                 version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                   fill="none"
                                                                                   fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                          height="24"/>
                                                                                    <path
                                                                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                        fill="#000000"/>
                                                                                    <path
                                                                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                        fill="#000000" opacity="0.3"/>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                            </a>
                                            <form class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                  method="post"
                                                  action="#"
                                                  data-toggle="tooltip"
                                                  title="xóa">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
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
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            {!! $students->links() !!}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
                <!--end::Row-->
                <!--begin::Table-->
                <div class="card card-custom gutter-b table-responsive">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-uppercase">Thông tin điểm danh</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="get" action="{{route('admin.coursesDetails',$course)}}" class="mb-7">
                            @csrf
                            <div class="row">
                                <label for="schedule_id"
                                       class="col-lg-1 align-center pt-4 text-uppercase">Buổi</label>
                                <div class="col-lg-8 col-md-10 col-sm-6">
                                    <select name="schedule_id"
                                            class="form-control">
                                        @foreach($course_schedule as $item)
                                            <option
                                                value="{{$item->start_at}}"
                                                class="form-control form-control-lg form-control-solid">
                                                {{\Carbon\Carbon::parse($item->start_at)->format('d/m/Y')}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 my-2 my-md-0">
                                    <button class="btn btn-light-primary px-6 font-weight-bold">  <span
                                            class="svg-icon svg-icon-md">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                    <path
                                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                        fill="#000000"/>
                                                                </g>
                                                            </svg>
                                            <!--end::Svg Icon-->
                                                        </span>Tìm kiếm
                                    </button>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                                        <a href="{{route('teacher.createAttendance',$course->course_id)}}"
                                           class="btn btn-light-primary font-weight-bold">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                                                <path
                                                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                                    fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>Tạo mới</a>
                                        <!--begin::Dropdown-->
                                        <div class="dropdown dropdown-inline mr-2">
                                            <button type="button"
                                                    class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="svg-icon svg-icon-md">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                    <path
                                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                        fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>Xuất
                                            </button>
                                            <!--begin::Dropdown Menu-->
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                <!--begin::Navigation-->
                                                <ul class="navi flex-column navi-hover py-2">
                                                    <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                                        Chọn:
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="la la-print"></i>
                                                                        </span>
                                                            <span class="navi-text">Print</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="la la-copy"></i>
                                                                        </span>
                                                            <span class="navi-text">Copy</span>
                                                        </a>
                                                    </li>
                                                    <li class="navi-item">
                                                        <form action="{{route('admin.listCourse')}}" method="get">
                                                            @csrf
                                                            <button name="export" type="submit"
                                                                    class="navi-link btn btn-borderless w-100">
                                                                            <span class="navi-con">
                                                                                <i class="la la-file-excel-o"></i>
                                                                                <span class="navi-text">Excel</span>
                                                                            </span>
                                                            </button>
                                                        </form>
                                                        {{--                                            <a href="" class="navi-link">--}}
                                                        {{--																<span class="navi-icon">--}}
                                                        {{--																	<i class="la la-file-excel-o"></i>--}}
                                                        {{--																</span>--}}
                                                        {{--                                                <span class="navi-text">Excel</span>--}}
                                                        {{--                                            </a>--}}
                                                    </li>
                                                    <li class="navi-item">
                                                        <a href="#" class="navi-link">
                                                                        <span class="navi-icon">
                                                                            <i class="la la-file-pdf-o"></i>
                                                                        </span>
                                                            <span class="navi-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!--end::Navigation-->
                                            </div>
                                            <!--end::Dropdown Menu-->
                                        </div>
                                        <!--end::Dropdown-->
                                    @endif
                                </div>
                            </div>
                        </form>
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="pl-0" style="min-width: 50px"></th>
                                <th class="text-left" style="min-width: 50px">Họ và tên</th>
                                <th style="min-width: 100px">Giờ vào</th>
                                <th style="min-width: 100px">Ghi chú</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($attendances as $item)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                        <div class="symbol symbol-40 symbol-circle symbol-sm">
                                            <img
                                                src="{{asset((\App\Models\User::find($item->user_id)->avatar != "")?(\App\Models\User::find($item->user_id)->avatar):'media/users/default.jpg')}}"
                                                alt="image">
                                        </div>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst(\App\Models\User::find($item->user_id)->first_name) . ' ' . ucfirst(\App\Models\User::find($item->user_id)->last_name)}}
                                        </a>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder text-hover-primary d-block font-size-lg">{{\Carbon\Carbon::parse($item->time_in)->format("H:i:s")}}</span>
                                    </td>
                                    <td>
                                        @php
                                            $query = \Illuminate\Support\Facades\DB::table('course_schedules')->where('id','=',$item->schedule_id);
                                            $start_at = $query->value('start_at');
                                            $end_at = $query->value('end_at');
                                        @endphp
                                        @if(\Carbon\Carbon::parse($item->time_in)->diffInMinutes($start_at) <=5)
                                            <span
                                                class="text-success font-weight-bolder d-block font-size-lg">
                                                       Đúng giờ
                                                   </span>
                                            {{$count_on_time +=1}}
                                        @elseif(\Carbon\Carbon::parse($item->time_in)->diffInMinutes($start_at) <10)
                                            <span
                                                class="text-warning  font-weight-bolder d-block font-size-lg">
                                                      Muộn < 10p
                                                   </span>
                                            {{$count_late_time +=1}}
                                        @else
                                            <span
                                                class="text-danger  font-weight-bolder d-block font-size-lg">
                                                      Muộn >10p
                                                   </span>
                                            {{$count_late_time +=1}}
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>Không có thông tin</tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            {!! $attendances->links() !!}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
                <!--begin::Card-->
                <!--begin::Table-->
                <div class="card card-custom gutter-b table-responsive">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-uppercase">Bảng điểm lớp học</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 my-2 my-md-0">
                                    <a href="{{route('admin.createMark',$course->course_id)}}"
                                       class="btn btn-light-primary font-weight-bold">
                                                    <span class="svg-icon svg-icon-md">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <circle fill="#000000" cx="9" cy="15" r="6"/>
                                                                <path
                                                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                                    fill="#000000" opacity="0.3"/>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>Tạo mới</a>
                                    <!--begin::Dropdown-->
                                    <div class="dropdown dropdown-inline mr-2">
                                        <button type="button"
                                                class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="svg-icon svg-icon-md">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                    <path
                                                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                                                        fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>Xuất
                                        </button>
                                        <!--begin::Dropdown Menu-->
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi flex-column navi-hover py-2">
                                                <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                                    Chọn:
                                                </li>
                                                <li class="navi-item">
                                                    <form method="get"
                                                          action="{{route('teacher.listMark',$course->course_id)}}">
                                                        @csrf
                                                        <button name="excel" type="submit"
                                                                class="navi-link btn btn-borderless w-100">
                                                                            <span class="navi-con">
                                                                                <i class="la la-file-excel-o"></i>
                                                                                <span class="navi-text">Excel</span>
                                                                            </span>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li class="navi-item">
                                                    <form action="{{route('teacher.listMark',$course->course_id)}}"
                                                          method="get">
                                                        @csrf
                                                        <button name="pdf" type="submit"
                                                                class="navi-link btn btn-borderless w-100">
                                                                            <span class="navi-con">
                                                                                <i class="la la-file-pdf-o"></i>
                                                                                <span class="navi-text">PDF</span>
                                                                            </span>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                        <!--end::Dropdown Menu-->
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                            </div>
                        @endif
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="pl-0" style="min-width: 50px"></th>
                                <th class="text-left" style="min-width: 50px">Họ và tên</th>
                                <th style="min-width: 100px">Điểm lần 1</th>
                                <th style="min-width: 100px">Điểm lần 2</th>
                                <th style="min-width: 100px">Điểm lần 3</th>
                                <th style="min-width: 100px">Trung bình</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                    <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grades as $grade)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                        <div class="symbol symbol-40 symbol-circle symbol-sm">
                                            <img
                                                src="{{asset(($student->avatar != "")?($student->avatar):'media/users/default.jpg')}}"
                                                alt="image">
                                        </div>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst(\App\Models\User::find($grade->student_id)->first_name) . ' ' . ucfirst(\App\Models\User::find($grade->student_id)->last_name)}}
                                        </a>
                                    </td>
                                    <td class="pr-0">
                                                    <span
                                                        class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$grade->diem_lan_1}}
                                                    </span>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$grade->diem_lan_2}}</span>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$grade->diem_lan_3}}</span>
                                    </td>
                                    <td>
                                                   <span
                                                       class="text-dark-75 font-weight-bolder d-block font-size-lg">{{round(($grade->diem_lan_3+$grade->diem_lan_2+$grade->diem_lan_3)/3,2)}}</span>
                                    </td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                        <td class="pr-0 text-right">
                                            <a href="{{route('users.editMark',[$course->course_id,$student->student_id])}}"
                                               data-toggle="tooltip"
                                               title="chỉnh sửa"
                                               class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                        <span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
                                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24"
                                                                                 version="1.1">
                                                                                <g stroke="none" stroke-width="1"
                                                                                   fill="none"
                                                                                   fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24"
                                                                                          height="24"/>
                                                                                    <path
                                                                                        d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                        fill="#000000"/>
                                                                                    <path
                                                                                        d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                        fill="#000000" opacity="0.3"/>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span>
                                            </a>
                                            <form class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                  method="post"
                                                  action="{{route('users.deleteMark',[$course->course_id , $student->student_id])}}"
                                                  data-toggle="tooltip"
                                                  title="xóa">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
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
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <span>Chưa có thông tin</span>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            {!! $students->links() !!}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-custom gutter-b">
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                                <span
                                                    class="card-label font-weight-bolder text-dark">Thời khóa biểu lớp học</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div id="kt_calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
            <!--end::Entry-->
        </div>
    </div>

    <!--end::Content-->

@endsection



@section('script')
    <script src="{{mix('js/chart.js')}}"></script>
    <script>

        var options = {
            series: [{{$attendances->count()}}, {{$learned_period - $attendances->count()}}],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Đã điểm danh', 'Chưa điểm danh'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
        chart.render();


        var options = {
            series: [{{$count_on_time}}, {{$count_late_time}}],
            // series: [12, 22],
            chart: {
                width: 340,
                type: 'pie',
            },
            labels: ['Đúng giờ', 'Đi muộn'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#pie-chart-1"), options);
        chart.render();
    </script>
    <script src="{{asset('js/external-events.js')}}"></script>
    <script>
        {{--const data = <?php--}}
        {{--    $logs = \Illuminate\Support\Facades\DB::table('daily_logs')->select()--}}
        {{--        ->where('user_id','=',\Illuminate\Support\Facades\Auth::user()->user_id)--}}
        {{--        ->get();--}}
        {{--    echo(json_encode($logs));--}}
        {{--    ?>;--}}

        {{--console.log(data);--}}
        var array = [];

        var KTCalendarBasic = function (data) {
            console.log(data);
            return {
                //main function to initiate the module
                init: function (data) {
                    var todayDate = moment().startOf('day');
                    var YM = todayDate.format('YYYY-MM');
                    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                    var TODAY = todayDate.format('YYYY-MM-DD');
                    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                    var calendarEl = document.getElementById('kt_calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                        themeSystem: 'bootstrap',

                        isRTL: KTUtil.isRTL(),

                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },

                        height: 800,
                        contentHeight: 780,
                        aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                        nowIndicator: true,
                        now: TODAY + 'T09:25:00', // just for demo

                        views: {
                            dayGridMonth: {buttonText: 'month'},
                            timeGridWeek: {buttonText: 'week'},
                            timeGridDay: {buttonText: 'day'}
                        },

                        defaultView: 'dayGridMonth',
                        defaultDate: TODAY,

                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        navLinks: true,
                        events: [
                                @foreach($course_schedule as $item)
                            {
                                'title': '{{ $course->course_name }}',
                                'start': '{{ \Carbon\Carbon::parse($item->start_at)->format('Y-m-d h:i:s') }}',
                                'end': '{{ \Carbon\Carbon::parse($item->end_at)->format('Y-m-d h:i:s') }}',
                            },
                            @endforeach
                        ],
                        eventColor: 'lightblue',

                        eventRender: function (info) {
                            var element = $(info.el);

                            if (info.event.extendedProps && info.event.extendedProps.description) {
                                if (element.hasClass('fc-day-grid-event')) {
                                    element.data('content', info.event.extendedProps.description);
                                    element.data('placement', 'top');
                                    KTApp.initPopover(element);
                                } else if (element.hasClass('fc-time-grid-event')) {
                                    element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                    element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                                }
                            }
                        }
                    });

                    calendar.render();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTCalendarBasic.init();
        });
    </script>
@endsection
