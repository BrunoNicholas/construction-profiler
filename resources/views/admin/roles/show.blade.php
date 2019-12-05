@extends('layouts.site')

@section('title') view Role @endsection
@section('styles', '') 
@section('page-tree')
    <h1> view User Role <small> view user role category and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Edit Role</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> User Role Details </a></li>
                    <li class="pull-left header"><i class="fa fa-tree text-info"></i><a href="{{ route('roles.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                	<table class="table m-b-0 text-left">
                                		<thead>
			                                <tr>
			                                    <th style="text-align: center;" scope="col">#</th>
			                                    <th style="text-align: center;" scope="col">Attribute</th>
			                                    <th style="text-align: center;" scope="col">Value</th>
			                                    <th style="text-align: center;" scope="col">Relevance</th>
			                                </tr>
			                            </thead>
			                            <?php $i=0; ?>
			                            <tbody>
			                                @if($role->name)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Database Names</td>
			                                        <td style="text-align: center;">{{ $role->name }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($role->display_name)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Display Name</td>
			                                        <td style="text-align: center;">{{ $role->display_name }}</td>
			                                        <td>Not Required</td>
			                                    </tr>
			                                @endif
			                                @if($role->description)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Description</td>
			                                        <td style="text-align: center;">{{ $role->description }}</td>
			                                        <td>Not Required</td>
			                                    </tr>
			                                @endif
			                            </tbody>

                                	</table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-md-4 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('start/images/icons/favicon.png') }}" style="max-width: 30px; border-radius: 50%;"> 
                        
                        Options | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                    	<div class="row text-center">
	                        <div class="col-md-6">
	                            <a href="{{ route('roles.index') }}" class="btn btn-primary btn-rounded btn-block"> Back </a>
	                        </div>
	                        <div class="col-md-6">
	                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
	                                {{ csrf_field() }}
	                                {{ method_field('DELETE') }}
	                                <div class="tools">
	                                    <button type="submit" class="btn btn-danger btn-rounded btn-block"
	                                        @if(Auth::user()->role != 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
	                                </div>
	                            </form>
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