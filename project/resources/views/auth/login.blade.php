@extends('auth.layout.layout')


@section('content')
<!--end::Head-->
<!--begin::Body-->
	<!--begin::Signin-->
	<div class="login-form">
		<!--begin::Form-->
		<form class="form" id="kt_login_singin_form" action="{{ route('login') }}" method="POST">
			<!--begin::Title-->
			@csrf
			<div class="pb-5 pb-lg-15">
				<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Sign In</h3>
				<div class="text-muted font-weight-bold font-size-h4">New Here?
					<a href="{{ route('register') }}" class="text-primary font-weight-bolder">Create Account</a>
				</div>
			</div>
			<!--begin::Title-->
			<!--begin::Form group-->
			<div class="form-group">
				<label for="email" class="font-size-h6 font-weight-bolder text-dark">{{__('Email Address') }}</label>
				<input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="email" name="email" id="email" autocomplete="off" value="{{ old('email') }}" />
			</div>
			<!--end::Form group-->
			<!--begin::Form group-->
			<div class="form-group">
				<div class="d-flex justify-content-between mt-n5">
					<label for="password" class="font-size-h6 font-weight-bolder text-dark pt-5">{{ __('Password') }}</label>
					<a href="{{ route('password.reset') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">{{__('Forgot Password ?')}}</a>
				</div>
				<input class="form-control h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" id="password" autocomplete="off" />
			</div>
			<!--end::Form group-->
			<!--begin::Action-->
			<div class="pb-lg-0 pb-5">
				<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">{{__('Sign In')}}</button>
			</div>
			<!--end::Action-->
		</form>
		<!--end::Form-->
	</div>
	<!--end::Signin-->





@endsection
