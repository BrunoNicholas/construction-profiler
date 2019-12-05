@extends('layouts.site')

@section('title') Upload Images @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Upload Images <small> Add image to your uploaded images</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
    	<li><a href="{{ route('images.index') }}"><i class="fa fa-image text-primary"></i>Images</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit Image </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-lg-9 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#urevenue-chart" data-toggle="tab">Edit </a></li>
					<li class="pull-left header"><i class="fa fa-edit text-info"></i><a href="{{ route('images.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
						<div class="card">
							<div class="card-header"><h4 style="width: 100%; text-align: center;"> Edit Image </h4></div>
                            <div class="card-body">
                            	<form action="{{ route('images.store') }}" enctype="multipart/form-data" method="POST">
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
                                                        <label for="file-item">Add Image :</label>
                                                        <input type="file" onclick="return confirm('Chosing a different image will delete the current one.\nClick okay if this is what you want.')" class="form-control" id="file-item" name="image" accept=".jpg, .png, .jpeg" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="main"> Select Gallery : </label>
                                                        <select class="custom-select form-control" name="gallery_id">
                                                        	<option value="{{ $image->gallery_id }}">Select to change gllary</option>
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
                                                        <label for="caption_text"> Image Title : </label>
                                                        <input type="text" name="title" value="{{ $image->title }}" class="form-control" id="caption_text" placeholder="Image Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="caption_text"> Image Caption : </label>
                                                        <input type="text" name="caption" class="form-control" id="caption_text" placeholder="Caption Text">
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ $image->user_id }}">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <div div class="col-md-12 text-center">
                                        <a href="{{ route('images.index') }}" class="btn btn-rounded btn-info" style="min-width: 150px;">Back</a>
                                        <button type="submit" class="btn btn-rounded btn-primary" style="min-width: 150px;">Update Image</button>
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