@extends('layouts.site')

@section('title') Edit Message @endsection
@section('styles', '')
@section('page-tree')
	<h1> Edit Message <small> Edit message.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-primary"></i> Home</a></li>
        <li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Message</li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection