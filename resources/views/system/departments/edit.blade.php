@extends('layouts.site')

@section('title') Edit Department @endsection
@section('styles', '')
@section('page-tree')
	<h1> Edit Departments <small> Edit saved system department.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-dashboard text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        <li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i> Departments </a></li>
        <li class="active"><i class="fa fa-edit"></i> Edit Department</li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection
