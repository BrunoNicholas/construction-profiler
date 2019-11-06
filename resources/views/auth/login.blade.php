@extends('layouts.auths')

@section('title', 'Login')
@section('content')
	<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
		@csrf

		<span class="login100-form-title" style="border-top: 5px;">
			Welcome Back! <br> <small>Login</small>
		</span>
		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

		<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
			<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" required autofocus>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
			@error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Password is required">
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('Password') }}" required>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock" aria-hidden="true"></i>
			</span>

			@error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100 validate-input" style="padding-top: 15px;">
			<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-left: 8px;">

            <label class="form-check-label" for="remember" style="margin-left: 25px;">
                {{ __('Remember Me') }}
            </label>
		</div>
		
		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				Login
			</button>
		</div>

		<div class="text-center p-t-12">
			<span class="txt1">
				Forgot
			</span>
			<a class="txt2" href="#">
				Username / Password?
			</a>
		</div>

		<div class="text-center p-t-136">
			<a class="txt2" href="#">
				Create your Account
				<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
			</a>
		</div>
	</form>
@endsection