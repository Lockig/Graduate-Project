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
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <!--begin::Details-->
                        <div class="d-flex mb-9">
                            <!--begin: Pic-->
                            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img src="{{asset(isset($user->avatar)?($user->avatar):"media/users/default.jpg")}}"
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
                                    <div class="d-flex mr-3">
                                        <a href="#"
                                           class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ucwords($user->first_name) . ' ' . ucwords($user->last_name)}}</a>
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
                                <!--end::Title-->
                                <!--begin::Content-->
                                <div class="d-flex flex-wrap justify-content-between mt-1">
                                    <div class="d-flex flex-column flex-grow-1 pr-8">
                                        <div class="d-flex flex-wrap mb-4">
                                            <a href="#"
                                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="flaticon2-new-email mr-2 font-size-lg"></i>{{$user->email}}
                                            </a>
                                            <a href="#"
                                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{$user->position->position_name}}
                                            </a>
                                            <a href="#"
                                               class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                <i class="flaticon2-phone mr-2 font-size-lg"></i>{{$user->mobile_number}}
                                            </a>
                                            <a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                                <i class="flaticon2-placeholder mr-2 font-size-lg"></i>{{Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y')}}
                                            </a>
                                        </div>
                                        <span class="font-weight-bold text-dark-50">I distinguish three main text objectives could be merely to inform people.</span>
                                        <span class="font-weight-bold text-dark-50">A second could be persuade people.You want people to bay objective</span>
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                        <div class="separator separator-solid"></div>
                        <!--begin::Items-->
                        <div class="d-flex align-items-center flex-wrap mt-8">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
												<span class="mr-4">
													<i class="flaticon-piggy-bank display-4 text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Thâm niên</span>
                                    <span class="font-weight-bolder font-size-h5 text-dark-50">
													{{$user_working_details['0']->seniority}} năm</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
												<span class="mr-4">
													<i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Ngày gia nhập</span>
                                    <span class="font-weight-bolder font-size-h5">
													{{\Carbon\Carbon::parse($user_working_details['0']->join_date)->format('d-m-Y')}}</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
												<span class="mr-4">
													<i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column text-dark-75">
                                    <span class="font-weight-bolder font-size-sm">Ngày nghỉ tối đa</span>
                                    <span class="font-weight-bolder font-size-h5">
												{{$user_working_details['0']->max_day_off}}</span>
                                </div>
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
												<span class="mr-4">
													<i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
												</span>
                                <div class="d-flex flex-column flex-lg-fill">
                                    <span class="text-dark-75 font-weight-bolder font-size-sm">Ngày nghỉ còn lại</span>
                                    <span class="font-weight-bolder font-size-h5">
												{{$user_working_details['0']->day_off}}</span>
                                </div>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--begin::Items-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection

@section('script')
    <script src="{{asset('js/widget.js')}}"></script>
@endsection
