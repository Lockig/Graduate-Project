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
                            <form class="form" action="{{route('admin.time_setting')}}" method="post">
                                <div class="card-body">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="time_start" class="col-form-label text-left col-lg-3 col-sm-12">Bắt đầu</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <div class="input-group timepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input name="time_start" class="form-control" id="kt_timepicker_2"
                                                       readonly="readonly" placeholder="{{old('time_start')}}" type="text"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="time_end" class="col-form-label text-left col-lg-3 col-sm-12">Kết thúc</label>
                                        <div class="col-lg-8 col-md-9 col-sm-12">
                                            <div class="input-group timepicker">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="la la-clock-o"></i>
                                                    </span>
                                                </div>
                                                <input name="time_end" class="form-control" id="kt_timepicker_2"
                                                       readonly="readonly" placeholder="{{old('time_end')}}" type="text"/>
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
