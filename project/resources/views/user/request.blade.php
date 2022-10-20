<@extends('layout.layout')

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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Tạo đơn xin nghỉ</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Điểm danh</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Tạo đơn xin nghỉ</a>
                            </li>
                        </ul>
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
                    <div class="col-5">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title text-uppercase">Đơn xin nghỉ</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{route('users.storeRequest')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="day_start" class="col-form-label text-left col-lg-3 col-sm-12">Từ
                                                ngày</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <input name="day_start" type="text" class="form-control"
                                                       id="kt_datepicker_1"
                                                       readonly="readonly"
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="day_end" class="col-form-label text-left col-lg-3 col-sm-12">Tới
                                                ngày</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <input name="day_end" type="text" class="form-control"
                                                       id="kt_datepicker_1"
                                                       readonly="readonly"
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="content" class="col-form-label text-left col-lg-3 col-sm-12">Lý
                                                Do</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                    <textarea name="content" class="form-control" id="kt_autosize_1"
                                              rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-7">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">DANH SÁCH ĐƠN XIN NGHỈ</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pr-0" style="width: 100px">Tên lớp</th>
                                            <th class="pr-0" style="width: 100px">Từ ngày</th>
                                            <th class="pr-0" style="width: 100px">Đến ngày</th>
                                            <th class="pr-0" style="width: 100px">Số ngày</th>
                                            <th class="pr-0" style="width: 100px">Lý do</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Tình trạng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $item)
                                            <tr>
                                                <td class="pr-0">{{$loop->index +1 }}</td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($item->course_id)->course_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($item->day_start)->format('d-m-Y')}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($item->day_end)->format('d-m-Y')}}</a>
                                                </td>
                                                <td class="pr-0 text-left">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($item->day_start)->diffInDays(\Carbon\Carbon::parse($item->day_end))}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->content}}</a>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    @if($item->stage='Chờ duyệt')
                                                        <a href="#"
                                                           class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>
                                                    @elseif($item->stage='Đã duyệt')
                                                        <a href="#"
                                                           class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>
                                                    @else
                                                        <a href="#"
                                                           class="text-danger font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $list->links() !!}
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection




@section('script')
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script src="{{mix('js/user/date-picker.js')}}"></script>
@endsection
>