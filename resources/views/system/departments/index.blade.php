@extends('layouts.site')

@section('title') Departments @endsection
@section('styles', '')
@section('page-tree')
	<h1> System Departments <small> Manage the system and company departments.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-envelope text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        {{-- <li><a href="{{ route('messages.index') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li> --}}
        <li class="active"><i class="fa fa-tree"></i> Departments</li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection
