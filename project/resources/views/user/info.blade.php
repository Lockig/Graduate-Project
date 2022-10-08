@extends('layout.layout')

@section('content')
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
                        <h5 class="text-muted font-weight-bold my-1 mr-5">Thông tin cá nhân</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thông tin cá nhân</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Thông tin cá nhân</a>
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
                <!--begin::Card-->
                <div class="card card-custom gutter-b col-8 align-center">
                    <div class="card-body">
                        <!--begin::Details-->
                        <div class="d-flex mb-9">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img
                                        src="{{asset(($user->avatar != "")?($user->avatar):'media/users/default.jpg')}}"
                                        alt="image"/>
                                </div>
                                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between flex-wrap mt-1">
                                    <div class="d-flex mr-3 align-items-baseline">
                                        <a href="#"
                                           class="align-items-baseline text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ucwords($user->first_name) . ' ' . ucwords($user->last_name)}}</a>
                                        <a href="#">
                                            <i class="flaticon2-correct text-success font-size-h5"></i>
                                        </a>
                                    </div>
                                    <div class="my-lg-0 my-3">
                                        <a href="{{route('users.editInfo')}}"
                                           class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Edit</a>
                                        <a href="{{route('users.editPassword')}}"
                                           class="btn btn-sm btn-info font-weight-bolder text-uppercase">Password</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <div class="separator separator-solid"></div>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <tbody>
                                <tr>
                                    <td class="col-1">Họ:</td>
                                    <td class="col-5">
                                        <span class="text-dark-75">{{$user->first_name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-1">Tên:</td>
                                    <td class="col-5">
                                        <span class="text-dark">{{$user->last_name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-1">Ngày sinh:</td>
                                    <td class="col-5">
                                        <span
                                            class="text-dark">{{\Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y')}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-1">Email:</td>
                                    <td class="col-5">
                                        <span class="text-dark">{{$user->email}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-1">Số điện thoại:</td>
                                    <td class="col-5">
                                        <span class="text-dark">{{$user->mobile_number}}</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->

        @endsection

        @section('script')
            <script src="{{asset('js/widget.js')}}"></script>
@endsection
