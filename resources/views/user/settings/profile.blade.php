@extends('layouts.site')

@section('title') My Profile - {{ Auth::user()->name }} @endsection
@section('page-tree')
	<h1> My Profile - {{ Auth::user()->name }} <small>{{ Auth::user()->name }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-user-plus"></i> My Profile Settings</li>
    </ol>
@endsection
@section('content')
	<div class="row">
      <div class="col-md-3">
        	<!-- Profile Image -->
          <div class="box box-primary">
              <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" alt="User picture">

                  <h3 class="profile-username text-center">{{ Auth::user()->name }}<br><small><i>{{ Auth::user()->email }}</i></small> </h3>

                  <p class="text-muted text-center">{{ Auth::user()->occupation }}</p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                  </ul>

                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
@endsection