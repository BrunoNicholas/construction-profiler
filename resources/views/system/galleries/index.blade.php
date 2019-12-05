@extends('layouts.site')

@section('title') Galleries @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-tree')
    <h1> Galleries <small> Manage your image galleries</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('profile') }}"><i class="fa fa-dashboard text-primary"></i>Settings</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-image"></i> Galleries </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Galleries </a></li>
                    <li class="pull-left header"><i class="fa fa-image text-info"></i><a href="{{ route('galleries.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card"> <?php $i=0; ?>
                            <div class="card-body">
                                <div class="row">
                                    @if(sizeof($galleries) < 1)
                                        <p class="col-md-12 alert alert-danger" style="padding-left: 50px;"> No gallery items found! </p>
                                    @endif
                                    @foreach($galleries as $gallery)
                                        <div class="col-md-4" style="padding-top: 10px;" onclick="window.location='{{ route('galleries.show', $gallery->id) }}'">
                                    <div class="card" style="border: thin solid transparent;">
                                        <div class="el-card-item">
                                            <div class="el-card-avatar el-overlay-1" style="text-align: center;"> 
                                                <div style="max-width: 450px; overflow-x: auto;">
                                                    <img src="{{ asset('files/storage/images/'. $gallery->image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 5px;"/>
                                                </div>
                                                <div class="el-overlay">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span>{{ explode(' ', trim($gallery->created_at))[0] }}</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span class="text-muted"> {{ $gallery->images->count() }} Photos </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="el-card-content">
                                                <div class="row">                                                    
                                                    <div class="col-md-4 pull-left">
                                                        
                                                    </div>
                                                    <div class="col-md-8 pull-right">
                                                        
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