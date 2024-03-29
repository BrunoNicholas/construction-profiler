@extends('layouts.site')

@section('title') Images @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-tree')
    <h1> Images <small> Manage your uploaded images</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
    	<li><a href="{{ route('galleries.index') }}"><i class="fa fa-image text-primary"></i>Galleries</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-image"></i> Images </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Images </a></li>
                    <li class="pull-left header"><i class="fa fa-image text-info"></i><a href="{{ route('images.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li><!-- <?php $b=0; ?> -->
                    <div class="pull-right" style="margin: 5px;">@foreach($galleries as $gallery) <a href="#{{ $gallery->id }}" class="btn btn-sm btn-default">{{ ++$b }}</a> @endforeach</div>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <?php $i=0; ?>
                            <div class="card-body">
                                <div class="row">
                                    @if(sizeof($images) < 1)
                                        <p class="col-md-12 alert alert-danger" style="padding-left: 50px;"> No image items found! </p>
                                    @endif
                                    @foreach($galleries as $gallery)
                                        <div id="{{ $gallery->id }}" class="col-md-12" style="border-bottom: thin solid #e6e6e6; padding-bottom: 5px;">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <h3>{{ $gallery->gallery_name }}</h3>
                                                </div>
                                                <div class="card-body">
                                                    @foreach($gallery->images as $image)
                                                        <div class="col-md-3" style="padding-top: 10px;" onclick="window.location='{{ route('images.show',$image->id) }}'">
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
        })
    </script>
@endsection