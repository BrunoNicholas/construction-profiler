@extends('layouts.site')

@section('title') View Department @endsection
@section('styles', '')
@section('page-tree')
	<h1> View Department <small> View saved system department.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-dashboard text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        <li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i> Departments </a></li>
        <li class="active"><i class="fa fa-tree"></i> View Department</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Department </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('departments.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
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
