@extends('layouts.site')

@section('title') {{ $type }} Messages @endsection
@section('page-tree')
	<h1> {{ $type }} Messages <small>Send messages to anyone registered with {{ config('app.name') }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> My Profile Settings</li>
    </ol>
@endsection
@section('content')

@endsection