@extends('layout.layout')

@section('content')
    @include('system_message')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Thiết lập</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
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
                <div class="row">
                    <div class="col-lg-5 col-xxl-4">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title d-flex">
                                    <span class="card-icon"><i class="flaticon2-time text-primary"></i></span>
                                    <h3 class="ml-2 card-label">Cài đặt thời gian</h3>
                                </div>
                            </div>
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            <form class="form" action="#" method="post">
                                <div class="card-body">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="time_start" class="col-form-label text-left col-lg-3 col-sm-12">Bắt
                                            đầu</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <div class="input-group timepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input name="time_start" class="form-control" id="kt_timepicker_2"
                                                       readonly="readonly" placeholder="{{old('time_start')}}"
                                                       type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="time_end" class="col-form-label text-left col-lg-3 col-sm-12">Kết
                                            thúc</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <div class="input-group timepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input name="time_end" class="form-control" id="kt_timepicker_2"
                                                       readonly="readonly" placeholder="{{old('time_end')}}"
                                                       type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xxl-8">
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
                                            <th class="pl-0" style="width: 100px">Họ tên</th>
                                            <th class="pl-0" style="width: 100px">Từ ngày</th>
                                            <th class="pl-0" style="width: 100px">Tới ngày</th>
                                            <th class="pl-0" style="width: 100px">Lý do</th>
                                            <th class="pl-0" style="width: 100px">Trạng thái</th>
                                            <th class="pl-0 text-right" style="width: 100px">Tình trạng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list_requests as $list_request)
                                            <tr>
                                                <td class="pl-0">1</td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->user_id}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->day_start}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->day_end}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->content}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    @if($list_request->stage='Chờ duyệt')
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->stage}}</a>
                                                    @elseif($list_request->stage="Đã duyệt")
                                                        <a href="#"
                                                           class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->stage}}</a>
                                                    @else
                                                        <a href="#"
                                                           class="text-danger font-weight-bold text-hover-primary mb-1 font-size-lg">{{$list_request->stage}}</a>
                                                    @endif
                                                </td>
                                                <td class="pr-0 text-right d-flex justify-content-end">
                                                    <form method="post" id="accept"
                                                          action="#"
                                                          class="mr-1">
                                                        @csrf
                                                        <button type="submit" data-toggle="tooltip" title
                                                                class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                data-original-title="duyệt">
                                                            <span><i
                                                                    class="flaticon2-check-mark text-success"></i></span>
                                                        </button>
                                                    </form>
                                                    <form method="post"
                                                          action="#">
                                                        @csrf
                                                        <button type="submit" data-toggle="tooltip" title
                                                                class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                data-original-title="từ chối">
                                                            <span><i
                                                                    class="flaticon2-delete text-danger"></i></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{--                                    {!! $list_requests->links() !!}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-5 col-xxl-4">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title d-flex">
                                    <span class="card-icon"><i class="flaticon2-time text-primary"></i></span>
                                    <h3 class="ml-2 card-label">Cài đặt vân tay</h3>
                                </div>
                            </div>
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                            <form class="form" action="{{route('admin.fingerprintSetting')}}" method="post">
                                <div class="card-body">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="time_start" class="col-form-label text-left col-lg-3 col-sm-12">Nhập ID</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <div class="input-group timepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input name="user_id" class="form-control"
                                                       type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="action" class="col-form-label text-left col-lg-3 col-sm-12">Hành động</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <select name="action"
                                                    class="form-control form-control-lg form-control-solid">
                                                <option
                                                        class="form-control form-control-lg form-control-solid"></option>
                                                <option value="create"
                                                        class="form-control form-control-lg form-control-solid">Thêm</option>
                                                <option value="update"
                                                        class="form-control form-control-lg form-control-solid">Cập nhật</option>
                                                <option value="delete"
                                                        class="form-control form-control-lg form-control-solid">Xóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success">Confirm</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xxl-8">
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">DANH SÁCH VÂN TAY</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pl-0" style="width: 100px">ID</th>
                                            <th class="pl-0" style="width: 100px">Họ tên</th>
                                            <th class="pl-0" style="width: 100px">Vân tay</th>
                                            <th class="pl-0 text-right" style="width: 100px">Tình trạng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($fingerprints as $data)
                                            <tr>
                                                <td class="pl-0">{{$loop->index + 1}}</td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->id}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$data->first_name . ' ' . $data->last_name}}</a>
                                                </td>
                                                <td class="pl-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">
                                                        @if($data->fingerprint != 0)
                                                            {{$data->fingerprint}}
                                                        @else
                                                            Chưa có
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="pr-0 text-right d-flex justify-content-end">
                                                    <form method="post" id="accept"
                                                          action="  "
                                                          class="mr-1">
                                                        @csrf
                                                        <button type="submit" data-toggle="tooltip" title
                                                                class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                data-original-title="duyệt">
                                                            <span><i
                                                                    class="flaticon2-check-mark text-success"></i></span>
                                                        </button>
                                                    </form>
                                                    <form method="post"
                                                          action="  ">
                                                        @csrf
                                                        <button type="submit" data-toggle="tooltip" title
                                                                class="btn btn-icon btn-light btn-hover-primary btn-sm"
                                                                data-original-title="từ chối">
                                                            <span><i
                                                                    class="flaticon2-delete text-danger"></i></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $fingerprints->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/timepicker.js')}}"></script>
@endsection
