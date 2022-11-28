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
                        <h5 class="font-weight-bold my-1 mr-5">Quản lý tiền phạt</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Quản lý</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.listTeacher')}}" class="text-muted">Quản lý giáo viên</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Quản lý tiền khấu trừ</a>
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
                <div class="card card-custom gutter-b">
                    <div class="card-header border-0 py-5"></div>
                    <div class="card-body py-0">
                        <div class="card-title">
                            <h3 class="text-center">Bảng thông tin tiền khấu trừ</h3>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                            <!--begin:Tạo mới-->
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-toggle="modal"
                                    data-target="#createPenalty"
                                    title="tạo mới">
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
                                </span>
                                Tạo mới
                            </button>
                            <div class="modal fade" id="createPenalty" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form
                                        action="{{route('admin.storePenalty')}}"
                                        method="post">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tạo mới</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body d-flex flex-column">
                                                <div class="row">
                                                    <label>Tiền khấu trừ:</label>
                                                    <input value=""
                                                           name="penalty_amount" type="text"
                                                           class="form-control form-control-solid">
                                                </div>
                                                <div class="row">
                                                    <label>Ghi chú:</label>
                                                    <input value=""
                                                           name="penalty_description" type="text"
                                                           class="form-control form-control-solid">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-light-primary font-weight-bold"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="submit"
                                                        class="btn btn-primary font-weight-bold">Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--end:Tạo mới-->
                        @endif
                        <table class="table table-bordered table-head-borderless mt-2">
                            <thead>
                            <tr class="text-center">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="text-center" style="min-width: 100px">Tiền phạt</th>
                                <th style="min-width: 100px">Ghi chú</th>
                                @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                    <th class="pr-0 text-center">Hành động</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($penalties as $penalty)
                                <tr>
                                    <td class="text-center pl-0"><label><span>{{$loop->index+1}}</span></label></td>
                                    <td class="pl-0 text-center"><span
                                            class="text-dark-75">{{$penalty->penalty_amount}}</span></td>
                                    <td class="pl-0 text-center"><span
                                            class="text-dark-75">{{$penalty->penalty_description}}</span></td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                        <td class="d-flex justify-content-end">
                                            <button type="button"
                                                    data-toggle="modal"
                                                    data-target="#editPenalty"
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
                                            </button>
                                            <!-- Modal-->
                                            <div class="modal fade" id="editPenalty" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form
                                                        action="{{route('admin.updatePenalty',$penalty->penalty_id)}}"
                                                        method="post">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body d-flex flex-column">
                                                                <div class="row">
                                                                    <label>Số tiền:</label>
                                                                    <input value="{{number_format($penalty->penalty_amount,0)}}"
                                                                           name="penalty_amount" type="text"
                                                                           class="form-control form-control-solid">
                                                                </div>
                                                                <div class="row">
                                                                    <label>Ghi chú:</label>
                                                                    <input value="{{$penalty->penalty_description}}"
                                                                           name="penalty_description" type="text"
                                                                           class="form-control form-control-solid">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-light-primary font-weight-bold"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-primary font-weight-bold">Lưu
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <form class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                  method="post"
                                                  action="{{route('admin.deletePenalty',$penalty->penalty_id)}}"
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
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

@endsection
