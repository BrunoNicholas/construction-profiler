@extends('layouts.site')

@section('title') System Roles @endsection
@section('styles', '') 
@section('page-tree')
    <h1> System User Roles <small> Manage the user categories and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-list"></i>System Roles</a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection