@extends('layouts.auths')

@section('title', 'Reset Link')
@section('content')
	<form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
		@csrf

		<span class="login100-form-title" style="border-top: 5px;">
			Recover Password! <br> <small>Reset Password</small>
		</span>
		@foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <input type="hidden" name="token" value="{{ $token }}">
		<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
			<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="{{ __('New Password') }}" required>
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
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation" placeholder="{{ __('Confirm New Password') }}" required>
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-key" aria-hidden="true"></i>
			</span>
		</div>

		
		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				{{ __('Reset To New Password') }}
			</button>
		</div>

		<div class="text-center p-t-12">
				<span class="txt1">
					Remembered
				</span>
				<a class="txt2" href="{{ route('login') }}">
					My Password?
				</a>
		</div>

		<div class="text-center p-t-136">
			<a class="txt2" href="{{ route('register') }}">
				Create your Account
				<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
			</a>
		</div>
	</form>
@endsection
