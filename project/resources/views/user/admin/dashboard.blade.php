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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Bảng tin</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        {{--                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">--}}
                        {{--                            <li class="breadcrumb-item">--}}
                        {{--                                <a href="" class="text-muted">Apps</a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="breadcrumb-item">--}}
                        {{--                                <a href="" class="text-muted">Profile</a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="breadcrumb-item">--}}
                        {{--                                <a href="" class="text-muted">Profile 3</a>--}}
                        {{--                            </li>--}}
                        {{--                        </ul>--}}
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
                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="card-icon col-4">
                                            <i class="flaticon2-avatar text-success font-size-h1"></i>
                                        </div>
                                        <div class="card-label col-8">
                                            <div class="text-success text-sm-left font-size-h6">Học sinh</div>
                                            <div class="text-success text-sm-left font-size-h6">{{$student_count}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="card-icon col-4">
                                            <i class="flaticon2-avatar text-success font-size-h1"></i>
                                        </div>
                                        <div class="card-label col-8">
                                            <div class="text-success text-sm-left font-size-h6">Giáo viên</div>
                                            <div class="text-success text-sm-left font-size-h6">{{$teacher_count}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="card card-custom card-stretch gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="card-icon col-4">
                                            <i class="flaticon2-avatar text-success font-size-h1"></i>
                                        </div>
                                        <div class="card-label col-8">
                                            <div class="text-success text-sm-left font-size-h6">Lớp học</div>
                                            <div class="text-success text-sm-left font-size-h6">{{$course_count}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <!--begin::List Classes-->
                    <div class="col-xxl-4">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Danh sách lớp học</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0 pb-0 mt-2">
                                <div class="tab-content mt-5" id="myTabTables1">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-vertical-center">
                                            <thead>
                                            <tr>
                                                <th class="p-0 w-50px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-100px"></th>
                                                <th class="p-0 min-w-40px"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($courses as $course)
                                                @php
                                                    $total_period = \Illuminate\Support\Facades\DB::table('course_schedules')->where('course_id', '=', $course->course_id)->count('course_id');
                                                    $learned_period = \Illuminate\Support\Facades\DB::table('course_schedules')->where('course_id', '=', $course->course_id)->where('start_at', '<', \Carbon\Carbon::now())->count('course_id');
                                                @endphp
                                                <tr>
                                                    <th class="pl-0 py-5">
                                                        <div class="symbol symbol-50 symbol-light mr-2">
																						<span class="symbol-label">
																							<img
                                                                                                src="{{asset('media/svg/misc/005-bebo.svg')}}"
                                                                                                class="h-50 align-self-center"
                                                                                                alt=""/>
																						</span>
                                                        </div>
                                                    </th>
                                                    <td class="py-6 pl-0">
                                                        <a href="{{route('users.coursesDetails',$course)}}"
                                                           class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$course->course_name}}</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">{{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' '.ucwords(\App\Models\User::find($course->teacher_id)->last_name)}}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column w-100 mr-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <span
                                                                    class="text-muted mr-2 font-size-sm font-weight-bold">{{round($learned_period /$total_period * 100)}}%</span>
                                                                <span class="text-muted font-size-sm font-weight-bold">Tiến độ</span>
                                                            </div>
                                                            <div class="progress progress-xs w-100">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: {{round($learned_period /$total_period * 100)}}%;"
                                                                     aria-valuenow="{{round($learned_period /$total_period * 100)}}"
                                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="{{route('users.coursesDetails',$course)}}"
                                                           class="btn btn-icon btn-light btn-sm">
																						<span
                                                                                            class="svg-icon svg-icon-md svg-icon-success">
																							<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																							<svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                width="24px"
                                                                                                height="24px"
                                                                                                viewBox="0 0 24 24"
                                                                                                version="1.1">
																								<g stroke="none"
                                                                                                   stroke-width="1"
                                                                                                   fill="none"
                                                                                                   fill-rule="evenodd">
																									<polygon
                                                                                                        points="0 0 24 0 24 24 0 24"/>
																									<rect fill="#000000"
                                                                                                          opacity="0.3"
                                                                                                          transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                                          x="11" y="5"
                                                                                                          width="2"
                                                                                                          height="14"
                                                                                                          rx="1"/>
																									<path
                                                                                                        d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                                                        fill="#000000"
                                                                                                        fill-rule="nonzero"
                                                                                                        transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
																								</g>
																							</svg>
                                                                                            <!--end::Svg Icon-->
																						</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::List Classes-->
                    <!--begin::List Classes-->
                    <div class="col-xxl-4">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Thời khóa biểu</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Môn học trong hôm nay
                                    </span>
                                </h3>
                                <div class="card-toolbar">
                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                        <li class="nav-item ml-0">
                                            <a class="nav-link py-2 px-4 font-weight-bolder" data-toggle="tab"
                                               href="#kt_tab_pane_9_1">Hôm nay</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active font-weight-bolder" data-toggle="tab"
                                               href="#kt_tab_pane_9_2">Ngày mai</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables9">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_9_1" role="tabpanel"
                                         aria-labelledby="kt_tab_pane_9_1">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-130px min-w-lg-100px w-100"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
                                                @foreach($today_courses as $course)
                                                    <tr>
                                                        <td class="pl-0 py-5">
                                                            <div class="symbol symbol-45 symbol-light mr-2">
                                                                <span class="symbol-label">
                                                                    <span
                                                                        class="svg-icon svg-icon-2x">
                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                                                        <svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            width="24px"
                                                                            height="24px"
                                                                            viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none"
                                                                               stroke-width="1"
                                                                               fill="none"
                                                                               fill-rule="evenodd">
                                                                                <rect x="0"
                                                                                      y="0"
                                                                                      width="24"
                                                                                      height="24"/>
                                                                                <path
                                                                                    d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                                    fill="#000000"
                                                                                    fill-rule="nonzero"/>
                                                                                <circle
                                                                                    fill="#000000"
                                                                                    opacity="0.3"
                                                                                    cx="12"
                                                                                    cy="10"
                                                                                    r="6"/>
                                                                            </g>
                                                                        </svg>
                                                                        <!--end::Svg Icon-->
                                                                    </span>
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($course->course_id)->course_name}}</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">{{ucwords(\App\Models\User::find(\App\Models\Course::find($course->course_id)->teacher_id)->first_name) .' '. ucwords(\App\Models\User::find(\App\Models\Course::find($course->course_id)->teacher_id)->last_name) }}</span>
                                                        </td>
                                                        <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($course->start_at)->format('H:i') . '-' . \Carbon\Carbon::parse($course->end_at)->format('H:i') }}</span>
                                                            <span
                                                                class="text-muted font-weight-bold d-block font-size-sm">Thời gian</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_tab_pane_9_2" role="tabpanel"
                                         aria-labelledby="kt_tab_pane_9_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-130px min-w-lg-100px w-100"></th>
                                                    <th class="p-0 min-w-105px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
                                                @foreach($tomorrow_courses as $course)
                                                    <tr>
                                                        <td class="pl-0 py-5">
                                                            <div class="symbol symbol-45 symbol-light mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
																								<svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    width="24px"
                                                                                                    height="24px"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    version="1.1">
																									<g stroke="none"
                                                                                                       stroke-width="1"
                                                                                                       fill="none"
                                                                                                       fill-rule="evenodd">
																										<rect x="0"
                                                                                                              y="0"
                                                                                                              width="24"
                                                                                                              height="24"/>
																										<path
                                                                                                            d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"/>
																										<circle
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            cx="12"
                                                                                                            cy="10"
                                                                                                            r="6"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                            </div>
                                                        </td>
                                                        <td class="pl-0">
                                                            <a href="#"
                                                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($course->course_id)->course_name}}</a>
                                                            <span
                                                                class="text-muted font-weight-bold d-block">{{ucwords(\App\Models\User::find(\App\Models\Course::find($course->course_id)->teacher_id)->first_name) .' '. ucwords(\App\Models\User::find(\App\Models\Course::find($course->course_id)->teacher_id)->last_name) }}</span>
                                                        </td>
                                                        <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($course->start_at)->format('H:i') . '-' . \Carbon\Carbon::parse($course->end_at)->format('H:i') }}</span>
                                                            <span
                                                                class="text-muted font-weight-bold d-block font-size-sm">Thời gian</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <!--end::List Classes-->
                    <!--begin::List Classes-->
                    <div class="col-xxl-4">
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Thông báo</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <!--begin::Thead-->
                                        <thead>
                                        <tr>
                                            <th class="pl-0 w-50px"></th>
                                            <th class="p-0 w-100px min-w-100px"></th>
                                            <th class="p-0 w-70px"></th>
                                        </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody>
                                        @forelse($notifications as $notification)
                                            <tr>
                                                <td class="pl-0 pt-0">
                                                    <div class="symbol symbol-45 symbol-light-success mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-success">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Media/Playlist1.svg-->
																								<svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                                    width="24px"
                                                                                                    height="24px"
                                                                                                    viewBox="0 0 24 24"
                                                                                                    version="1.1">
																									<g stroke="none"
                                                                                                       stroke-width="1"
                                                                                                       fill="none"
                                                                                                       fill-rule="evenodd">
																										<rect x="0"
                                                                                                              y="0"
                                                                                                              width="24"
                                                                                                              height="24"/>
																										<path
                                                                                                            d="M8.97852058,18.8007059 C8.80029331,20.0396328 7.53473012,21 6,21 C4.34314575,21 3,19.8807119 3,18.5 C3,17.1192881 4.34314575,16 6,16 C6.35063542,16 6.68722107,16.0501285 7,16.1422548 L7,5.93171093 C7,5.41893942 7.31978104,4.96566617 7.78944063,4.81271925 L13.5394406,3.05418311 C14.2638626,2.81827161 15,3.38225531 15,4.1731748 C15,4.95474642 15,5.54092513 15,5.93171093 C15,6.51788965 14.4511634,6.89225606 14,7 C13.3508668,7.15502181 11.6842001,7.48835515 9,8 L9,18.5512168 C9,18.6409956 8.9927193,18.7241187 8.97852058,18.8007059 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"/>
																										<path
                                                                                                            d="M16,9 L20,9 C20.5522847,9 21,9.44771525 21,10 C21,10.5522847 20.5522847,11 20,11 L16,11 C15.4477153,11 15,10.5522847 15,10 C15,9.44771525 15.4477153,9 16,9 Z M14,13 L20,13 C20.5522847,13 21,13.4477153 21,14 C21,14.5522847 20.5522847,15 20,15 L14,15 C13.4477153,15 13,14.5522847 13,14 C13,13.4477153 13.4477153,13 14,13 Z M14,17 L20,17 C20.5522847,17 21,17.4477153 21,18 C21,18.5522847 20.5522847,19 20,19 L14,19 C13.4477153,19 13,18.5522847 13,18 C13,17.4477153 13.4477153,17 14,17 Z"
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                    </div>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$notification->data['user_name']}}
                                                    </a>
                                                    <span
                                                        class="text-muted font-weight-bold d-block">{{$notification->data['message']}}</span>
                                                </td>
                                                <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-sm">{{\Carbon\Carbon::parse($notification->created_at)->format('d-m-Y H:i')}}</span>
                                                    <span
                                                        class="text-muted font-weight-bold d-block font-size-sm">Thời gian</span>
                                                </td>
                                            </tr>
                                        @empty
                                            không có thông báo mới
                                        @endforelse
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::List Classes-->
            <div class="row">
                <div class="col-12">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">
                                    Thời khóa biểu cá nhân
                                </h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="kt_calendar"></div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="{{asset('js/external-events.js')}}"></script>
    <script>
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
                                'title': '{{\App\Models\Course::find($item->course_id)->course_name}}',
                                'start': '{{\Carbon\Carbon::parse($item->start_at)->format('Y-m-d h:i:s')}}',
                                'end': '{{\Carbon\Carbon::parse($item->end_at)->format('Y-m-d h:i:s')}}',
                                {{--                                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')--}}
                                {{--                                'url': '{{route('admin.listAttendance',$item)}}'--}}
                                {{--                                @endif--}}
                            },
                            @endforeach
                        ],

                        eventClick: function (event) {
                            if (event.url) {
                                window.open(event.url);
                                return false;
                            }
                        },
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
