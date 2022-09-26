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
                        <h5 class="text-muted font-weight-bold my-1 mr-5">ĐIỂM DANH</h5>
                        <!--end::Page Title-->
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
                <!--begin::Advance Table Widget 1-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="align-self-baseline text-dark">{{ucwords($user->first_name) . " " . ucwords($user->last_name)}}</h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Form-->
                        <form method="get" action="{{route('users.attendance')}}" class="mb-7">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-lg-10 col-xl-9 ml-4">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 my-2 my-md-0">
                                            <div for="request_date" class="form-group row d-flex align-items-center">
                                                <label for="example-date-input"
                                                       class="mr-3 mb-0 d-none d-md-block">Date</label>
                                                <input name="request_date" class="form-control" type="date"
                                                       value="{{old('request_date')}}"
                                                       id="example-date-input"/>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-xl-3 mt-5 mt-lg-0">
                                            <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">
                                                Search
                                            </button>
                                        </div>
                                    </div>
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
                                    <th class="pr-0" style="width: 50px">Ngày</th>
                                    <th style="min-width: 200px"></th>
                                    <th style="min-width: 150px">Giờ vào</th>
                                    <th style="min-width: 150px">Giờ ra</th>
                                    <th class="pr-0 text-right" style="min-width: 150px">Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php
                                    $start_time = "08:00:00";
                                    $end_time = "15:30:00";
                                @endphp
                                <tr>
                                    <td class="pl-0">
                                        <label class="">
                                            <span>1</span>
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                        <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label">
																	<img src="assets/media/svg/avatars/001-boy.svg"
                                                                         class="h-75 align-self-end" alt=""/>
																</span>
                                        </div>
                                    </td>
                                    <td class="pl-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                            {{\Carbon\Carbon::parse($logs->first()->date)->format('d-m-Y')}}
                                        </a>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                            {{\Carbon\Carbon::parse($logs->first()->time_in)->format('H:i:s')}}
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                           {{\Carbon\Carbon::parse($logs->last()->time_in)->format('H:i:s')}}
                                        </span>
                                    </td>
                                    <td class="pr-0 text-right">
                                        @if($logs->first()->time_in >= $start_time && $logs->last()->time_in <= $end_time)
                                            <span
                                                class="text-danger font-weight-bolder font-size-lg">Đi muộn</span>
                                        @else
                                            <span
                                                class="text-success font-weight-bolder font-size-lg">Đúng giờ</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {!! $logs->links() !!}
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Advance Table Widget 1-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
@endsection
