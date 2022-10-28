@extends('layout.layout')

@section('content')
    @include('system_message')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-muted font-weight-bold my-1 mr-5 text-uppercase">DANH SÁCH LỚP HỌC</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Quản lý</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Lớp học</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Danh sách</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Advance Table Widget 1-->
                <div id="form" class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="align-self-baseline text-muted text-uppercase">DANH SÁCH LỚP HỌC</h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Form-->
                        <form method="get"
                              @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                  action="{{route('admin.listCourse')}}"
                              @elseif(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                                  action="{{route('teacher.listCourse')}}"
                              @endif
                              class="mb-7">
                            @csrf
                            <div class="row ">
                                <div class="col-lg-12 col-xl-8">
                                    <div class="row align-items-center ">
                                        <div class=" col-lg-8 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input name="course_name" type="text" class="form-control"
                                                       placeholder="Tên lớp..." id="kt_datatable_search_query"
                                                       value="{{old("course_name")}}"/>
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
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

                                    @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                        <a href="{{route('admin.createCourse')}}"
                                           class="btn btn-light-primary font-weight-bold">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>Tạo mới</a>
                                    @endif
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
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                <thead>
                                <tr class="text-left">
                                    <th class="pl-0" style="width: 20px">
                                        STT
                                    </th>
                                    <th style="min-width: 50px">Tên lớp</th>
                                    <th style="min-width: 100px">Giáo viên</th>
                                    <th style="min-width: 100px">Ngày bắt đầu</th>
                                    <th style="min-width: 100px">Ngày kết thúc</th>
                                    <th style="min-width: 100px">Tình trạng</th>
                                    <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td class="pr-0">
                                            <label class="checkbox checkbox-lg checkbox-inline">
                                                {{$loop->index + 1}}
                                            </label>
                                        </td>
                                        <td class="pr-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$course->course_name}}
                                            </a>
                                        </td>
                                        <td class="pr-0">
                                            <span
                                                class="text-dark-75 text-hover-primary font-weight-bolder d-block font-size-lg">{{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' ' . ucwords(\App\Models\User::find($course->teacher_id)->last_name) }}
                                            </span>
                                        </td>
                                        <td>
                                           <span
                                               class="text-dark-75 text-hover-primary font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($course->start_date)->format('d/m/Y')}}</span>
                                        </td>
                                        <td>
                                           <span
                                               class="text-dark-75 text-hover-primary font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($course->end_date)->format('d/m/Y')}}</span>
                                        </td>
                                        <td>
                                           <span
                                               class="text-dark-75 text-hover-primary font-weight-bolder d-block font-size-lg">{{$course->course_status}}</span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                                <form method="get" action="{{route('admin.editCourse',$course)}}"
                                                      data-toggle="tooltip"
                                                      title="chỉnh sửa lớp học"
                                                      class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                    @csrf
                                                    <button type="submit"
                                                            class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                             width="24px" height="24px" viewBox="0 0 24 24"
                                                             version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path
                                                                    d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
                                                                <path
                                                                    d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                    fill="#000000" fill-rule="nonzero"
                                                                    opacity="0.3"/>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </form>
                                            @endif
                                            <a
                                                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                                    href="{{route('admin.coursesDetails',$course)}}"
                                                @else
                                                    href="{{route('users.coursesDetails',$course->course_id)}}"
                                                @endif
                                                data-toggle="tooltip"
                                                title="thông tin"
                                                class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                           <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg
                                                   xmlns="http://www.w3.org/2000/svg"
                                                   xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                   viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                    <path
                                                        d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                    <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span>
                                            </a>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                                <form class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                      method="post"
                                                      action="{{route('admin.deleteCourse',$course)}}"
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
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {!! $courses->links() !!}
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 1-->
                <!--begin::Table-->
                {{--                <div class="card card-custom gutter-b table-responsive">--}}
                {{--                    <div class="card-header">--}}
                {{--                        <div class="card-title">--}}
                {{--                            <h3 class="text-uppercase">Danh sách giáo viên</h3>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-left">--}}
                {{--                                <th class="pl-0" style="width: 20px">--}}
                {{--                                    STT--}}
                {{--                                </th>--}}
                {{--                                <th class="pl-0" style="min-width: 50px"></th>--}}
                {{--                                <th class="text-left" style="min-width: 50px">Họ và tên</th>--}}
                {{--                                <th style="min-width: 100px">Ngày sinh</th>--}}
                {{--                                <th style="min-width: 100px">Email</th>--}}
                {{--                                <th style="min-width: 100px">Số điện thoại</th>--}}
                {{--                                <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody>--}}
                {{--                            @foreach($teachers as $teacher)--}}
                {{--                                <tr>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <label class="checkbox checkbox-lg checkbox-inline">--}}
                {{--                                            {{$loop->index + 1}}--}}
                {{--                                        </label>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <div class="symbol symbol-40 symbol-circle symbol-sm">--}}
                {{--                                            <img src="{{asset(($teacher->avatar != "")?($teacher->avatar):'media/users/default.jpg')}}" alt="image">--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <a href="#"--}}
                {{--                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst($teacher->first_name) . ' ' . ucfirst($teacher->last_name)}}--}}
                {{--                                        </a>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                            <span--}}
                {{--                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($teacher->date_of_birth)->format('d-m-Y') }}--}}
                {{--                                            </span>--}}
                {{--                                    </td>--}}
                {{--                                    <td>--}}
                {{--                                           <span--}}
                {{--                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->email}}</span>--}}
                {{--                                    </td>--}}
                {{--                                    <td>--}}
                {{--                                           <span--}}
                {{--                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->mobile_number}}</span>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0 text-right">--}}
                {{--                                        <form method="post" action="#" data-toggle="tooltip"--}}
                {{--                                              title="danh sách học sinh"--}}
                {{--                                              class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                            @csrf--}}
                {{--                                            <button type="submit"--}}
                {{--                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->--}}
                {{--                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                     xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                     width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                     version="1.1">--}}
                {{--                                                    <g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                       fill-rule="evenodd">--}}
                {{--                                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"--}}
                {{--                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"--}}
                {{--                                                            opacity="0.3"/>--}}
                {{--                                                    </g>--}}
                {{--                                                </svg>--}}
                {{--                                                <!--end::Svg Icon-->--}}
                {{--                                            </button>--}}
                {{--                                        </form>--}}
                {{--                                        <a href="#" data-toggle="tooltip"--}}
                {{--                                           title="thông tin điểm danh"--}}
                {{--                                           class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--																<span class="svg-icon svg-icon-md svg-icon-primary">--}}
                {{--																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->--}}
                {{--																	<svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                                         width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                                         version="1.1">--}}
                {{--																		<g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                                           fill-rule="evenodd">--}}
                {{--																			<rect x="0" y="0" width="24" height="24"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"--}}
                {{--                                                                                fill="#000000"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"--}}
                {{--                                                                                fill="#000000" opacity="0.3"/>--}}
                {{--																		</g>--}}
                {{--																	</svg>--}}
                {{--                                                                    <!--end::Svg Icon-->--}}
                {{--																</span>--}}
                {{--                                        </a>--}}
                {{--                                        <a href="#" data-toggle="tooltip"--}}
                {{--                                           title="thông tin"--}}
                {{--                                           class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">--}}
                {{--																<span class="svg-icon svg-icon-md svg-icon-primary">--}}
                {{--																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->--}}
                {{--																	<svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                                         width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                                         version="1.1">--}}
                {{--																		<g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                                           fill-rule="evenodd">--}}
                {{--																			<rect x="0" y="0" width="24" height="24"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"--}}
                {{--                                                                                fill="#000000" fill-rule="nonzero"--}}
                {{--                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"--}}
                {{--                                                                                fill="#000000" fill-rule="nonzero"--}}
                {{--                                                                                opacity="0.3"/>--}}
                {{--																		</g>--}}
                {{--																	</svg>--}}
                {{--                                                                    <!--end::Svg Icon-->--}}
                {{--																</span>--}}
                {{--                                        </a>--}}
                {{--                                        <form class="btn btn-icon btn-light btn-hover-primary btn-sm" method="post"--}}
                {{--                                              action="#"--}}
                {{--                                              data-toggle="tooltip"--}}
                {{--                                              title="xóa">--}}
                {{--                                            @csrf--}}
                {{--                                            @method('DELETE')--}}
                {{--                                            <button type="submit"--}}
                {{--                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->--}}
                {{--                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                     xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                     width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                     version="1.1">--}}
                {{--                                                    <g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                       fill-rule="evenodd">--}}
                {{--                                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"--}}
                {{--                                                            fill="#000000" opacity="0.3"/>--}}
                {{--                                                    </g>--}}
                {{--                                                </svg>--}}
                {{--                                                <!--end::Svg Icon-->--}}
                {{--                                            </button>--}}
                {{--                                        </form>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-footer">--}}
                {{--                        <div class="d-flex justify-content-end">--}}
                {{--                            {!! $teachers->links() !!}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <!--end::Table-->
                <!--begin::Table-->
                {{--                <div class="card card-custom gutter-b table-responsive">--}}
                {{--                    <div class="card-header">--}}
                {{--                        <div class="card-title">--}}
                {{--                            <h3 class="text-uppercase">Danh sách học sinh</h3>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-body">--}}
                {{--                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">--}}
                {{--                            <thead>--}}
                {{--                            <tr class="text-left">--}}
                {{--                                <th class="pl-0" style="width: 20px">--}}
                {{--                                    STT--}}
                {{--                                </th>--}}
                {{--                                <th class="pl-0" style="min-width: 50px"></th>--}}
                {{--                                <th class="text-left" style="min-width: 50px">Họ và tên</th>--}}
                {{--                                <th style="min-width: 100px">Ngày sinh</th>--}}
                {{--                                <th style="min-width: 100px">Email</th>--}}
                {{--                                <th style="min-width: 100px">Số điện thoại</th>--}}
                {{--                                <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>--}}
                {{--                            </tr>--}}
                {{--                            </thead>--}}
                {{--                            <tbody>--}}
                {{--                            @foreach($students as $student)--}}
                {{--                                <tr>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <label class="checkbox checkbox-lg checkbox-inline">--}}
                {{--                                            {{$loop->index + 1}}--}}
                {{--                                        </label>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <div class="symbol symbol-40 symbol-circle symbol-sm">--}}
                {{--                                            <img src="{{asset(($student->avatar != "")?($student->avatar):'media/users/default.jpg')}}" alt="image">--}}
                {{--                                        </div>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                        <a href="#"--}}
                {{--                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst($student->first_name) . ' ' . ucfirst($student->last_name)}}--}}
                {{--                                        </a>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0">--}}
                {{--                                            <span--}}
                {{--                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}--}}
                {{--                                            </span>--}}
                {{--                                    </td>--}}
                {{--                                    <td>--}}
                {{--                                           <span--}}
                {{--                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$student->email}}</span>--}}
                {{--                                    </td>--}}
                {{--                                    <td>--}}
                {{--                                           <span--}}
                {{--                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$student->mobile_number}}</span>--}}
                {{--                                    </td>--}}
                {{--                                    <td class="pr-0 text-right">--}}
                {{--                                        <form method="post" action="#" data-toggle="tooltip"--}}
                {{--                                              title="danh sách học sinh"--}}
                {{--                                              class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                            @csrf--}}
                {{--                                            <button type="submit"--}}
                {{--                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->--}}
                {{--                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                     xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                     width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                     version="1.1">--}}
                {{--                                                    <g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                       fill-rule="evenodd">--}}
                {{--                                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"--}}
                {{--                                                            transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"--}}
                {{--                                                            opacity="0.3"/>--}}
                {{--                                                    </g>--}}
                {{--                                                </svg>--}}
                {{--                                                <!--end::Svg Icon-->--}}
                {{--                                            </button>--}}
                {{--                                        </form>--}}
                {{--                                        <a href="#" data-toggle="tooltip"--}}
                {{--                                           title="thông tin điểm danh"--}}
                {{--                                           class="btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--																<span class="svg-icon svg-icon-md svg-icon-primary">--}}
                {{--																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->--}}
                {{--																	<svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                                         width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                                         version="1.1">--}}
                {{--																		<g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                                           fill-rule="evenodd">--}}
                {{--																			<rect x="0" y="0" width="24" height="24"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"--}}
                {{--                                                                                fill="#000000"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"--}}
                {{--                                                                                fill="#000000" opacity="0.3"/>--}}
                {{--																		</g>--}}
                {{--																	</svg>--}}
                {{--                                                                    <!--end::Svg Icon-->--}}
                {{--																</span>--}}
                {{--                                        </a>--}}
                {{--                                        <a href="#" data-toggle="tooltip"--}}
                {{--                                           title="thông tin"--}}
                {{--                                           class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">--}}
                {{--																<span class="svg-icon svg-icon-md svg-icon-primary">--}}
                {{--																	<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->--}}
                {{--																	<svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                                         width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                                         version="1.1">--}}
                {{--																		<g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                                           fill-rule="evenodd">--}}
                {{--																			<rect x="0" y="0" width="24" height="24"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"--}}
                {{--                                                                                fill="#000000" fill-rule="nonzero"--}}
                {{--                                                                                transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>--}}
                {{--																			<path--}}
                {{--                                                                                d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"--}}
                {{--                                                                                fill="#000000" fill-rule="nonzero"--}}
                {{--                                                                                opacity="0.3"/>--}}
                {{--																		</g>--}}
                {{--																	</svg>--}}
                {{--                                                                    <!--end::Svg Icon-->--}}
                {{--																</span>--}}
                {{--                                        </a>--}}
                {{--                                        <form class="btn btn-icon btn-light btn-hover-primary btn-sm" method="post"--}}
                {{--                                              action="#"--}}
                {{--                                              data-toggle="tooltip"--}}
                {{--                                              title="xóa">--}}
                {{--                                            @csrf--}}
                {{--                                            @method('DELETE')--}}
                {{--                                            <button type="submit"--}}
                {{--                                                    class="svg-icon svg-icon-md svg-icon-primary btn btn-icon btn-light btn-hover-primary btn-sm">--}}
                {{--                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->--}}
                {{--                                                <svg xmlns="http://www.w3.org/2000/svg"--}}
                {{--                                                     xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                {{--                                                     width="24px" height="24px" viewBox="0 0 24 24"--}}
                {{--                                                     version="1.1">--}}
                {{--                                                    <g stroke="none" stroke-width="1" fill="none"--}}
                {{--                                                       fill-rule="evenodd">--}}
                {{--                                                        <rect x="0" y="0" width="24" height="24"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"--}}
                {{--                                                            fill="#000000" fill-rule="nonzero"/>--}}
                {{--                                                        <path--}}
                {{--                                                            d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"--}}
                {{--                                                            fill="#000000" opacity="0.3"/>--}}
                {{--                                                    </g>--}}
                {{--                                                </svg>--}}
                {{--                                                <!--end::Svg Icon-->--}}
                {{--                                            </button>--}}
                {{--                                        </form>--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endforeach--}}
                {{--                            </tbody>--}}
                {{--                        </table>--}}
                {{--                    </div>--}}
                {{--                    <div class="card-footer">--}}
                {{--                        <div class="d-flex justify-content-end">--}}
                {{--                            {!! $students->links() !!}--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <!--end::Table-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
    <script>
        function getListStudent() {
            $.ajax({
                type: 'POST',
                url: '',
            })
        }
    </script>
@endsection
