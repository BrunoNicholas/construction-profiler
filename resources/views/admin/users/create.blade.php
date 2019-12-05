@extends('layouts.site')

@section('title') New User @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Add New User <small> Create an new user profile!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-users text-primary"></i>Users</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-user-plus"></i> Add User</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-lg-9 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#urevenue-chart" data-toggle="tab">Create User Profile</a></li>
					<li class="pull-left header"><i class="fa fa-user-plus text-info"></i><a href="{{ route('users.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
						<div class="card">
							<div class="card-heading text-center">
								<h4>Create User Profile </h4>
							</div>
							<div class="card-body">
								<form action="{{ route('users.store') }}" class="form-horizontal form-bordered" method="post">

						            @csrf

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
						                    <label class="col-md-3 col-form-label text-right"> Full Names <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="name" autofocus required>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Email <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-md-9">
						                        <input type="email" class="form-control" name="email" required>
						                    </div>
						                </div>

						                <input type="hidden" name="password" value="{{ bcrypt('dollar') }}">

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Gender </label>
						                    <div class="col-md-9">
						                        <input type="radio" value="Male" name="gender" id="gMale"> <label for="gMale">Male </label>
						                        <input type="radio" value="Female" name="gender" id="gFemale"> <label for="gFemale">Female </label>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Date Of Birth </label>
						                    <div class="col-md-9">
						                        <input type="date" class="form-control" name="date_of_birth">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Telephone Number </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="telephone">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Nationality </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="nationality">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Occupation </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="occupation">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Place of work </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="place_of_work">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Previllage <span class="text-danger">*</span>
						                    </label>
						                    <div class="col-md-9">
				                                <select class="form-control custom-select" name="role">
				                                    <option value="subscriber">Please select</option>
				                                    @foreach($roles as $role)
				                                        <option value="{{ $role->name }}"><b>{{  $role->display_name . ' - ' . $role->description }}</b></option>
				                                    @endforeach
				                                </select>
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Work Address </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="work_address">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Home Address </label>
						                    <div class="col-md-9">
						                        <input type="text" class="form-control" name="home_address">
						                    </div>
						                </div>

						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> User Bio </label>
						                    <div class="col-md-9">
						                        <textarea class="form-control" name="bio"></textarea>
						                    </div>
						                </div>
						                <div class="form-group row">
						                    <label class="col-md-3 col-form-label text-right"> Account Status </label>
						                    <div class="col-md-9">
						                        <input type="radio" name="status" id="stat1" value="active"> <label for="stat1">Active </label>
						                        <input type="radio" name="status" id="stat2" value="not active"> <label for="stat2">Not Active </label>
						                        <input type="radio" name="status" id="stat3" value="available"> <label for="stat3">Available </label>
						                        <input type="radio" name="status" id="stat4" value="pending" checked> <label for="stat4">Pending </label>
						                        <input type="radio" name="status" id="stat5" value="blocked"> <label for="stat5">Blocked </label>
						                    </div>
						                </div>
						            </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route ('users.index') }}" class="btn btn-info btn-sm pull-left" style="min-width: 150px;"> <i class="fa-angle-left fa"></i> Back</a>
                                            </div>
                                            <div class="col-md-6 text-left">
                                                <button type="submit" class="btn btn-success btn-sm pull-right" style="min-width: 150px;"> <i class="fa fa-check"></i>Create User</button>
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