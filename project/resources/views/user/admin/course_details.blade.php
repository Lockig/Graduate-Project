@extends('layout.layout')


@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Projects</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">690 Total</span>
                        <form class="ml-5">
                            <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                                <input type="text" class="form-control" id="kt_subheader_search_form"
                                       placeholder="Search..."/>
                                <div class="input-group-append">
													<span class="input-group-text">
														<span class="svg-icon">
															<!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
															<svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                                 height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"/>
																	<path
                                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                        fill="#000000" fill-rule="nonzero"
                                                                        opacity="0.3"/>
																	<path
                                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                        fill="#000000" fill-rule="nonzero"/>
																</g>
															</svg>
                                                            <!--end::Svg Icon-->
														</span>
                                                        <!--<i class="flaticon2-search-1 icon-sm"></i>-->
													</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--end::Search Form-->
                    <!--begin::Group Actions-->
                    <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                        <div class="text-dark-50 font-weight-bold">
                            <span id="kt_subheader_group_selected_rows">23</span>Selected:
                        </div>
                        <div class="d-flex ml-6">
                            <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                                <button type="button"
                                        class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle"
                                        data-toggle="dropdown">Update Status
                                </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                                    <ul class="navi navi-hover pt-3 pb-4">
                                        <li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                            Change status to:
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
																<span class="navi-text">
																	<span
                                                                        class="label label-light-success label-inline font-weight-bold">Approved</span>
																</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
																<span class="navi-text">
																	<span
                                                                        class="label label-light-danger label-inline font-weight-bold">Rejected</span>
																</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
																<span class="navi-text">
																	<span
                                                                        class="label label-light-warning label-inline font-weight-bold">Pending</span>
																</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
																<span class="navi-text">
																	<span
                                                                        class="label label-light-info label-inline font-weight-bold">On Hold</span>
																</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-light-success font-weight-bolder btn-sm mr-2"
                                    id="kt_subheader_group_actions_fetch" data-toggle="modal"
                                    data-target="#kt_datatable_records_fetch_modal">Fetch Selected
                            </button>
                            <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2"
                                    id="kt_subheader_group_actions_delete_all">Delete All
                            </button>
                        </div>
                    </div>
                    <!--end::Group Actions-->
                </div>
                <!--end::Details-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="#" class=""></a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <a href="custom/apps/projects/add-project.html" class="btn btn-light-primary font-weight-bold ml-2">Edit
                        Project</a>
                    <!--end::Button-->
                    <!--begin::Dropdown-->
                    <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions"
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
                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                            <!--begin::Naviigation-->
                            <ul class="navi">
                                <li class="navi-header font-weight-bold py-5">
                                    <span class="font-size-lg">Add New:</span>
                                    <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                       data-placement="right" title="Click to learn more..."></i>
                                </li>
                                <li class="navi-separator mb-3 opacity-70"></li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-shopping-cart-1"></i>
														</span>
                                        <span class="navi-text">Order</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-calendar-8"></i>
														</span>
                                        <span class="navi-text">Members</span>
                                        <span class="navi-label">
															<span
                                                                class="label label-light-danger label-rounded font-weight-bold">3</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-telegram-logo"></i>
														</span>
                                        <span class="navi-text">Project</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="navi-icon flaticon2-new-email"></i>
														</span>
                                        <span class="navi-text">Record</span>
                                        <span class="navi-label">
															<span
                                                                class="label label-light-success label-rounded font-weight-bold">5</span>
														</span>
                                    </a>
                                </li>
                                <li class="navi-separator mt-3 opacity-70"></li>
                                <li class="navi-footer pt-5 pb-4">
                                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More options</a>
                                    <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#"
                                       data-toggle="tooltip" data-placement="right" title="Click to learn more...">Learn
                                        more</a>
                                </li>
                            </ul>
                            <!--end::Naviigation-->
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
            <div class="container-fluid">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="assets/media/project-logos/3.png"/>
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
                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#"
                                               class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                                            fill="#000000"/>
																		<circle fill="#000000" opacity="0.3" cx="19.5"
                                                                                cy="17.5" r="2.5"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>jason@siastudio.com</a>
                                            <a href="#"
                                               class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<mask fill="white">
																			<use xlink:href="#path-1"/>
																		</mask>
																		<g/>
																		<path
                                                                            d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>PR Manager</a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold">
															<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path
                                                                            d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                                            fill="#000000"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>Melbourne</a>
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <div class="my-lg-0 my-1">
                                        <a href="#"
                                           class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Reports</a>
                                        <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">New
                                            Task</a>
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
                                            <span class="font-weight-bold">Progress</span>
                                            <div class="progress progress-xs mt-2 mb-2">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 63%;" aria-valuenow="50" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-weight-bolder text-dark">78%</span>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Content-->
                            </div>
                            <!--end: Info-->
                        </div>
                        <div class="separator separator-solid my-7"></div>
                        <!--begin: Items-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin: Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
												<span class="mr-4">
													<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Giáo viên</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        {{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' ' . ucwords(\App\Models\User::find($course->teacher_id)->last_name)}}</span>
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
                                    <span class="font-weight-bolder font-size-sm">Trạng thái</span>
                                    <span class="font-weight-bolder font-size-h5">
                                        {{ucfirst($course->course_status)}}</span>
                                </div>
                            </div>
                            <!--end: Item-->
                        </div>
                        <!--begin: Items-->
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Row-->
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
                                <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>
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
                                            <img src="{{asset(($student->avatar != "")?($student->avatar):'media/users/default.jpg')}}" alt="image">
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
                                    <td class="pr-0 text-right">
                                        <form method="post" action="#" data-toggle="tooltip"
                                              title="danh sách học sinh"
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
                                        <a href="#" data-toggle="tooltip"
                                           title="thông tin điểm danh"
                                           class="btn btn-icon btn-light btn-hover-primary btn-sm">
																<span class="svg-icon svg-icon-md svg-icon-primary">
																	<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
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
                                        <a href="#" data-toggle="tooltip"
                                           title="thông tin"
                                           class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																<span class="svg-icon svg-icon-md svg-icon-primary">
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
																</span>
                                        </a>
                                        <form class="btn btn-icon btn-light btn-hover-primary btn-sm" method="post"
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
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Advance Table Widget 3-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 py-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">New Arrivals</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-success font-weight-bolder font-size-sm">
													<span class="svg-icon svg-icon-md svg-icon-white">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<polygon points="0 0 24 0 24 24 0 24"/>
																<path
                                                                    d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<path
                                                                    d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                    fill="#000000" fill-rule="nonzero"/>
															</g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>Add New Member</a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0 pb-3">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table
                                        class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                        <tr class="text-uppercase">
                                            <th style="min-width: 250px" class="pl-7">
                                                <span class="text-dark-75">products</span>
                                            </th>
                                            <th style="min-width: 100px">pruce</th>
                                            <th style="min-width: 100px">deposit</th>
                                            <th style="min-width: 150px">agent</th>
                                            <th style="min-width: 130px">status</th>
                                            <th style="min-width: 120px"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label"
                                                             style="background-image: url('assets/media/stock-600x400/img-26.jpg')"></div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Sant
                                                            Extreanet Solution</a>
                                                        <span class="text-muted font-weight-bold d-block">HTML, JS, ReactJS</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$2,790</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="text-dark-75 font-weight-bolder d-block font-size-lg">$520</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Bradly Beal</span>
                                                <span class="text-muted font-weight-bold">Insurance</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="label label-lg label-light-primary label-inline">Approved</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <a href="#"
                                                   class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"/>
																					<path
                                                                                        d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                                        fill="#000000"/>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<polygon
                                                                                        points="0 0 24 0 24 24 0 24"/>
																					<rect fill="#000000" opacity="0.3"
                                                                                          transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                          x="11" y="5" width="2"
                                                                                          height="14" rx="1"/>
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
                                            <td class="pl-0 py-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label"
                                                             style="background-image: url('assets/media/stock-600x400/img-3.jpg')"></div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Telegram
                                                            Development</a>
                                                        <span class="text-muted font-weight-bold d-block">C#, ASP.NET, MS SQL</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$4,600</span>
                                                <span class="text-muted font-weight-bold">Pending</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$1,600</span>
                                                <span class="text-muted font-weight-bold">Rejected</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Chris Thompson</span>
                                                <span class="text-muted font-weight-bold">NBA Player</span>
                                            </td>
                                            <td>
                                                <span class="label label-lg label-light-warning label-inline">In Progress</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <a href="#"
                                                   class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"/>
																					<path
                                                                                        d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                                        fill="#000000"/>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<polygon
                                                                                        points="0 0 24 0 24 24 0 24"/>
																					<rect fill="#000000" opacity="0.3"
                                                                                          transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                          x="11" y="5" width="2"
                                                                                          height="14" rx="1"/>
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
                                            <td class="pl-0 py-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label"
                                                             style="background-image: url('assets/media/stock-600x400/img-5.jpg')"></div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">Payroll
                                                            Application</a>
                                                        <span class="text-muted font-weight-bold d-block">PHP, Laravel, VueJS</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$23,800</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$6,700</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Zoey McGee</span>
                                                <span class="text-muted font-weight-bold">Ruby Developer</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="label label-lg label-light-success label-inline">Success</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <a href="#"
                                                   class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"/>
																					<path
                                                                                        d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                                        fill="#000000"/>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<polygon
                                                                                        points="0 0 24 0 24 24 0 24"/>
																					<rect fill="#000000" opacity="0.3"
                                                                                          transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                          x="11" y="5" width="2"
                                                                                          height="14" rx="1"/>
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
                                            <td class="pl-0 py-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label"
                                                             style="background-image: url('assets/media/stock-600x400/img-18.jpg')"></div>
                                                    </div>
                                                    <div>
                                                        <a href="#"
                                                           class="text-dark font-weight-bolder text-hover-primary mb-1 font-size-lg">HR
                                                            Management System</a>
                                                        <span class="text-muted font-weight-bold d-block">Python, PostgreSQL, ReactJS</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$57,000</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">$14,000</span>
                                                <span class="text-muted font-weight-bold">Paid</span>
                                            </td>
                                            <td>
                                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Brandon Ingram</span>
                                                <span class="text-muted font-weight-bold">NBA Player</span>
                                            </td>
                                            <td>
                                                <span
                                                    class="label label-lg label-light-danger label-inline">Rejected</span>
                                            </td>
                                            <td class="text-right pr-0">
                                                <a href="#"
                                                   class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24"
                                                                                          height="24"/>
																					<path
                                                                                        d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z"
                                                                                        fill="#000000"/>
																				</g>
																			</svg>
                                                                            <!--end::Svg Icon-->
																		</span>
                                                </a>
                                                <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span
                                                                            class="svg-icon svg-icon-md svg-icon-primary">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg"
                                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                 width="24px" height="24px"
                                                                                 viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1"
                                                                                   fill="none" fill-rule="evenodd">
																					<polygon
                                                                                        points="0 0 24 0 24 24 0 24"/>
																					<rect fill="#000000" opacity="0.3"
                                                                                          transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)"
                                                                                          x="11" y="5" width="2"
                                                                                          height="14" rx="1"/>
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
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 3-->
                    </div>
                    <div class="col-lg-12">
                        <!--begin::Charts Widget 3-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header h-auto border-0">
                                <div class="card-title py-5">
                                    <h3 class="card-label">
                                        <span class="d-block text-dark font-weight-bolder">Recent Orders</span>
                                        <span
                                            class="d-block text-muted mt-2 font-size-sm">More than 500+ new orders</span>
                                    </h3>
                                </div>
                                <div class="card-toolbar">
                                    <ul class="nav nav-pills nav-pills-sm nav-dark-75" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4" data-toggle="tab"
                                               href="#kt_charts_widget_2_chart_tab_1">
                                                <span class="nav-text font-size-sm">Month</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4" data-toggle="tab"
                                               href="#kt_charts_widget_2_chart_tab_2">
                                                <span class="nav-text font-size-sm">Week</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link py-2 px-4 active" data-toggle="tab"
                                               href="#kt_charts_widget_2_chart_tab_3">
                                                <span class="nav-text font-size-sm">Day</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <div id="kt_charts_widget_3_chart"></div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 3-->
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-4">
                        <!--begin::List Widget 14-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">Market Leaders</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header font-weight-bold py-4">
                                                    <span class="font-size-lg">Choose Label:</span>
                                                    <i class="flaticon2-information icon-md text-muted"
                                                       data-toggle="tooltip" data-placement="right"
                                                       title="Click to learn more..."></i>
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
																			<span
                                                                                class="label label-xl label-inline label-light-dark">Staff</span>
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
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-2">
                                <!--begin::Item-->
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="symbol-label"
                                             style="background-image: url('assets/media/stock-600x400/img-17.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup
                                            &amp; Green</a>
                                        <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                        <span class="text-muted font-weight-bold font-size-sm">Created by:
														<span class="text-primary font-weight-bold">CoreAd</span></span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center py-lg-0 py-2">
                                        <div class="d-flex flex-column text-right">
                                            <span class="text-dark-75 font-weight-bolder font-size-h4">24,900</span>
                                            <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                <!--begin: Item-->
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="symbol-label"
                                             style="background-image: url('assets/media/stock-600x400/img-10.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Yellow
                                            Background</a>
                                        <span class="text-muted font-weight-bold font-size-sm my-1">Strong abstract concept</span>
                                        <span class="text-muted font-weight-bold font-size-sm">Created by:
														<span
                                                            class="text-primary font-weight-bold">KeenThemes</span></span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center py-lg-0 py-2">
                                        <div class="d-flex flex-column text-right">
                                            <span class="text-dark-75 font-weight-bolder font-size-h4">70,380</span>
                                            <span class="text-muted font-weight-bolder font-size-sm">votes</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end: Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="symbol-label"
                                             style="background-image: url('assets/media/stock-600x400/img-1.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 pr-3">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Nike
                                            &amp; Blue</a>
                                        <span
                                            class="text-muted font-weight-bold font-size-sm my-1">Footwear overalls</span>
                                        <span class="text-muted font-weight-bold font-size-sm">Created by:
														<span class="text-primary font-weight-bold">Invision Inc.</span></span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center py-lg-0 py-2">
                                        <div class="d-flex flex-column text-right">
                                            <span class="text-dark-75 font-size-h4 font-weight-bolder">7,200</span>
                                            <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-wrap align-items-center mb-10">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="symbol-label"
                                             style="background-image: url('assets/media/stock-600x400/img-9.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Desserts
                                            platter</a>
                                        <span class="text-muted font-size-sm font-weight-bold my-1">Food trends &amp; reviews</span>
                                        <span class="text-muted font-size-sm font-weight-bold">Created by:
														<span class="text-primary font-weight-bold">Figma Studio</span></span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center py-lg-0 py-2">
                                        <div class="d-flex flex-column text-right">
                                            <span class="text-dark-75 font-size-h4 font-weight-bolder">36,450</span>
                                            <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-wrap align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60 symbol-2by3 flex-shrink-0 mr-4">
                                        <div class="symbol-label"
                                             style="background-image: url('assets/media/stock-600x400/img-12.jpg')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">Cup
                                            &amp; Green</a>
                                        <span class="text-muted font-weight-bold font-size-sm my-1">Local, clean &amp; environmental</span>
                                        <span class="text-muted font-weight-bold font-size-sm">Created by:
														<span class="text-primary font-weight-bold">CoreAd</span></span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Info-->
                                    <div class="d-flex align-items-center py-lg-0 py-2">
                                        <div class="d-flex flex-column text-right">
                                            <span class="text-dark-75 font-weight-bolder font-size-h4">23,900</span>
                                            <span class="text-muted font-size-sm font-weight-bolder">votes</span>
                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 14-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::Charts Widget 1-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header h-auto border-0">
                                <!--begin::Title-->
                                <div class="card-title py-5">
                                    <h3 class="card-label">
                                        <span class="d-block text-dark font-weight-bolder">Recent Stats</span>
                                        <span
                                            class="d-block text-muted mt-2 font-size-sm">More than 400+ new members</span>
                                    </h3>
                                </div>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-hor"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                            <!--begin::Naviigation-->
                                            <ul class="navi">
                                                <li class="navi-header font-weight-bold py-5">
                                                    <span class="font-size-lg">Add New:</span>
                                                    <i class="flaticon2-information icon-md text-muted"
                                                       data-toggle="tooltip" data-placement="right"
                                                       title="Click to learn more..."></i>
                                                </li>
                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-calendar-8"></i>
																		</span>
                                                        <span class="navi-text">Members</span>
                                                        <span class="navi-label">
																			<span
                                                                                class="label label-light-danger label-rounded font-weight-bold">3</span>
																		</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-telegram-logo"></i>
																		</span>
                                                        <span class="navi-text">Project</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="navi-icon flaticon2-new-email"></i>
																		</span>
                                                        <span class="navi-text">Record</span>
                                                        <span class="navi-label">
																			<span
                                                                                class="label label-light-success label-rounded font-weight-bold">5</span>
																		</span>
                                                    </a>
                                                </li>
                                                <li class="navi-separator mt-3 opacity-70"></li>
                                                <li class="navi-footer pt-5 pb-4">
                                                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="#">More
                                                        options</a>
                                                    <a class="btn btn-clean font-weight-bold btn-sm d-none" href="#"
                                                       data-toggle="tooltip" data-placement="right"
                                                       title="Click to learn more...">Learn more</a>
                                                </li>
                                            </ul>
                                            <!--end::Naviigation-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Chart-->
                                <div id="kt_charts_widget_1_chart"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Charts Widget 1-->
                    </div>
                    <div class="col-lg-4">
                        <!--begin::List Widget 8-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0">
                                <h3 class="card-title font-weight-bolder text-dark">Trends</h3>
                                <div class="card-toolbar">
                                    <div class="dropdown dropdown-inline">
                                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ki ki-bold-more-ver"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <!--begin::Navigation-->
                                            <ul class="navi navi-hover">
                                                <li class="navi-header pb-1">
                                                    <span
                                                        class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-shopping-cart-1"></i>
																		</span>
                                                        <span class="navi-text">Order</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-calendar-8"></i>
																		</span>
                                                        <span class="navi-text">Event</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-graph-1"></i>
																		</span>
                                                        <span class="navi-text">Report</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-rocket-1"></i>
																		</span>
                                                        <span class="navi-text">Post</span>
                                                    </a>
                                                </li>
                                                <li class="navi-item">
                                                    <a href="#" class="navi-link">
																		<span class="navi-icon">
																			<i class="flaticon2-writing"></i>
																		</span>
                                                        <span class="navi-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!--end::Navigation-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-0">
                                <!--begin::Item-->
                                <div class="mb-10">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/006-plurk.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#"
                                               class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Top
                                                Authors</a>
                                            <span class="text-muted font-weight-bold">5 day ago</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Desc-->
                                    <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the top
                                        Authors that fits within this section</p>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="mb-10">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/015-telegram.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#"
                                               class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">Popular
                                                Authors</a>
                                            <span class="text-muted font-weight-bold">5 day ago</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Desc-->
                                    <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the
                                        Popular Authors that fits within this section</p>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-45 symbol-light mr-5">
															<span class="symbol-label">
																<img src="assets/media/svg/misc/014-kickstarter.svg"
                                                                     class="h-50 align-self-center" alt=""/>
															</span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#"
                                               class="font-weight-bold text-dark-75 text-hover-primary font-size-lg mb-1">New
                                                Users</a>
                                            <span class="text-muted font-weight-bold">5 day ago</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Desc-->
                                    <p class="text-dark-50 m-0 pt-5 font-weight-normal">A brief write up about the New
                                        Users that fits within this section</p>
                                    <!--end::Desc-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end: Card-->
                        <!--end::List Widget 8-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection


@section('script')

@endsection
