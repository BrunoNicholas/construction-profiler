@extends('layouts.site')

@section('title') Company @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Register Company <small> Manage the registered companies!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('companies.index') }}"><i class="ion ion-ios-toggle-outline text-primary"></i>Companies</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i>Add Company</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Company </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('companies.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Add Company </h4></div>
                            <div class="card-body">
                                <form action="{{ route('companies.store') }}" enctype="multipart/form-data" method="POST">
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
                                    <section class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_item">Company Name :</label>
                                                        <input type="text" name="company_name" class="form-control" id="file_item" placeholder="Your Profile Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_item">Company Email :</label>
                                                        <input type="email" name="company_email" value="{{ Auth::user()->email }}" class="form-control" id="file_item" placeholder="Your Profile Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_item">Company Telephone :</label>
                                                        <input type="text" name="company_telephone" value="{{ Auth::user()->telephone }}" class="form-control" id="file_item" placeholder="Your Profile Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file_item">Location :</label>
                                                        <input type="text" name="company_location" class="form-control" id="file_item" placeholder="GPS Cordinates Location (E.g 1.243 32.5511)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image">Company Logo :</label>
                                                        <input type="file" id="image" class="form-control" name="company_logo" accept=".jpg, .png, .jpeg">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Company Status : </label>
                                                        <div class="">
                                                            <input type="radio" name="status" id="caption_text" placeholder="Caption Text" value="Active"> <label for="caption_text"> Active </label> 
                                                            <input type="radio" name="status" id="caption_text" placeholder="Caption Text" value="Busy"> <label for="caption_text"> Busy </label> 
                                                            <input type="radio" name="status" id="caption_text1" placeholder="Caption Text" value="Pending" checked> <label for="caption_text1"> Pending </label> 
                                                            <input type="radio" name="status" id="caption_text2" placeholder="Caption Text" value="Achived"> <label for="caption_text2"> Achived </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="desc_prof"> Profile Description : </label>
                                                        <textarea name="company_description" rows="4" class="form-control" id="desc_prof" placeholder="Your company description for your profile."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="desc_prof"> Profile Bio : </label>
                                                        <textarea name="company_bio" rows="4" class="form-control" id="desc_prof" placeholder="Your company bio information."></textarea>
                                                    </div>
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