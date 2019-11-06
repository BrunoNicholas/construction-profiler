@extends('layouts.site')

@section('title') Administrator @endsection
@section('page-tree')
    <h1> Home <small>{{ config('app.description') }}</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection
@section('content')

@endsection
