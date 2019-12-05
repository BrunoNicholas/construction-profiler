@extends('layouts.site')

@section('title') Add Worker Profile @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Add Worker Profile <small> Add new review worker profiles.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
    	<li><a href="{{ route('profiles.index') }}"><i class="fa fa-home text-primary"></i>Worker Profiles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-user-plus"></i> New Profiles </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Profile </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('profiles.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Add Worker Profile </h4></div>
                            <div class="card-body">
                                <form action="{{ route('profiles.store') }}" method="POST">
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
                                    <br>
                                    <h6 class="text-center">Required Information</h6>
                                    <br>
                                    <section class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_item">Profile Name :</label>
                                                        <input type="text" name="profile_name" class="form-control" id="file_item" placeholder="Your Profile Name" value="Engineer {{ Auth::user()->name }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="main"> Profile Category : </label>
                                                        <select class="custom-select form-control" name="profile_category">
                                                            <option value="Plumber">Plumber</option>
                                                            <option value="Architect">Architect</option>
                                                            <option value="Land Surveyor">Land Surveyor</option>
                                                            <option value="Painter">Painter</option>
                                                            <option value="Manual Contrustor">Manual Contrustor</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="desc_prof"> Profile Description : </label>
                                                        <textarea name="profile_description" rows="8" class="form-control" id="desc_prof" placeholder="Your work description for your profile."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Profile Status : </label>
                                                        <div class="">
                                                            <input type="radio" name="status" id="caption_text" placeholder="Caption Text" value="Active"> <label for="caption_text"> Active </label> <br>
                                                            <input type="radio" name="status" id="caption_text1" placeholder="Caption Text" value="Pending" checked> <label for="caption_text1"> Pending </label> <br>
                                                            <input type="radio" name="status" id="caption_text2" placeholder="Caption Text" value="Achived"> <label for="caption_text2"> Achived </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <a href="{{ route('profiles.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                        <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;"> Create Profile</button>
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