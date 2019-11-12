@extends('layouts.site')

@section('title') View Company @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View Company <small> Manage the registered companies!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('companies.index') }}"><i class="ion ion-ios-toggle-outline text-primary"></i>Companies</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-tree"></i>View Company</a></li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection