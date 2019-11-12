@extends('layouts.site')

@section('title') {{ $type }} Messages @endsection
@section('styles', '')
@section('page-tree')
	<h1 style="text-transform: capitalize"> {{ $type }} Messages <small>Send messages to anyone registered with {{ config('app.name') }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-center"></i> Home</a></li>
        <li class="active" style="text-transform: capitalize"><i class="fa fa-envelope-open-o"></i> {{ $type }} Messages </li>
    </ol>
@endsection
@section('content')

@endsection
@section('scripts')

@endsection