@extends('layouts.auths')

@section('title', 'Register')
@section('content')
	<div class="login100-form validate-form">
		<div class="card" style="margin: 5px; padding: 0px;">
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>

            <div class="card-body">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </div>
            <div class="card-footer">
            	<span class="txt1 p-b-9"> Not ready to proceed? </span>

		        <a href="javascrit:void(0)" class="txt3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout Now </a>
		        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
            </div>
        </div>
	</div>
@endsection