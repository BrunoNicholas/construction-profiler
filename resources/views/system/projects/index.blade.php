@extends('layouts.site')

@section('title') Projects @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Projects <small> View, @role(['super-admin','admin']) user and system @else your @endrole projects.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	{{-- <li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li> --}}
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-list"></i> Projects </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Projects </a></li>
                    <li class="pull-left header"><i class="fa fa-list text-info"></i><a href="{{ route('projects.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Projects </h4></div>
                            <div class="card-body">
                                <div class="row">
                                    @if(sizeof($projects) < 1)
                                        <p class="alert alert-danger">No project found!</p>
                                    @endif
                                    @foreach($projects as $project)
                                        <div class="col-md-4">
                                            <a href="{{ route('projects.show', $project->id) }}">
                                                <div class="panel  panel-hover">
                                                    @if($project->description_image)
                                                        <img class="panel-img-top img-responsive" src="{{ asset('files/projects/images/' . $project->description_image) }}" alt="Card image cap" style="height: 200px; width: auto;">
                                                    @else
                                                        <img class="panel-img-top img-responsive" src="{{ asset('asset/img/logomi.png') }}" alt="Card image cap" style="height: 200px; width: auto;">
                                                    @endif
                                                    <div class="panel-body">
                                                        <div class="d-flex no-block align-items-center m-b-15">
                                                            <span class="pull-left"><i class="ti-calendar"></i> {{ $project->start_date }} </span>
                                                            <div class="ml-auto pull right">
                                                                <span><i class="ti-calendar"></i> {{ $project->end_date }} </span>
                                                            </div>
                                                        </div>
                                                        <h3 class="font-normal text-center"> {{ $project->name }} </h3>
                                                        <!-- <p class="m-b-0 m-t-10"> {{ $project->description }} </p> -->
                                                        <button class="btn btn-success btn-round btn-xs waves-effect waves-light m-t-20 pull-left" style="margin: 1px;"> Details </button>
                                                        <span class="btn btn-info label-round btn-xs waves-effect waves-light m-t-20 pull-left" style="margin: 1px; text-transform: capitalize;"> {{ $project->status }} </span>
                                                        @role(['super-admin','admin','patron','chaiperson'])
                                                            <form action="{{ route('projects.destroy', $project->id) }}" method="post">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                 <button class="btn btn-danger btn-xs btn-round waves-effect waves-light m-t-20 pull-right" onclick="return confirm('Are you sure you want to delete this project?')" style="margin: 1px;"> Delete </button>
                                                            </form>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

@endsection