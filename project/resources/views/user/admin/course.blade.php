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
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row mb-3">
                    <div class="col-4">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title text-uppercase">TẠO LỚP HỌC</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{route('admin.storeCourse')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="course_name"
                                                   class="col-form-label text-left col-lg-5 col-sm-12">Tên
                                                lớp</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input name="course_name" type="text" class="form-control" value="{{old('course_name')}}"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="role"
                                                   class="col-lg-12 ml-lg-auto">Giáo viên</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <select name="teacher"
                                                        class="form-control">
                                                    @foreach($teachers as $teacher)
                                                        <option
                                                            value="{{$teacher->id}}"
                                                            class="form-control form-control-lg form-control-solid">
                                                            {{$teacher->id}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="day_start" class="col-form-label text-left col-lg-5 col-sm-12">Từ
                                                ngày</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input name="day_start" type="text" class="form-control"
                                                       id="kt_datepicker_1"
                                                       readonly="readonly"
                                                  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="day_end" class="col-form-label text-left col-lg-12 col-sm-12">Tới
                                                ngày</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input name="day_end" type="text" class="form-control"
                                                       id="kt_datepicker_1"
                                                       readonly="readonly"
                                                  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="hour" class="col-form-label text-left col-lg-12 col-sm-12">Thời lượng</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input name="hour" type="text" class="form-control" placeholder="Nhập số giờ"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="course_description"
                                                   class="col-form-label text-left col-lg-12 col-sm-12">Thông tin</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input value="{{old('course_description')}}" type="text" name="course_description" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Tạo</button>
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-8">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b card-stretch">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label text-uppercase">DANH SÁCH lớp học</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pr-0" style="width: 100px">Tên</th>
                                            <th class="pr-0" style="width: 100px">Ngày bắt đầu</th>
                                            <th class="pr-0" style="width: 100px">Ngày kết thúc</th>
                                            <th class="pr-0" style="width: 100px">Giáo viên</th>
                                            <th class="pr-0" style="width: 100px">Thông tin</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <td class="pr-0">{{$loop->index +1 }}</td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->course_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->start_date}}</a>
                                                </td>
                                                <td class="pr-0 text-left">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->end_date}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' ' . ucwords(\App\Models\User::find($course->teacher_id)->last_name)}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->course_description}}</a>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#"
                                                       class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->status}}</a>
                                                    {{--                                                    @if($item->stage='Chờ duyệt')--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @elseif($item->stage='Đã duyệt')--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @else--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-danger font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @endif--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $courses->links() !!}
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title text-uppercase">TẠO LỊCH HỌC</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{route('admin.storeCourseSchedule')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="course_name"
                                                   class="col-lg-12 ml-lg-auto">Tên lớp</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <select name="course_name"
                                                        class="form-control">
                                                    @foreach($courses as $course)
                                                        <option
                                                            value="{{$course->course_name}}"
                                                            class="form-control form-control-lg form-control-solid">
                                                            {{$course->course_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="start_time" class="col-form-label text-left col-lg-12 col-sm-12">Chọn giờ cố định 1</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                                                    <input name="start_time" type="text" class="form-control datetimepicker-input" placeholder="Chọn giờ" data-target="#kt_datetimepicker_2" >
                                                    <div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
                                                        <span class="input-group-text"><i class="ki ki-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto pl-8">
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" name="auto_create"/>
                                                       <span></span>
                                                Tạo tự động (+7 ngày)
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Tạo</button>
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-8">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label text-uppercase">Lịch học</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pr-0" style="width: 100px">Tên</th>
                                            <th class="pr-0" style="width: 100px">Buổi</th>
                                            <th class="pr-0" style="width: 100px">Ngày bắt đầu</th>
                                            <th class="pr-0" style="width: 100px">Ngày kết thúc</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($course_schedules as $course_schedule)
                                            <tr>
                                                <td class="pr-0">{{$loop->index +1 }}</td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($course_schedule->course_id)->course_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($course_schedule->start_at)->format('d-m-Y')}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($course_schedule->start_at)->format('h:i')}}</a>
                                                </td>
                                                <td class="pr-0 text-left">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($course_schedule->end_at)->format('h:i')}}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $course_schedules->links() !!}
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-4">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header d-flex justify-content-center">
                                <h3 class="card-title text-uppercase">Thêm học sinh vào lớp học</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="post" action="{{route('admin.storeCourseStudent')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="student_id"
                                                   class="col-form-label text-left col-lg-12 col-sm-12">Mã học sinh</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <input value="{{old('student_id')}}" type="text" name="student_id" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto">
                                            <label for="course_name"
                                                   class="col-lg-12 ml-lg-auto">Tên lớp</label>
                                            <div class="col-lg-12 col-md-10 col-sm-6">
                                                <select name="course_name"
                                                        class="form-control">
                                                    @foreach($courses as $course)
                                                        <option
                                                            value="{{$course->course_name}}"
                                                            class="form-control form-control-lg form-control-solid">
                                                            {{$course->course_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Tạo</button>
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-8">
                        <!--begin::Card-->
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label text-uppercase">Lịch học</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pr-0" style="width: 100px">Tên</th>
                                            <th class="pr-0" style="width: 100px">Ngày bắt đầu</th>
                                            <th class="pr-0" style="width: 100px">Ngày kết thúc</th>
                                            <th class="pr-0" style="width: 100px">Giáo viên</th>
                                            <th class="pr-0" style="width: 100px">Thông tin</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <td class="pr-0">{{$loop->index +1 }}</td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->course_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->start_date}}</a>
                                                </td>
                                                <td class="pr-0 text-left">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->end_date}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{ucwords(\App\Models\User::find($course->teacher_id)->first_name) . ' ' . ucwords(\App\Models\User::find($course->teacher_id)->last_name)}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->course_description}}</a>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    <a href="#"
                                                       class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">{{$course->status}}</a>
                                                    {{--                                                    @if($item->stage='Chờ duyệt')--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @elseif($item->stage='Đã duyệt')--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @else--}}
                                                    {{--                                                        <a href="#"--}}
                                                    {{--                                                           class="text-danger font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->stage}}</a>--}}
                                                    {{--                                                    @endif--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {!! $courses->links() !!}
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
    <script src="{{mix('js/datetimepicker.js')}}"></script>
@endsection
>
