@extends('layouts.site')

@section('title') Add Role @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Add User Role <small> Add new user role category and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Add Role</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Roles </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                        	<div class="card-heading">
								<h4>Create New User Role </h4>
							</div>
							<div class="card-body" style="overflow-y: auto;">
								<form action="{{ route('roles.store') }}" class="form-horizontal form-bordered" method="post">

						            {{ csrf_field() }}

						            @foreach ($errors->all() as $error)
						            <p class="alert alert-danger">{{ $error }}</p>
						            @endforeach

						            @if (session('success'))
						            <div class="alert alert-success">
						            {{ session('success') }}
						            </div>
						            @endif
						                    
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">

						            <div class="form-body">
						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Name <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="name" autofocus required>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Display Name </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="display_name">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Description </label>
						                    <div class="col-md-9">
						                    	<textarea class="form-control" name="description"></textarea>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Permissions <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-md-9" style="max-height: 200px; overflow-y: auto;">
						                    	@foreach($permissions as $perm)
						                    		<input type="checkbox" name="permission[]" value="{{ $perm->id }}"> {{ $perm->display_name }} <br>
						                    	@endforeach
						                    </div>
						                </div>
						            </div>    
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route ('roles.index') }}" class="btn btn-info btn-sm pull-left" style="min-width: 150px;"> <i class="fa-angle-left fa"></i> Back</a>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <button type="submit" class="btn btn-danger btn-sm pull-right" style="min-width: 150px;"> <i class="fa fa-check"></i>Save Role</button>
                                            </div>
                                        </div>
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