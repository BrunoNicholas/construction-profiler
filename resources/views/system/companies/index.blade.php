@extends('layouts.site')

@section('title') Companies @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Registered Companies <small> Manage the registered companies!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	{{-- <li><a href="{{ route('compa.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li> --}}
        <li class="active"><a href="javascript:void(0)"><i class="ion ion-ios-toggle-outline"></i>Companies</a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection