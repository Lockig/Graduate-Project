@extends('auth.layout.layout')
<!--end::Head-->
<!--begin::Body-->
@section('content')
    <!-- <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"> -->
    <!--begin::Main-->


    <!--begin::Signin-->
    <div class="login-form">
        <!--begin::Form-->
        <form class="form" id="kt_login_singin_form" action="{{ route('register') }}" method="POST">
        @csrf
        <!--begin::Title-->
            <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{__('Sign Up') }}</h3>
            </div>
            <!--begin::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <label for="name" class="font-size-h6 font-weight-bolder text-dark">{{__('Full Name') }}</label>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 " value="{{ old('name') }}" type="text"
                       name="name" id="name" autocomplete="off"/>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <label for="email" class="font-size-h6 font-weight-bolder text-dark">{{__('Email Address') }}</label>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 " value="{{old('email')}}" type="email"
                       name="email" id="email" autocomplete="off"/>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Form group-->
            <!--begin:Form group-->
            <div class="form-group">
                <label for="kt_date_picker_3"
                       class="font-size-h6 font-weight-bolder text-dark">{{__('Date Of Birth')}}</label>
                <div class="form-control h-auto py-4 px-6 rounded-lg border-0 ">
                    <div class="input-group date">
                        <input name="dob" type="text" class="form-control rounded-lg border-0 " readonly="readonly"
                               value="05/20/2017" id="kt_datepicker_3"/>
                        <div class="input-group-append rounded-lg border-0 ">
                            <span class="input-group-text">
                                <i class="la la-calendar border-0"></i>
                            </span>
                        </div>
                        @error('kt_date_picker_3')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <!--end:Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label for="password"
                           class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Password') }}</label>
                </div>
                <input class="form-control h-auto py-7 px-6 rounded-lg border-0 " type="password" name="password"
                       autocomplete="off"/>
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Form group-->
            <!-- begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label for="password-confirm"
                           class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Confirm Password') }}</label>
                </div>
                <input id="password-confirm" class="form-control h-auto py-7 px-6 rounded-lg border-0 " type="password"
                       name="password_confirmation" required autocomplete="off"/>
                @error('password-confirm')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!--end::Form group -->
            <!--begin::Action-->
            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_singin_form_submit_button"
                        class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('Register') }}</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->

@endsection
