@extends('layout.layout')

@section('content')
    <!--begin::Content-->
    @include('system_message')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tạo tài khoản</h5>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Quản lý</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Nhân viên</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Tạo mới tài khoản</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                </div>
                <!--end::Details-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Card header-->
                    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
																<svg xmlns="http://www.w3.org/2000/svg"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                     width="24px" height="24px" viewBox="0 0 24 24"
                                                                     version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"/>
																		<path
                                                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                                            fill="#000000" fill-rule="nonzero"/>
																		<path
                                                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                                            fill="#000000" opacity="0.3"/>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Profile</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                            </ul>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <form method="post" action="{{route('admin.store')}}" class="form" id="kt_form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tab-content">
                                <!--begin::Tab-->
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-xl-2"></div>
                                        <div class="col-xl-7 my-2">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <label class="col-3"></label>
                                                <div class="col-9">
                                                    <h6 class="text-dark font-weight-bold mb-10">Thông tin</h6>
                                                </div>
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="profile_avatar"
                                                       class="col-form-label col-3 text-lg-right text-left">Avatar</label>
                                                <div class="col-9">
                                                    <div class="image-input image-input-outline image-input-circle"
                                                         id="kt_image_3">
                                                        <div class="image-input-wrapper"
                                                             style="background-image: url({{asset('assets/media/users/100_3.jpg')}})">
                                                        </div>

                                                        <label
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="change" data-toggle="tooltip" title=""
                                                            data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input name="profile_avatar" type="file"
                                                                   accept=".png, .jpg, .jpeg"/>
                                                            <input type="hidden" name="profile_avatar_remove"/>
                                                        </label>

                                                        <span
                                                            class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                            data-action="cancel" data-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="first_name"
                                                       class="col-form-label col-3 text-lg-right text-left">Họ</label>
                                                <div class="col-9">
                                                    <input name="first_name"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text" placeholder="{{old('first_name')}}"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="last_name"
                                                       class="col-form-label col-3 text-lg-right text-left">
                                                    Tên</label>
                                                <div class="col-9">
                                                    <input name="last_name"
                                                           class="form-control form-control-lg form-control-solid"
                                                           type="text" placeholder="{{old('last_name')}}"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="date_of_birth"
                                                       class="col-form-label col-3 text-lg-right text-left">
                                                    Ngày sinh</label>
                                                <div class="col-9">
                                                    <input name="date_of_birth" type="text"
                                                           class="form-control form-control-lg form-control-solid"
                                                           id="kt_datepicker_1" readonly="readonly"
                                                           placeholder="{{old('date_of_birth')}}"/>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="mobile_number"
                                                       class="col-form-label col-3 text-lg-right text-left">SĐT</label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-phone"></i>
																			</span>
                                                        </div>
                                                        <input name="mobile_number" type="text"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{old('mobile_number')}}"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="email" class="col-form-label col-3 text-lg-right text-left">Email
                                                </label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-at"></i>
																			</span>
                                                        </div>
                                                        <input name="email" type="email"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{old('email')}}"
                                                               placeholder="Email" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="address" class="col-form-label col-3 text-lg-right text-left">Địa chỉ
                                                </label>
                                                <div class="col-9">
                                                    <div class="input-group input-group-lg input-group-solid">
                                                        <div class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="la la-at"></i>
																			</span>
                                                        </div>
                                                        <input name="address" type="text"
                                                               class="form-control form-control-lg form-control-solid"
                                                               value="{{old('address')}}"
                                                               placeholder="Địa chỉ" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Group-->
                                            <div class="form-group row">
                                                <label for="role"
                                                       class="col-form-label col-3 text-lg-right text-left">Vị
                                                    trí</label>
                                                <div class="col-9">
                                                    <select name="role"
                                                            class="form-control form-control-lg form-control-solid">
                                                            <option value="student"
                                                                    class="form-control form-control-lg form-control-solid">student</option>
                                                            <option value="teacher"
                                                                    class="form-control form-control-lg form-control-solid">teacher</option>
                                                            <option value="admin"
                                                                    class="form-control form-control-lg form-control-solid">admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Group-->
                                            <!--begin::Toolbar-->
                                            <div class="d-flex">
                                                <!--begin::Dropdown-->
                                                <div class="btn-group ml-2">
                                                    <button type="reset"
                                                            class="btn btn-secondary font-weight-bold btn-sm px-3 font-size-base">
                                                        Cancel
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">
                                                        Save
                                                        Changes
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
                                                        <ul class="navi py-5">
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-writing"></i>
														</span>
                                                                    <span class="navi-text">Save &amp; continue</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-medical-records"></i>
														</span>
                                                                    <span class="navi-text">Save &amp; add new</span>
                                                                </a>
                                                            </li>
                                                            <li class="navi-item">
                                                                <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-hourglass-1"></i>
														</span>
                                                                    <span class="navi-text">Save &amp; exit</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!--end::Dropdown-->
                                            </div>
                                            <!--end::Toolbar-->
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                </div>
                            </div>
                        </form>
                                <!--end::Tab-->
                            </div>
                    </div>
                    <!--begin::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->


    <!--end::Content-->
@endsection

@section('script')
    {{--    <script src="{{mix('js/user/user.js')}}"></script>--}}
    <script src="{{mix('js/user/date-picker.js')}}"></script>
    <script>
        var avatar3 = new KTImageInput('kt_image_3');
    </script>
@endsection
