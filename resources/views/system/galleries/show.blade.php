@extends('layouts.site')

@section('title') View Gallery @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View Gallery <small> View image gallery</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-tree"></i> View Gallery </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Galleries </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('galleries.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> Gallery Details </h4></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table m-b-0 text-left">
                                        <?php $i=0; ?>
                                        <tbody>
                                            @if($gallery->gallery_name)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Gallery Name: </th>
                                                    <td style="text-align: left;">{{ $gallery->gallery_name }}</td>
                                                </tr>
                                            @endif
                                            @if($gallery->gallery_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Main Gallery: </th>
                                                    <td style="text-align: left;"><a href="{{ route('galleries.show',$gallery->gallery_id) }}"> <img src="{{ asset('files/storage/images/' . App\Models\Gallery::where('id',$gallery->gallery_id)->first()->image) }}" style="width: 30px; border-radius: 50%;" alt="g-img"> {{ App\Models\Gallery::where('id',$gallery->gallery_id)->first()->gallery_name }}</a></td>
                                                </tr>
                                            @endif
                                            @if($gallery->caption)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Gallery Image Caption: </th>
                                                    <td style="text-align: left;">{{ $gallery->caption }}</td>
                                                </tr>
                                            @endif
                                            @if($gallery->title)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Gallery Image Title: </th>
                                                    <td style="text-align: left;">{{ $gallery->title }}</td>
                                                </tr>
                                            @endif
                                            @if($gallery->size)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Default Image Size: </th>
                                                    <td style="text-align: left;">{{ $gallery->size }}</td>
                                                </tr>
                                            @endif
                                            @if($gallery->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Created By: </th>
                                                    <td style="text-align: left;">
                                                        <a href="{{ route('users.show',$gallery->user_id) }}" target="_blank">
                                                            <img src="{{ asset('files/profile/images/' . App\User::where('id',$gallery->user_id)->first()->profile_image) }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                            {{ App\User::where('id',$gallery->user_id)->first()->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($gallery->status)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;"> Gallery Status: </th>
                                                    <td style="text-align: left; text-transform: capitalize;">{{ $gallery->status }}</td>
                                                </tr>
                                            @endif
                                            @if($gallery->description)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Description: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $gallery->description }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box">
                                    <h3 class="box-header text-center">Gallery Images</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        @foreach($gallery->images as $image)
                                            <div class="col-md-4" style="padding-top: 10px;" onclick="window.location='{{ route('images.show',$image->id) }}'">
                                                <div class="card" style="border: thin solid transparent;">
                                                    <div class="el-card-item">
                                                        <div class="el-card-avatar el-overlay-1" style="text-align: center;"> 
                                                            <div style="max-width: 450px; overflow-x: auto;">
                                                                <img src="{{ asset('files/storage/images/'. $image->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 3px;"/>
                                                            </div>
                                                            <div class="el-overlay">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        {{ explode(' ',trim($image->created_at))[1] }}
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        {{ explode(' ',trim($image->created_at))[0] }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="el-card-content">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 class="block">
                                                                        <b class="pull-left">{{ substr($image->title, 0,15) }} 
                                                                            <small>
                                                                            </small>
                                                                        </b> 
                                                                        <small class="pull-right">
                                                                            
                                                                        </small>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-md-4 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">

                    </h3>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12"> 
                                <a href="{{ asset('files/storage/images/'. $gallery->image) }}" target="_blank">
                                    <img src="{{ asset('files/storage/images/' . $gallery->image) }}" alt="Gallery Image" style="border-radius: 5px; max-width: 100%;">
                                </a>
                                <hr>
                                <a href="{{ route('galleries.edit', $gallery->id) }}"><i class="fa-edit fa"></i> Edit This Gallery </a>
                                <hr>
                                <form method="POST" action="{{ route('galleries.destroy', $gallery->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('This will delete your album and it\'s image complately. It is not reversible.\nIs this okay?')" class="btn btn-sm btn-block btn-default text-danger">Delete Gallery</button>
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