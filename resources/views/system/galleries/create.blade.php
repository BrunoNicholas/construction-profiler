@extends('layouts.site')

@section('title') Add Gallery @endsection
@section('styles', '') 
@section('page-tree')
    <h1> New Gallery <small> Add new image galleries</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus"></i> New Gallery </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Add Galleries </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('galleries.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Create Gallery </h4></div>
                            <div class="card-body">
                                <form action="{{ route('galleries.store') }}" enctype="multipart/form-data" method="POST">
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
                                    <h6 class="text-center">Category Info</h6>
                                    <br>
                                    <section class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Names"> Gallery Name (If new): </label>
                                                        <input type="text" name="gallery_name" class="form-control" id="Names" placeholder="Fill this for a new gallery" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="main"> Main Gallery : </label>
                                                        <select class="custom-select form-control" name="main_gallery">
                                                            <option value="">Chose from Existing</option>
                                                            @foreach($galleries as $gallery)
                                                                <option value="{{ $gallery->id }}">{{ $gallery->gallery_name . ' ('. $gallery->title . ') ' }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image-title"> Image Title : </label>
                                                        <input type="text" name="title" class="form-control" id="image-title" placeholder="Title of image" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="image-size"> Image Size : </label>
                                                        <input type="text" name="size" class="form-control" id="image-size" placeholder="the size of the image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="caption_text"> Image Caption : </label>
                                                        <input type="text" name="caption" class="form-control" id="caption_text" placeholder="Caption Text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="file-item">Add Image :</label>
                                                        <input type="file" class="form-control" id="file-item" name="image" accept=".jpg, .png, .jpeg" required>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                    <input type="hidden" name="status" value="Active">
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="item-description">Item Description : </label>
                                                <textarea name="description" placeholder="Gallery description  details here!" class="form-control" id="item-description" required></textarea>
                                            </div>
                                        </div>
                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <a href="{{ route('galleries.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                        <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Add Gallery</button>
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