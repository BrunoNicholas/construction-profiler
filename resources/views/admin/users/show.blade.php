@extends('layouts.site')

@section('title') View User @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View User <small> View an existing user profile!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-users text-primary"></i>Users</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-user-o"></i>View User</a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection