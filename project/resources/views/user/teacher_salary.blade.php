@extends('layout.layout')
@php
    $money = $total =  0;
@endphp
@section('content')
    @include('system_message')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Điểm danh</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Báo cáo điểm danh</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Bảng lương</a>
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
            <div class="container">
                <div class="card card-custom gutter-b">
                    <div class="card-header border-0 py-5">
                        <div class="card-title pt-5">
                            <h3 class="text-uppercase">Bảng lương</h3>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <form method="get" action="{{route('teachers.getSalary')}}" class="mb-7">
                            @csrf
                            <div class="row ">
                                <div class="col-lg-12 col-xl-8">
                                    <div class="row align-items-center ">
                                        <div class=" col-lg-4 my-2 my-md-0">
                                            <div class="input-icon">
                                                <input name="course_name" type="text" class="form-control"
                                                       placeholder="Tên lớp ..." id="kt_datatable_search_query"
                                                       value="{{old("last_name")}}"/>
                                                <span>
                                                    <i class="flaticon2-search-1 text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class=" col-lg-6 my-2 my-md-0">
                                            <div class="input-group">
                                                <label class="text-center mt-3 mr-1">Tháng:</label>
                                                <input type="month" class="form-control" name="month" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mt-2">
                                <div class="col-md-12 my-2 my-md-0">
                                    <button class="btn btn-light-primary px-6 font-weight-bold">  <span
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
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table
                                class="table table-head-custom table-vertical-center mt-2">
                                <thead>
                                <tr class="text-left">
                                    <th class="pl-0" style="width: 20px">
                                        STT
                                    </th>
                                    <th class="pr-0" style="width: 100px">Ngày</th>
                                    <th class="text-left" style="max-width: 100px">Lớp</th>
                                    <th class="text-left">Tiền lương</th>
                                    <th style="width: 100px">Đi muộn</th>
                                    <th class="text-right" style="max-width: 100px">Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($salary as $item)
                                    <tr>
                                        <td class="pl-0">{{$loop->index+1}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->time_in)->format('d/m/Y')}}</td>
                                        <td>
                                            {{\Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','courses.course_id','=','course_schedules.course_id')
                                        ->join('attendances','course_schedules.id','=','attendances.schedule_id')
                                        ->where('attendances.schedule_id','=',$item->schedule_id)
                                        ->value('courses.course_name')}}
                                        </td>
                                        <td>
                                            <span class="text-success font-weight-bold">
                                                 {{number_format(\Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','courses.course_id','=','course_schedules.course_id')
                                        ->join('attendances','course_schedules.id','=','attendances.schedule_id')
                                        ->where('attendances.schedule_id','=',$item->schedule_id)
                                        ->value('courses.money'),0)}}
                                                @php
                                                    $total +=\Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','courses.course_id','=','course_schedules.course_id')
                                        ->join('attendances','course_schedules.id','=','attendances.schedule_id')
                                        ->where('attendances.schedule_id','=',$item->schedule_id)
                                        ->value('courses.money');
                                                @endphp
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->penalty_id == 1)
                                            <span class="text-success font-weight-bold">
                                                    {{number_format(\Illuminate\Support\Facades\DB::table('penalties')->where('penalty_id',$item->penalty_id)->value('penalty_amount'),0)}}
                                            </span>
                                            @else
                                                <span class="text-danger font-weight-bold">
                                                    {{number_format(\Illuminate\Support\Facades\DB::table('penalties')->where('penalty_id',$item->penalty_id)->value('penalty_amount'),0)}}
                                            </span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <span class="text-success text-right font-weight-bold">
                                                    {{ number_format(
                                            \Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','courses.course_id','=','course_schedules.course_id')
                                        ->join('attendances','course_schedules.id','=','attendances.schedule_id')
                                        ->where('attendances.schedule_id','=',$item->schedule_id)
                                        ->value('courses.money') -
                                            \Illuminate\Support\Facades\DB::table('penalties')->where('penalty_id',$item->penalty_id)->value('penalty_amount'),0)}}
                                            </span>
                                            @php
                                                $money +=
                                            \Illuminate\Support\Facades\DB::table('courses')
                                        ->join('course_schedules','courses.course_id','=','course_schedules.course_id')
                                        ->join('attendances','course_schedules.id','=','attendances.schedule_id')
                                        ->where('attendances.schedule_id','=',$item->schedule_id)
                                        ->value('courses.money') -
                                            \Illuminate\Support\Facades\DB::table('penalties')->where('penalty_id',$item->penalty_id)->value('penalty_amount');
                                            @endphp
                                        </td>
                                    </tr>
                                @empty
                                    Không có dữ liệu
                                @endforelse
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-success font-weight-bold"></td>
                                    <td class="text-muted text-uppercase font-size-sm"></td>
                                    <td class="text-success text-right font-weight-bold">{{number_format($money,0)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


