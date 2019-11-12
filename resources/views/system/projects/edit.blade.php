@extends('layouts.site')

@section('title') Edit Project @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Edit Project <small> Edit saved project.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit Project </a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection