@extends('layouts.site')

@section('title') Edit Project @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Edit Project <small> Edit saved project.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit Project </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-lg-9 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#urevenue-chart" data-toggle="tab">Edit </a></li>
					<li class="pull-left header"><i class="fa fa-edit text-info"></i><a href="{{ route('projects.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
						<div class="card">
							<div class="card-header"><h4 style="width: 100%; text-align: center;"> Edit Project </h4></div>
                            <div class="card-body">
                            	<form action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data" method="POST" class="tab-wizard wizard-circle">
                                    @csrf
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
                                    <!-- Step 1 -->
                                    <h6 class="text-center" style="width: 100%;">Category Info</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Names">Project Name :</label>
                                                    <input type="text" name="name" value="{{ $project->name }}" class="form-control" id="Names" placeholder="Fellowship Project Name" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="image">Add Image :</label>
                                                    <input type="file" id="image" class="form-control" name="description_image" accept=".jpg, .png, .jpeg">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="start-date">Start Date :</label>
                                                    <input type="date" value="{{ $project->start_date }}" class="custom-input form-control" id="start-date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end-date">End Date :</label>
                                                    <input type="date" value="{{ $project->end_date }}" class="custom-input form-control" id="end-date" name="end_date">
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ $project->user_id }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc">Project Description :</label>
                                                    <textarea name="description" placeholder="Project description here!" class="form-control" id="desc">{{ $project->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="period">Estimated Period :</label>
                                                        <input name="estimated_period" value="{{ $project->estimated_period }}" placeholder="Estimated period of action!" class="form-control" id="period">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="depts">Department in Charge :</label>
                                                        <select name="department" class="custom-select form-control" id="depts">
                                                            <option value="{{ $project->department }}">Select Department</option>
                                                            @foreach($departments as $depart)
                                                                <option value="{{ $depart->id }}">{{ $depart->department_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Project Status :</label>
                                                    <input type="radio" name="status" value="Approved" @if ($project->status == 'Approved')
                                                    	checked 
                                                    @endif> Approved
                                                    <input type="radio" name="status" value="Pending" @if ($project->status == 'Pending')
                                                    	checked 
                                                    @endif> Pending
                                                    <input type="radio" name="status" value="Active" @if ($project->status == 'Active')
                                                    	checked 
                                                    @endif> Active
                                                    <input type="radio" name="status" value="Done" @if ($project->status == 'Done')
                                                    	checked 
                                                    @endif> Done
                                                    <input type="radio" name="status" value="Open" @if ($project->status == 'Open')
                                                    	checked 
                                                    @endif> Open
                                                    <input type="radio" name="status" value="Closed" @if ($project->status == 'Closed')
                                                    	checked 
                                                    @endif> Closed
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <a href="{{ route('projects.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                        <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Update Project</button>
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