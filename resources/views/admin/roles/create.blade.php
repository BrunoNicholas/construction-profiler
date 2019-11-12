@extends('layouts.site')

@section('title') Add Role @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Add User Role <small> Add new user categories and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Add Role</a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection