@extends('layouts.site')

@section('title') Edit Role @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Edit User Role <small> Edit user categories and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-edit"></i>Edit Role</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-lg-9 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#urevenue-chart" data-toggle="tab">Edit </a></li>
					<li class="pull-left header"><i class="fa fa-edit text-info"></i></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
						<div class="card">
							<div class="card-heading">
								<h4>Edit {{ $role->name }} Details </h4>
							</div>
							<div class="card-body" style="max-height: 255px; overflow-y: auto;">
								<form action="{{ route('roles.update', $role->id) }}" class="form-horizontal form-bordered" method="post">

						            {{ csrf_field() }}
						            {{ method_field('PATCH') }}

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
						                    <label class="col-lg-3 col-form-label text-right"> Name <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-lg-9">
						                        <input type="text" class="form-control" name="name" value="{{ $role->name }}" autofocus required>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-lg-3 col-form-label text-right"> Display Name </label>
						                    <div class="col-lg-9">
						                        <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" required>
						                    </div>
						                </div>							                

						                <div class="form-group row">
						                    <label class="col-lg-3 col-form-label"> Description </label>
						                    <div class="col-lg-9">
						                    	<textarea class="form-control" rows="3" name="description">
						                    		{{ $role->description }}
						                    	</textarea>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-lg-4 col-form-label"> Permissions <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-lg-6" style="max-height: 100px; overflow-y: auto;">
						                    	@foreach($permissions as $perm)
						                    		<input type="checkbox" 
						                    		{{ in_array($perm->id, $permission_role)?"checked":"" }}
						                    		name="permission[]" value="{{ $perm->id }}"> {{ $perm->display_name }} <br>
						                    	@endforeach
						                    </div>
						                </div>
						            </div>    
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: center;">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                                        <button type="submit" class="btn btn-info" style="min-width: 150px;"> <i class="fa fa-pencil"></i>Update Role</button>
                                                        <a href="{{ route ('roles.index') }}" class="btn btn-success" style="min-width: 150px;">Back</a>
                                                    </div>
                                                </div>
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