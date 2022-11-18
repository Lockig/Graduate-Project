@extends('layout.layout')

@section('css')

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    @include('system_message');
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Danh sách môn học</h5>
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
                            <a href="" class="text-muted">Quản lý môn học</a>
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
                            <h3 class="text-uppercase">Danh sách môn học</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-12 col-xl-8">
                                <div class="row align-items-center ">
                                    <div class=" col-lg-12 my-2 my-md-0">
                                        <div class="input-icon">
                                            <input name="search" type="text" class="form-control"
                                                   placeholder="Tên ..." id="kt_datatable_search_query"
                                                   value="{{old("search")}}"/>
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
                                <form method="get" action="{{route('admin.listSubject')}}" class="mb-7">
                                    @csrf
                                    <button type="submit" name="search" class="btn btn-light-primary px-6 font-weight-bold">  <span
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
                                </form>
                                <button type="button"
                                        class="btn btn-light-primary font-weight-bold" data-toggle="modal"
                                        data-target="#createSubject">
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
											</span>Tạo mới
                                </button>
                                <!-- Modal-->
                                <div class="modal fade" id="createSubject" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tạo môn học</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <form method="post" action="{{route('admin.storeSubject')}}"
                                                  id="addSubject">
                                                @csrf
                                                @method('POST')
                                                <div class="modal-body">
                                                    <label class="">Mã môn học</label>
                                                    <input name="id" type="text"
                                                           class="form-control form-control-solid" required
                                                           placeholder="nhập tên môn">
                                                    <label class="">Tên môn học</label>
                                                    <input name="subject" type="text"
                                                           class="form-control form-control-solid" required
                                                           placeholder="nhập tên môn">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">Hủy
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-submit btn-primary font-weight-bold">
                                                        Tạo
                                                        mới
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="pl-0" style="min-width: 50px"></th>
                                <th class="text-left" style="min-width: 50px">Mã môn học</th>
                                <th style="min-width: 100px">Tên môn học</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">
                                    </td>
                                    <td class="pr-0">
                                       <span
                                           class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$subject->subject_id}}
                                            </span>
                                    </td>
                                    <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$subject->subject_name}}
                                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            var form = '#addSubject';--}}
{{--            $(form).on('submit', function (event) {--}}
{{--                event.preventDefault();--}}
{{--                var url = $(this).attr('data-action');--}}
{{--                console.log(url);--}}
{{--                $.ajax({--}}
{{--                    url: url,--}}
{{--                    method: 'POST',--}}
{{--                    data: new FormData(this),--}}
{{--                    dataType: 'JSON',--}}
{{--                    contentType: false,--}}
{{--                    cache: false,--}}
{{--                    processData: false,--}}
{{--                    success: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    },--}}
{{--                    error: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    }--}}
{{--                });--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

@endsection
