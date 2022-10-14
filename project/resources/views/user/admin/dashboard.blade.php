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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
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
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Actions-->
                    <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
                    <!--end::Actions-->
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions"
                         data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
											<span class="svg-icon svg-icon-success svg-icon-2x">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<path
                                                            d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
														<path
                                                            d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                                            fill="#000000"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">
                                <li class="navi-header font-weight-bold py-4">
                                    <span class="font-size-lg">Choose Label:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                       data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span
                                                                class="label label-xl label-inline label-light-success">Customer</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span
                                                                class="label label-xl label-inline label-light-danger">Partner</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span
                                                                class="label label-xl label-inline label-light-warning">Suplier</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span
                                                                class="label label-xl label-inline label-light-primary">Member</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-text">
															<span class="label label-xl label-inline label-light-dark">Staff</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer py-4">
                                    <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                        <i class="ki ki-plus icon-sm"></i>Add new</a>
                                </li>
                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-sm-6 col-12">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <div class="card-icon col-4">
                                        <i class="flaticon2-avatar text-success font-size-h1"></i>
                                    </div>
                                    <div class="card-label col-8">
                                        <div class="text-success text-sm-left font-size-h6">Students</div>
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
                                        <div class="text-success text-sm-left font-size-h6">Teachers</div>
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
                                        <div class="text-success text-sm-left font-size-h6">Courses</div>
                                        <div class="text-success text-sm-left font-size-h6">{{$course_count}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                                <tr>
                                                    <th class="pl-0 py-5">
                                                        <div class="symbol symbol-50 symbol-light mr-2">
																						<span class="symbol-label">
																							<img
                                                                                                src="assets/media/svg/misc/005-bebo.svg"
                                                                                                class="h-50 align-self-center"
                                                                                                alt=""/>
																						</span>
                                                        </div>
                                                    </th>
                                                    <td class="py-6 pl-0">
                                                        <a href="#"
                                                           class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$course->course_name}}</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">Best Customers</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column w-100 mr-2">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-2">
                                                                <span
                                                                    class="text-muted mr-2 font-size-sm font-weight-bold">71%</span>
                                                                <span class="text-muted font-size-sm font-weight-bold">Progress</span>
                                                            </div>
                                                            <div class="progress progress-xs w-100">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                     style="width: 71%;" aria-valuenow="50"
                                                                     aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                               href="#kt_tab_pane_9_1">Tomorrow</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active font-weight-bolder" data-toggle="tab"
                                               href="#kt_tab_pane_9_2">Today</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables9">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_tab_pane_9_1" role="tabpanel"
                                         aria-labelledby="kt_tab_pane_9_1">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-130px min-w-lg-100px w-100"></th>
                                                    <th class="p-0 min-w-105px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Geography</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Zoey Dylan</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">10:20 - 12:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-warning mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-warning">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
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
                                                                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                                            fill="#000000"/>
																										<rect
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                                            x="16.3255682"
                                                                                                            y="2.94551858"
                                                                                                            width="3"
                                                                                                            height="18"
                                                                                                            rx="1"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">History</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Luke Owen</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">13:20 - 14:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-info mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-info">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg-->
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
                                                                                                            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3"/>
																										<circle
                                                                                                            fill="#000000"
                                                                                                            cx="12"
                                                                                                            cy="9"
                                                                                                            r="5"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Drawing</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Ellie Cole</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">14:20 - 15:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 pt-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-primary mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-primary">
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
                                                           class="text-muted font-weight-bolder text-hover-primary mb-1 font-size-lg">Angular
                                                            Version</a>
                                                        <span
                                                            class="text-dark-25 font-weight-bold d-block">By Rose Liam</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-muted font-weight-bolder d-block font-size-lg">9:20 - 10:00</span>
                                                        <span
                                                            class="text-dark-25 font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-danger mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-danger">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
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
																										<rect
                                                                                                            fill="#000000"
                                                                                                            x="4" y="4"
                                                                                                            width="7"
                                                                                                            height="7"
                                                                                                            rx="1.5"/>
																										<path
                                                                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Maths</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Tom Gere</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">10:20 - 11:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_9_2" role="tabpanel"
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
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
                                                <tr>
                                                    <td class="pl-0 pt-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x">
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
                                                           class="text-muted font-weight-bolder text-hover-primary mb-1 font-size-lg">Angular
                                                            Version</a>
                                                        <span
                                                            class="text-dark-25 font-weight-bold d-block">By Rose Liam</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-muted font-weight-bolder d-block font-size-lg">9:20 - 10:00</span>
                                                        <span
                                                            class="text-dark-25 font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-danger mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-danger">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
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
																										<rect
                                                                                                            fill="#000000"
                                                                                                            x="4" y="4"
                                                                                                            width="7"
                                                                                                            height="7"
                                                                                                            rx="1.5"/>
																										<path
                                                                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Maths</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Tom Gere</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">10:20 - 11:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-primary mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-primary">
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Geography</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Zoey Dylan</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">10:20 - 12:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-warning mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-warning">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
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
                                                                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                                            fill="#000000"/>
																										<rect
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                                            x="16.3255682"
                                                                                                            y="2.94551858"
                                                                                                            width="3"
                                                                                                            height="18"
                                                                                                            rx="1"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">History</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Luke Owen</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">13:20 - 14:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-info mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-info">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg-->
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
                                                                                                            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3"/>
																										<circle
                                                                                                            fill="#000000"
                                                                                                            cx="12"
                                                                                                            cy="9"
                                                                                                            r="5"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Drawing</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Ellie Cole</span>
                                                    </td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">14:20 - 15:00</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                    <span class="card-label font-weight-bolder text-dark">Upcoming Events</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">Next Event is in
															<span class="text-primary">9 days</span></span>
                                </h3>
                                <div class="card-toolbar">
                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 font-weight-bolder" data-toggle="tab"
                                               href="#kt_tab_pane_10_1">Tomorrow</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active font-weight-bolder" data-toggle="tab"
                                               href="#kt_tab_pane_10_2">Today</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2 pb-0 mt-n3">
                                <div class="tab-content mt-5" id="myTabTables10">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_tab_pane_10_1" role="tabpanel"
                                         aria-labelledby="kt_tab_pane_10_1">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 w-100 min-w-100px"></th>
                                                    <th class="p-0"></th>
                                                    <th class="p-0 min-w-130px w-100"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-info mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-info">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg-->
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
                                                                                                            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3"/>
																										<circle
                                                                                                            fill="#000000"
                                                                                                            cx="12"
                                                                                                            cy="9"
                                                                                                            r="5"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">The
                                                            School Art Leads</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Ellie Cole</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-warning mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-warning">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
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
                                                                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                                            fill="#000000"/>
																										<rect
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                                            x="16.3255682"
                                                                                                            y="2.94551858"
                                                                                                            width="3"
                                                                                                            height="18"
                                                                                                            rx="1"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Napoleon
                                                            Days</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Luke Owen</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-primary mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-primary">
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Who
                                                            Knows Geography</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Zoey Dylan</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-danger mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-danger">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
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
																										<rect
                                                                                                            fill="#000000"
                                                                                                            x="4" y="4"
                                                                                                            width="7"
                                                                                                            height="7"
                                                                                                            rx="1.5"/>
																										<path
                                                                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Maths
                                                            Championship</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Tom Gere</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">25 Oct, 10:05PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 pt-0 py-5">
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">School
                                                            Music Festival</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Rose Liam</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_tab_pane_10_2" role="tabpanel"
                                         aria-labelledby="kt_tab_pane_10_2">
                                        <!--begin::Table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-vertical-center">
                                                <!--begin::Thead-->
                                                <thead>
                                                <tr>
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 w-100 min-w-100px"></th>
                                                    <th class="p-0"></th>
                                                    <th class="p-0 min-w-130px w-100"></th>
                                                </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody>
                                                <tr>
                                                    <td class="pl-0 pt-0 py-5">
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">School
                                                            Music Festival</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Rose Liam</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-danger mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-danger">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
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
																										<rect
                                                                                                            fill="#000000"
                                                                                                            x="4" y="4"
                                                                                                            width="7"
                                                                                                            height="7"
                                                                                                            rx="1.5"/>
																										<path
                                                                                                            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Maths
                                                            Championship</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Tom Gere</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">25 Oct, 10:05PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-primary mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-primary">
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
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Who
                                                            Knows Geography</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Zoey Dylan</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-warning mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-warning">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
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
                                                                                                            d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                                            fill="#000000"/>
																										<rect
                                                                                                            fill="#000000"
                                                                                                            opacity="0.3"
                                                                                                            transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                                            x="16.3255682"
                                                                                                            y="2.94551858"
                                                                                                            width="3"
                                                                                                            height="18"
                                                                                                            rx="1"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Napoleon
                                                            Days</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Luke Owen</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                                                <tr>
                                                    <td class="pl-0 py-5">
                                                        <div class="symbol symbol-45 symbol-light-info mr-2">
																						<span class="symbol-label">
																							<span
                                                                                                class="svg-icon svg-icon-2x svg-icon-info">
																								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Color-profile.svg-->
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
                                                                                                            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                                                                            fill="#000000"
                                                                                                            fill-rule="nonzero"
                                                                                                            opacity="0.3"/>
																										<circle
                                                                                                            fill="#000000"
                                                                                                            cx="12"
                                                                                                            cy="9"
                                                                                                            r="5"/>
																									</g>
																								</svg>
                                                                                                <!--end::Svg Icon-->
																							</span>
																						</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">The
                                                            School Art Leads</a>
                                                        <span
                                                            class="text-muted font-weight-bold d-block">By Ellie Cole</span>
                                                    </td>
                                                    <td></td>
                                                    <td class="text-left">
                                                        <span
                                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">03 Sep, 4:20PM</span>
                                                        <span class="text-muted font-weight-bold d-block font-size-sm">Time</span>
                                                    </td>
                                                    <td class="text-right pr-0">
                                                        <a href="#" class="btn btn-icon btn-light btn-sm">
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
                </div>
                <div class="row">
                    <div class="col-12">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        Thông tin điểm danh
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
    <script src="{{asset('js/pages/widgets.js')}}"></script>

    {{--    <script type="text/javascript">--}}
    {{--        $(document).ready(function () {--}}
    {{--            function showCurrentTime() {--}}
    {{--                var today = new Date();--}}
    {{--                var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();--}}
    {{--                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();--}}
    {{--                var dateTime = date + ' ' + time;--}}
    {{--                document.getElementById('current_time').innerHTML = dateTime--}}
    {{--            }--}}

    {{--            setInterval(showCurrentTime, 1000);--}}
    {{--        })--}}
    {{--    </script>--}}
    <script src="{{asset('plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
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
                        events: [],

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
