@extends('layouts.site')

@section('title') Upload Images @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Upload Images <small> Add image to your uploaded images</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
    	<li><a href="{{ route('images.index') }}"><i class="fa fa-image text-primary"></i>Images</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i> Add Image </a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection