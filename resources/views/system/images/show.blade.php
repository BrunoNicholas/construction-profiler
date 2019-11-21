@extends('layouts.site')

@section('title') View Image @endsection
@section('styles', '') 
@section('page-tree')
    <h1> Image Details <small> View gallery image details. </small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
    	<li><a href="{{ route('images.index') }}"><i class="fa fa-image text-primary"></i>Images</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-image"></i> View Image </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Image </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('images.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> View Image Details </h4></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table m-b-0 text-left">
                                        <?php $i=0; ?>
                                        <tbody>
                                            @if($image->image)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Image: </th>
                                                    <td style="text-align: left;"><a href="{{ asset('files/storage/images/'.$image->image) }}" target="_blank">Image File</a></td>
                                                </tr>
                                            @endif
                                            @if($image->gallery_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Image Gallery: </th>
                                                    <td style="text-align: left;">
                                                        <a href="{{ route('galleries.show',$image->gallery_id) }}"> 
                                                            <img src="{{ asset('files/storage/images/' . App\Models\Gallery::where('id',$image->gallery_id)->first()->image) }}" style="width: 30px; border-radius: 50%;" alt="g-img"> 
                                                            {{ App\Models\Gallery::where('id',$image->gallery_id)->first()->gallery_name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($image->image_size)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Image Size/Caption: </th>
                                                    <td style="text-align: left;">{{ $image->image_size }}</td>
                                                </tr>
                                            @endif
                                            @if($image->title)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Gallery Image Title: </th>
                                                    <td style="text-align: left;">{{ $image->title }}</td>
                                                </tr>
                                            @endif
                                            @if($image->size)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Default Image Size: </th>
                                                    <td style="text-align: left;">{{ $image->size }}</td>
                                                </tr>
                                            @endif
                                            @if($image->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Added By: </th>
                                                    <td style="text-align: left;">
                                                        <a href="{{ route('users.show',$image->user_id) }}" target="_blank">
                                                            <img src="{{ asset('files/profile/images/' . App\User::where('id',$image->user_id)->first()->profile_image) }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                            {{ App\User::where('id',$image->user_id)->first()->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($image->description)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Description: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $image->description }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
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
                        <img src="{{ $image->image ? asset('files/storage/images/' . $image->image) : asset('start/images/icons/favicon.png') }}" style="max-width: 30px; border-radius: 50%;"> 
                        
                        Image Details | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ $image->image ? asset('files/storage/images/' . $image->image) : asset('start/images/icons/favicon.png') }}" alt="image image" style="border-radius: 3px; width: 100%;">
                        </div>
                        <div class="col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="form-control">
                                Added By: <a href="{{ route('users.show',$image->user_id) }}"> {{ App\User::where('id',$image->user_id)->get()->first()->name }} </a>
                            </div>
                        </div>
                        @role(['super-admin','admin'])
                            <div class="col-md-6">
                                <a href="{{ route('images.edit', $image->id) }}" class="btn btn-info btn-sm btn-xs btn-block"><i class="fa fa-edit"></i> Edit image</a>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('images.destroy', $image->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="tools">
                                        <button type="submit" class="btn btn-danger btn-xs btn-block"
                                            onclick="return confirm('You are about to delete this image!\nThis is not reversible!')" title="This will delete this entire image"><i class="fa fa-trash"></i> Delete </button>
                                    </div>
                                </form>
                            </div>
                        @endrole
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

@endsection