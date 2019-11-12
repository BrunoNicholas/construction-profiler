@extends('layouts.site')

@section('title') System Users @endsection
@section('styles', '') 
@section('page-tree')
    <h1> System Users <small> Manage all system users</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('prifile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-users"></i> Galleries </a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection