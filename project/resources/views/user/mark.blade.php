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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Tạo điểm</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thông tin lớp học</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">{{\App\Models\Course::find($course)->course_name}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thêm điểm của học sinh</a>
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
                                <h3 class="card-title text-uppercase">Điền điểm</h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" method="POST" action="{{route('users.storeMark',$course)}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="day_start" class="col-form-label text-left col-lg-3 col-sm-12">
                                                Học sinh</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <select name="student_id" class="form-control">
                                                    <option value=""></option>
                                                    @foreach($students as $student)
                                                        <option
                                                            value="{{$student->id}}">{{$student->first_name . ' ' . $student->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="diem_lan_1" class="col-form-label text-left col-lg-4 col-sm-12">Điểm
                                                lần 1</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <input name="diem_lan_1" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="diem_lan_2" class="col-form-label text-left col-lg-4 col-sm-12">Điểm
                                                lần 2</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <input name="diem_lan_2" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-10 ml-lg-auto">
                                            <label for="diem_lan_3" class="col-form-label text-left col-lg-4 col-sm-12">Điểm
                                                lần 3</label>
                                            <div class="col-lg-10 col-md-10 col-sm-6">
                                                <input name="diem_lan_3" class="form-control">
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
                                    <h3 class="card-label">Bảng điểm lớp
                                        học {{\App\Models\Course::find($course)->course_name}}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-vertical-center"
                                           id="kt_advance_table_widget_1">
                                        <thead>
                                        <tr class="text-left">
                                            <th class="pl-0" style="width: 20px">STT</th>
                                            <th class="pr-0" style="width: 100px">Họ và tên</th>
                                            <th class="pr-0" style="width: 100px">Điểm lần 1</th>
                                            <th class="pr-0" style="width: 100px">Điểm lần 2</th>
                                            <th class="pr-0" style="width: 100px">Điểm lần 3</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Trung bình</th>
                                            <th class="pr-0 text-right" style="min-width: 50px">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($grades))
                                            @foreach($grades as $grade)
                                                <tr>
                                                    <td class="pr-0">{{$loop->index +1 }}</td>
                                                    <td class="pr-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{\App\Models\User::find($grade->student_id)->first_name . ' ' . \App\Models\User::find($grade->student_id)->last_name}}</a>
                                                    </td>
                                                    <td class="pr-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$grade->diem_lan_1}}</a>
                                                    </td>
                                                    <td class="pr-0 text-left">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$grade->diem_lan_2}}</a>
                                                    </td>
                                                    <td class="pr-0">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{$grade->diem_lan_3}}</a>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{round(($grade->diem_lan_3+$grade->diem_lan_2+$grade->diem_lan_1)/3),2}}</a>
                                                    </td>
                                                    <td class="pr-0 text-right">
                                                        <a href="#"
                                                           class="text-dark-75 font-weight-bold text-hover-primary mb-1 font-size-lg">{{round(($grade->diem_lan_3+$grade->diem_lan_2+$grade->diem_lan_1)/3),2}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    {{--                                    {!! $list->links() !!}--}}
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
