@extends('layouts.site')

@section('title') Galleries @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Galleries <small> Manage your image galleries</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-image"></i> Galleries </a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection