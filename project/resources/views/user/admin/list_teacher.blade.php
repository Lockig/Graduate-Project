@extends('layout.layout')

@section('content')
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
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Quản lý</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Người dùng</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Danh sách</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Danh sách giáo viên</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <!--begin::Table-->
                <div class="card card-custom gutter-b table-responsive">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="text-uppercase">Danh sách giáo viên</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="get" action="{{route('admin.listTeacher')}}" class="mb-7">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-8">
                                    <div class="row align-items-center ">
                                        <div class="col-md-7 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input name="last_name" type="text" class="form-control"
                                                       placeholder="Tên ..." id="kt_datatable_search_query"
                                                       value="{{old("last_name")}}"/>
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 my-2 my-md-0 mt-2 d-flex justify-content-between">
                                            <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">Tìm kiếm</button>
                                            <button name="export" class="btn btn-light-primary px-6 font-weight-bold">
                                                Xuất file
                                            </button>
                                        </div>
                                    </div>
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
                                <th style="min-width: 100px">ID</th>
                                <th style="min-width: 100px">Ngày sinh</th>
                                <th style="min-width: 100px">Email</th>
                                <th style="min-width: 100px">Số điện thoại</th>
                                <th class="pr-0 text-right" style="min-width: 150px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                        <div class="symbol symbol-40 symbol-circle symbol-sm">
                                            <img src="{{asset(($teacher->avatar != "")?($teacher->avatar):'media/users/default.jpg')}}" alt="image">
                                        </div>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ucfirst($teacher->first_name) . ' ' . ucfirst($teacher->last_name)}}
                                        </a>
                                    </td>
                                    <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->id}}
                                            </span>
                                    </td>
                                    <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{\Carbon\Carbon::parse($teacher->date_of_birth)->format('d-m-Y') }}
                                            </span>
                                    </td>
                                    <td>
                                           <span
                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->email}}</span>
                                    </td>
                                    <td>
                                           <span
                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$teacher->mobile_number}}</span>
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
                            {!! $teachers->links() !!}
                        </div>
                    </div>
                </div>
                <!--end::Table-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection

@section('script')



@endsection