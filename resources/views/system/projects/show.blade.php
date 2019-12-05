@extends('layouts.site')

@section('title') View Project @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View Project <small> View saved project.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-tree"></i> View Project </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-md-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Project </a></li>
                    <li class="pull-left header"><i class="fa fa-tree text-info"></i><a href="{{ route('projects.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> View Project </h4></div>
                            <div class="card-body">
                                @if($project->name)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Project name : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->name }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->department)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Department in charge : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ App\Models\Department::where('id',$project->department)->get()->first()->department_name }} | {{ config('app.name') }} Board
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->description)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Project description : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->description }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->estimated_period)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Operationaltime : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->estimated_period }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->start_date)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Starting date : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->start_date }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->end_date)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Ending date : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->end_date }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->created_by)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Created by : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ App\User::where('id',$project->user_id)->get()->first()->name . ' | ' . App\Models\Role::where('name',App\User::where('id',$project->user_id)->get()->first()->role)->get()->first()->display_name }}
                                    </div>
                                </div>
                                <hr>
                                @endif
                                @if($project->status)
                                <div class="row">
                                    <div class="col-md-3">
                                        <label> Project status : </label>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $project->status }}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-4 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @if($project->description_image)
                            <img src="{{ asset('files/projects/images/'. $project->description_image) }}" style="max-width: 30px; border-radius: 50%;"> 
                        @else
                            <img src="{{ asset('app/images/favicon.png') }}" style="max-width: 30px; border-radius: 50%;">
                        @endif
                        Project Details | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            @if($project->description_image)
                                <img src="{{ asset('files/projects/images/'.$project->description_image) }}" alt="project image" style="border-radius: 3px;">
                            @else
                                <img src="{{ asset('app/images/favicon.png') }}" alt="project image" style="border-radius: 3px;">
                            @endif
                        </div>
                        @role(['super-admin','admin'])
                            <div class="col-md-6">
                                <a href="{{ route('projects.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-rounded btn-block"
                                            onclick="return confirm('You are about to delete this project!\nThis is not reversible!')" title="This will delete this entire project"> Delete </button>
                                    </div>
                                </form>
                            </div>
                        @endrole
                        <div class="col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="form-control">
                                Created By: <a href="{{ route('users.show',$project->user_id) }}"> {{ App\User::where('id',$project->user_id)->get()->first()->name }} </a>
                            </div>
                        </div>
                        @role(['super-admin','admin'])
                            <div class="col-md-6">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-info btn-sm btn-rounded btn-block">Edit Project</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('projects.index') }}" class="btn btn-success btn-sm btn-rounded btn-block">Back</a>
                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection