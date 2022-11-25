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
                        <h5 class="text-dark font-weight-bold my-1 mr-5">Đổi mật khẩu</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item">
                                <a href="{{route('users.info')}}" class="text-muted">Thông tin cá nhân</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="" class="text-muted">Đổi mật khẩu</a>
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
                <!--begin::Profile Change Password-->
                <div class="d-flex flex-row">
                    <!--begin::Aside-->
                    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
                        <!--begin::Profile Card-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body pt-4">
                                <!--begin::User-->
                                <div class="d-flex align-items-center">
                                    <div
                                        class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                        <div class="symbol-label"
                                             style="background-image:url('{{asset(isset($user->avatar)?($user->avatar):'media/users/default.jpg')}}')"></div>
                                        <i class="symbol-badge bg-success"></i>
                                    </div>
                                    <div>
                                        <a href="#"
                                           class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$user->first_name . ' ' .$user->last_name}}</a>
                                        <div class="text-success">{{ucwords($user->role)}}</div>
                                    </div>
                                </div>
                                <!--end::User-->
                                <!--begin::Contact-->
                                <div class="py-9">
                                    <div
                                        class="d-flex flex-column align-items-start justify-content-between mx-2 mb-2">
                                        <div class="row">
                                            <span class="font-weight-bold mr-2">Email:</span>
                                        </div>
                                        <div class="row">
                                            <a href="#" class="text-muted text-hover-primary">{{$user->email}}</a>
                                        </div>

                                    </div>
                                    <div
                                        class="d-flex flex-column align-items-start justify-content-between mx-2 mb-2">
                                        <div class="row">
                                            <span class="font-weight-bold mr-2">Số điện thoại:</span>
                                        </div>
                                        <div class="row">
                                            <span class="text-muted">{{$user->mobile_number}}</span>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-column align-items-start justify-content-between mx-2">
                                        <div class="row">
                                            <span class="font-weight-bold mr-2">Ngày sinh:</span>
                                        </div>
                                        <div class="row">
                                                  <span
                                                      class="text-muted">{{\Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y')}}</span>
                                        </div>

                                    </div>
                                    <div class="d-flex flex-column align-items-start justify-content-between mx-2">
                                        <div class="row">
                                            <span class="font-weight-bold mr-2">Địa chỉ:</span>
                                        </div>
                                        <div class="row">
                                                 <span
                                                     class="text-muted">{{$user->address}}</span>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Contact-->
                                <!--begin::Nav-->
                                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                    <div class="navi-item mb-2">
                                        <a href="#" id="change_password"
                                           class="navi-link py-4">
                                                    <span class="navi-icon mr-2">
                                                        <span class="svg-icon">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                 width="24px" height="24px" viewBox="0 0 24 24"
                                                                 version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"/>
                                                                    <path
                                                                        d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                    <path
                                                                        d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                    <path
                                                                        d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                        fill="#000000" opacity="0.3"/>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                            <span class="navi-text font-size-lg">Đổi mật khẩu</span>
                                        </a>
                                    </div>
                                </div>
                                <!--end::Nav-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Profile Card-->
                    </div>
                    <!--end::Aside-->
                    <!--begin::Content-->
                    <div class="flex-row-fluid ml-lg-7">
                        <!--begin::Card-->
                        <form class="card card-custom card-stretch gutter-b" method="post"
                              @if(\Illuminate\Support\Facades\Auth::user()->role=='student' || \Illuminate\Support\Facades\Auth::user()->role=='teacher')
                              action="{{route('users.updatePassword',$user)}}">
                            @elseif(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                action="{{route('users.updatePasswords',$user)}}">
                            @endif
                            @csrf
                            @method('post')
                            <!--begin::Header-->
                            <div class="card-header py-3">
                                <div class="card-title align-items-start flex-column">
                                    <h3 class="card-label font-weight-bolder text-dark">Đổi mật khẩu</h3>
                                </div>
                                <div class="card-toolbar">
                                    <button type="submit" class="btn btn-success mr-2">Lưu thông tin
                                    </button>
                                    <a href="{{route('users.index')}}" class="btn btn-secondary">Hủy</a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Form-->
                            <div class="card-body form">
                                <div class="form-group row">
                                    <label for="current_password"
                                           class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu
                                        cũ</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="current_password" type="password"
                                               class="form-control form-control-lg form-control-solid mb-2"
                                               value="" placeholder="Current password"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password"
                                           class="col-xl-3 col-lg-3 col-form-label text-alert">Mật khẩu
                                        mới</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="new_password" type="password"
                                               class="form-control form-control-lg form-control-solid"
                                               value="" placeholder="New password"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirmation"
                                           class="col-xl-3 col-lg-3 col-form-label text-alert">Nhập lại mật
                                        khẩu</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input name="password_confirmation" type="password"
                                               class="form-control form-control-lg form-control-solid"
                                               value="" placeholder="Verify password"/>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </form>
                        <!--end::Content-->
                    </div>
                    <!--end::Profile Change Password-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
        <!--end::Content-->
        @endsection
        @section('script')
            <script src="{{mix('js/user/user.js')}}"></script>
@endsection
