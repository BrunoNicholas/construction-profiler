@extends('layouts.site')

@section('title') Add Department @endsection
@section('styles', '')
@section('page-tree')
	<h1> Add Departments <small> Add new system department.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-dashboard text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        <li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i> Departments </a></li>
        <li class="active"><i class="fa fa-plus"></i> New Department</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Department </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('departments.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ route('departments.store') }}" method="POST" class="tab-wizard wizard-circle">
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

                                    <h6 style="width: 100%; text-align: center;">Required Information</h6>
                                    <hr>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Names">Department Name <span class="text-danger">*</span> : </label>
                                                    <input type="text" name="department_name" class="form-control" id="Names" autofocus required> 
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="department1">Main Department (Optional) <span class="text-danger">*</span> :</label>
                                                    <select name="parent_department" class="custom-select form-control" id="department1">
                                                        <option value="">Select Parent Department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phoneNumber1">Status :</label>
                                                    <select name="status" class="custom-select form-control" id="phoneNumber1" required>
                                                        <option value="Active">Active</option>
                                                        <option value="Suspended">Suspended</option>
                                                        <option value="Blocked">Blocked</option>
                                                        <option value="Removed">Removed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description11">Description :</label>
                                                    <textarea class="form-control" name="description" placeholder="Department description details" id="description11"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-rounded btn-success">Submit Department</button>
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
