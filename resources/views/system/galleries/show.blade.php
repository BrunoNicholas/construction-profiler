@extends('layouts.site')

@section('title') View Gallery @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View Gallery <small> View image gallery</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-tree"></i> View Gallery </a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection