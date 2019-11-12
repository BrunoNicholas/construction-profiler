@extends('layouts.site')

@section('title') Departments @endsection
@section('styles', '')
@section('page-tree')
	<h1> System Departments <small> Manage the system and company departments.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-envelope text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        {{-- <li><a href="{{ route('messages.index') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li> --}}
        <li class="active"><i class="fa fa-tree"></i> Departments</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Departments </a></li>
                    <li class="pull-left header"><i class="fa fa-tree text-info"></i></li>
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
