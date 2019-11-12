@extends('layouts.site')

@section('title') View Message @endsection
@section('styles', '')
@section('page-tree')
	<h1> View Message <small> View message.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-primary"></i> Home</a></li>
        <li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li>
        <li class="active"><i class="fa fa-user-plus"></i> View Message</li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection