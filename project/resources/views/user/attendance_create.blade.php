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
                        <h5 class="text-dark font-weight-bold my-1 mr-5 text-uppercase">LỚP Học</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Lớp học</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Danh sách</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">{{\App\Models\Course::find($id)->course_name}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thông tin</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Điểm danh hộ</a>
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
                <div class="row">
                    <div class="col-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title text-uppercase">thông tin điểm danh</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{route('teacher.storeAttendance',$id)}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="schedule" class="col-form-label text-left col-lg-3 col-sm-12">Buổi
                                            </label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <select name="schedule" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($course_schedule as $item)
                                                        <option value="{{$item->start_at}}">{{\Carbon\Carbon::parse($item->start_at)->format('d/m/Y H:i:s')}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="user_id" class="col-form-label text-left col-lg-3 col-sm-12">Mã
                                                học sinh
                                            </label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <select name="user_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($students as $item)
                                                        <option value="{{$item->student_id}}">{{$item->student_id}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="time_in" class="col-form-label text-left col-lg-3 col-sm-12">Thời
                                                gian vào lớp</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <div class="input-group date" id="kt_datetimepicker_2"
                                                     data-target-input="nearest">
                                                    <input name="time_in" type="text"
                                                           class="form-control datetimepicker-input"
                                                           placeholder="Chọn giờ" data-target="#kt_datetimepicker_2">
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_2"
                                                         data-toggle="datetimepicker">
                                                        <span class="input-group-text"><i
                                                                class="ki ki-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Nhập</button>
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
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
    <script src="{{mix('js/datetimepicker.js')}}"></script>
    <script src="{{asset('assets/js/pages/widgets.js')}}"></script>
    <script src="{{mix('js/user/date-picker.js')}}"></script>
@endsection
>
