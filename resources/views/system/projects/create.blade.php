@extends('layouts.site')

@section('title') Add Projects @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Add Project <small> Add new project.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i> New Project </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Project </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('projects.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Add Project </h4></div>
                            <div class="card-body">
                                <form action="{{ route('projects.store') }}" enctype="multipart/form-data" method="POST" class="tab-wizard wizard-circle">
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
                                    <!-- Step 1 -->
                                    <h6 class="text-center" style="width: 100%;">Category Info</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Names">Project Name :</label>
                                                    <input type="text" name="name" class="form-control" id="Names" placeholder=" Project Name" autofocus required>
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
                                                    <input type="date" value="{{ date('Y-m-d') }}" class="custom-input form-control" id="start-date" name="start_date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="end-date">End Date :</label>
                                                    <input type="date" class="custom-input form-control" id="end-date" name="end_date">
                                                </div>
                                            </div>
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="desc">Project Description :</label>
                                                    <textarea name="description" placeholder="Project description here!" class="form-control" id="desc"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="period">Estimated Period :</label>
                                                        <input name="estimated_period" placeholder="Estimated period of action!" class="form-control" id="period">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="depts">Department in Charge :</label>
                                                        <select name="department" class="custom-select form-control" id="depts">
                                                            <option value="1">Select Department</option>
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
                                                    <input type="radio" name="status" value="Approved"> Approved
                                                    <input type="radio" name="status" value="Pending" checked> Pending
                                                    <input type="radio" name="status" value="Active"> Active
                                                    <input type="radio" name="status" value="Done"> Done
                                                    <input type="radio" name="status" value="Open"> Open
                                                    <input type="radio" name="status" value="Closed"> Closed
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <a href="{{ route('projects.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                        <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Add Project</button>
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