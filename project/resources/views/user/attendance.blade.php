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
                        <h5 class="font-weight-bold my-1 mr-5">ĐIỂM DANH</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Điểm danh</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thông tin điểm danh</a>
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
                        <form method="get"
                              @if(\Illuminate\Support\Facades\Auth::user()->role=='student')
                                  action="{{route('users.attendance')}}"
                              @elseif(\Illuminate\Support\Facades\Auth::user()->role=='teacher')
                                  action="{{route('teacher.attendance')}}"
                              @endif
                              class="mb-7">
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-lg-10 col-xl-9 ml-4">
                                    <div class="row align-items-end">
                                        <div class="col-md-5 my-2 my-md-0">
                                            <div class="row d-flex align-items-center">
                                                <label for="course_name"
                                                       class="mr-3 mb-0 d-none d-md-block">Chọn lớp</label>
                                                <select name="course_name" class="form-control">
                                                    @foreach($courses as $course)
                                                        <option value="{{$course->course_id}}" class="form-control">
                                                            {{$course->course_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                    <th class="pr-0" style="width: 50px">Lớp</th>
                                    <th style="min-width: 100px"></th>
                                    <th class="text-left" style="min-width: 150px">Buổi</th>
                                    <th style="min-width: 150px">Giờ bắt đầu</th>
                                    <th style="min-width: 150px">Giờ vào</th>
                                    <th class="pr-0 text-right" style="min-width: 150px">Ghi chú</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td class="pl-0">
                                            <label class="">
                                                <span>{{$loop->index +1}}</span>
                                            </label>
                                        </td>
                                        <td class="pr-0">
                                            <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label">
																	<img
                                                                        src="{{asset('media/svg/avatars/001-boy.svg')}}"
                                                                        class="h-75 align-self-end" alt=""/>
																</span>
                                            </div>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                {{\App\Models\Course::find(\App\Models\Schedule::find($record->schedule_id)->course_id)->course_name}}
                                            </a>
                                        </td>
                                        <td class="pl-0">
                                            <a href="#"
                                               class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                {{\Carbon\Carbon::parse($record->time_in)->format('d/m/Y')}}
                                            </a>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
                                                {{\Carbon\Carbon::parse(\App\Models\Schedule::find($record->schedule_id)->start_at)->format('h:i:s')}}
                                            </span>
                                        </td>
                                        <td>
                                        <span
                                            class="text-dark-75 font-weight-bolder text-hover-primary d-block font-size-lg">
                                            {{\Carbon\Carbon::parse($record->time_in)->format('H:i:s')}}
                                        </span>
                                        </td>
                                        <td class="pr-0 text-right">
                                            @if(\Carbon\Carbon::parse($record->time_in)->diffInMinutes(\Carbon\Carbon::parse(\App\Models\Schedule::find($record->schedule_id)->start_at)) <=5 )
                                                <span
                                                    class="text-success font-weight-bolder font-size-lg">Đúng giờ</span>
                                            @elseif(\Carbon\Carbon::parse($record->time_in)->diffInMinutes(\Carbon\Carbon::parse(\App\Models\Schedule::find($record->schedule_id)->start_at)) <=10)
                                                <span
                                                    class="text-danger font-weight-bolder font-size-lg">Đi muộn < 10p</span>
                                            @else
                                                <span
                                                    class="text-danger font-weight-bolder font-size-lg">Đi muộn > 10p</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                {!! $records->links() !!}
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
