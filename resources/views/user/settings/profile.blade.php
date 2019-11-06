@extends('layouts.site')

@section('title') My Profile - {{ Auth::user()->name }} @endsection
@section('page-tree')
	<h1> My Profile - {{ Auth::user()->name }} <small>{{ Auth::user()->name }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> My Profile Settings</li>
    </ol>
@endsection
@section('content')

@endsection