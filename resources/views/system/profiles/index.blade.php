@extends('layouts.site')

@section('title') Worker Profiles @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Worker Profiles <small> View, rate and review worker profiles.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
    	{{-- <li><a href="{{ route('posts.index') }}"><i class="fa fa-home text-primary"></i>Posts</a></li> --}}
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-users"></i> Worker Profiles </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Worker Profiles </a></li>
                    <li class="pull-left header"><i class="fa fa-users text-info"></i></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">



                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

@endsection