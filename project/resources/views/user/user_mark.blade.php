@extends('layout.layout')

@section('content')
    @include('system_message');
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Kết quả học tập</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Lớp học</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Kết quả học tập</a>
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
                            <h3 class="text-uppercase">Bảng điểm</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                            <thead>
                            <tr class="text-left">
                                <th class="pl-0" style="width: 20px">
                                    STT
                                </th>
                                <th class="pl-0" style="min-width: 50px"></th>
                                <th class="text-left" style="min-width: 50px">Mã lớp học</th>
                                <th style="min-width: 100px">Lớp học</th>
                                <th style="min-width: 100px">Điểm lần 1</th>
                                <th style="min-width: 100px">Điểm lần 2</th>
                                <th style="min-width: 100px">Điểm lần 3</th>
                                <th style="min-width: 100px">Trung bình</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_marks as $item)
                                <tr>
                                    <td class="pr-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            {{$loop->index + 1}}
                                        </label>
                                    </td>
                                    <td class="pr-0">

                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$item->course_id}}
                                        </a>
                                    </td>
                                    <td class="pr-0">
                                        <a href="#"
                                           class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{\App\Models\Course::find($item->course_id)->course_name}}
                                        </a>
                                    </td>
                                    <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->diem_lan_1}}
                                            </span>
                                    </td>
                                    <td class="pr-0">
                                            <span
                                                class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->diem_lan_2}}
                                            </span>
                                    </td>
                                    <td>
                                           <span
                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$item->diem_lan_3}}</span>
                                    </td>
                                    <td>
                                           <span
                                               class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                               @if($item->diem_lan_1 != null && $item->diem_lan_2 != null && $item->diem_lan_3 != null)
                                                   {{round(($item->diem_lan_1+$item->diem_lan_2+$item->diem_lan_3)/3,2)}}
                                               @endif
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



@endsection
