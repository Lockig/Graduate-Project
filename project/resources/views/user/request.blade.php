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
                                <a href="{{route('user.listCourse')}}" class="text-muted">Danh sách lớp học</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('users.coursesDetails',$course->course_id)}}" class="text-muted">{{$course->course_name}}</a>
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
                                            <label for="day_start" class="col-form-label text-left col-lg-3 col-sm-12">Chọn lịch</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <select name="schedule_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($schedules as $item)
                                                        <option value="{{$item->id}}">{{\Carbon\Carbon::parse($item->start_at)->format('d/m/Y H:i:s')}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="content" class="col-form-label text-left col-lg-3 col-sm-12">Lý
                                                Do</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                    <textarea name="content" class="form-control" id="kt_autosize_1"
                                              rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-12 ml-lg-auto d-flex flex-row justify-content-center">
                                            <button type="submit" class="btn btn-success mr-2">Nộp</button>
                                            <button type="reset" class="btn btn-secondary">Hủy</button>
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
                                            <th class="pl-0" style="width: 100px">Họ Tên</th>
                                            <th class="pr-0" style="width: 100px">Tên lớp</th>
                                            <th class="pr-0" style="width: 100px">Buổi</th>
                                            <th class="pr-0" style="width: 200px">Lý do</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Tình trạng</th>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=='Teacher')
                                            <th class="pr-0 text-right" style="min-width: 70px">Hành động</th>
                                                @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $item)
                                            <tr>
                                                <td class="pr-0">{{$loop->index +1 }}</td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\App\Models\User::find($item->student_id)->first_name . ' ' . \App\Models\User::find($item->student_id)->last_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($item->course_id)->course_name}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\Carbon\Carbon::parse($item->start_at)->format('d/m/Y')}}</a>
                                                </td>
                                                <td class="pr-0">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$item->content}}</a>
                                                </td>
                                                <td class="pr-0 text-right">
                                                    @if($item->stage=='Chờ duyệt')
                                                        <a href="#"
                                                           class="text-info font-weight-bold text-hover-primary mb-1 font-size-lg">Chờ duyệt</a>
                                                    @elseif($item->stage=='Đã duyệt')
                                                        <a href="#"
                                                           class="text-success font-weight-bold text-hover-primary mb-1 font-size-lg">Đã duyệt</a>
                                                    @else
                                                        <a href="#"
                                                           class="text-danger font-weight-bold text-hover-primary mb-1 font-size-lg">Từ chối</a>
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
