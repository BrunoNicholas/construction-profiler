@extends('layouts.site')

@section('title') Administrator @endsection
@section('page-tree')
	<h1> Administrator <small>{{ Auth::user()->name }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="ion ion-ios-people-outline"></i> Home</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> Administrator</li>
    </ol>
@endsection
@section('content')
	<!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ App\User::where('status','active')->get()->count() }} Active<br><small>Total {{ $users->count() }}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-toggle-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Company Profiles</span>
              <span class="info-box-number">{{ App\Models\Company::where('status','active')->get()->count() }} Active<br><small>Total {{ $users->count() }}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Worker Profiles</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-clipboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Projects</span>
              <span class="info-box-number">0</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
@endsection
