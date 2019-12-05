@extends('layouts.auths')

@section('title', 'Register')
@section('content')
	<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
		@csrf

		<span class="login100-form-title" style="border-top: 5px;">
			Join Today & Build! <br> <small>Register Now</small>
		</span>

		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

		<div class="wrap-input100 validate-input" data-validate = "Valid name is required">
			<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Full Names') }}" value="{{ old('name') }}" autocomplete="name" required autofocus>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-user-o" aria-hidden="true"></i>
			</span>
			@error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
			<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-envelope-o" aria-hidden="true"></i>
			</span>
			@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Password is required">
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Valid Password') }}" required>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-key" aria-hidden="true"></i>
			</span>

			@error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Password is required">
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-key" aria-hidden="true"></i>
			</span>
		</div>

		<div class="wrap-input100 validate-input" style="padding-top: 15px;">
			<input class="form-check-input" type="checkbox" name="agreement" style="margin-left: 8px;">

            <label class="form-check-label" for="remember" style="margin-left: 25px;">
                I agree with <a href="javascript:void(0)">{{ __('Terms & Policy') }}</a>
            </label>
		</div>
		
		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				Regiter & Continue
			</button>
		</div>

		<div class="text-center p-t-12">
			{{-- <span class="txt1">
				Already
			</span>
			<a class="txt2" href="{{ route('login') }}">
				Known Member? Login
			</a> --}}
		</div>

		<div class="text-center p-t-136">
			<a class="txt2" href="{{ route('login') }}">
				Already a member
				<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
			</a>
		</div>
	</form>
@endsection