@extends('layouts.site')

@section('title') Home  @endsection
@section('page-tree')
    <h1> <i class="fa fa-home"></i> Home <small>{{ config('app.description') }}</small></h1>
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-home"></i> Home</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Your progress at {{ config('app.name') }}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                Today: <strong> {{ date('d / m / Y') }}, <span id="MyClockDisplay"></span> </strong>
              </p>

              <div class="chart row">
                <div class="col-md-6">
                  <img src="{{ asset('files/profile/images/'.Auth::user()->profile_image) }}" style="border-radius: 5px;">
                </div>
                <div class="col-md-6">
                  <div class="panel">
                    <div class="panel-header">
                      Current Projects
                    </div>
                    <div class="panel-body">
                      Hello
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <p class="text-center">
                <strong>Timeline Reviews</strong>
              </p>

              <div class="progress-group">
                <span class="progress-text">Total Complete Projects</span>
                <span class="progress-number"><b>{{ App\Models\Project::where('status','done')->get()->count() }}</b>/{{ App\Models\Project::all()->count() }}</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-aqua" style="width: {{ (App\Models\Project::where('status','done')->get()->count())/(App\Models\Project::all()->count())*100  }}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              {{-- <div class="progress-group">
                <span class="progress-text">Complete Purchase</span>
                <span class="progress-number"><b>310</b>/400</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Visit Premium Page</span>
                <span class="progress-number"><b>480</b>/800</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
              <div class="progress-group">
                <span class="progress-text">Send Inquiries</span>
                <span class="progress-number"><b>250</b>/500</span>

                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                </div>
              </div> --}}
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-green"><i class="fa fa-tree"></i> {{ App\Models\Project::all()->count() }} </span>
                <h5 class="description-header">
                  <div>
                    <a href="{{ route('projects.index') }}">
                      <button class="btn btn-sm btn-success" style="margin: 1px; min-width: 90px;">View All</button>
                    </a>
                    <a href="{{ route('projects.index') }}">
                      <button class="btn btn-sm btn-success" style="margin: 1px; min-width: 90px;">Add New</button>
                    </a>
                  </div>
                </h5>
                <span class="description-text">PROJECTS</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-info"><i class="fa fa-user-plus"></i> 0 </span>
                <h5 class="description-header">
                  <div>
                    <a href="{{ route('profiles.index') }}">
                      <button class="btn btn-sm btn-info" style="margin: 1px; min-width: 90px;">View All</button>
                    </a>
                    @role('')

                    @else
                      <a href="{{ route('profiles.create') }}" onclick="return confirm('This will change your profile to a service provider under this platform.\nIs this what you want?')">
                        <button class="btn btn-sm btn-info" style="margin: 1px; min-width: 90px;"><i class="fa fa-warning"></i> Create Profile</button>
                      </a>
                    @endrole
                  </div>
                </h5>
                <span class="description-text">PROFILES</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block border-right">
                <span class="description-percentage text-orange"><i class="fa fa-book"></i> 0 </span>
                <h5 class="description-header">
                  <div>
                    <a href="{{ route('companies.index') }}">
                      <button class="btn btn-sm btn-warning" style="margin: 1px; min-width: 90px;">View All</button>
                    </a>
                    @role('')

                    @else
                      <a href="{{ route('companies.create') }}" onclick="return confirm('This will change your profile to a company owner under this platform.\nIs this what you want?')">
                        <button class="btn btn-sm btn-warning" style="margin: 1px; min-width: 90px;"><i class="fa fa-warning"></i> Create New</button>
                      </a>
                    @endrole
                  </div>
                </h5>
                <span class="description-text">COMPANIES</span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-xs-6">
              <div class="description-block">
                <span class="description-percentage text-primary"><i class="fa fa-list"></i> 0 </span>
                <h5 class="description-header">
                  <div>
                    <a href="{{ route('posts.index') }}">
                      <button class="btn btn-sm btn-primary" style="margin: 1px; min-width: 90px;">View All</button>
                    </a>
                    @role(['super-admin','admin'])
                      <a href="{{ route('posts.create') }}" onclick="return confirm('This will change your profile to a company owner under this platform.\nIs this what you want?')">
                        <button class="btn btn-sm btn-primary" style="margin: 1px; min-width: 90px;">Create New</button>
                      </a>                      
                    @endrole
                  </div>
                </h5>
                <span class="description-text">POSTS</span>
              </div>
              <!-- /.description-block -->
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- MAP & BOX PANE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Report & Information</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="row">
            <div class="col-md-9 col-sm-8">
              <div class="pad">
                <!-- Map will be created here -->
                <div class="card" style="height: 325px;">
                  <div class=" card-body">
                    <div class="row">
                      <div class="col-md-12">
                        Hello there...
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-4">
              <div class="pad box-pane-right bg-green" style="min-height: 280px">
                <div class="description-block margin-bottom">
                  <div class="" data-color="#fff">Questions</div>
                  <h5 class="description-header">0</h5>
                  <a href="javascript:void(0)"><span class="description-text btn btn-primary">View All</span></a>
                </div>
                <!-- /.description-block -->
                <div class="description-block margin-bottom">
                  <div class="" data-color="#fff">All Posts</div>
                  <h5 class="description-header">0</h5>
                  <a href="javascript:void(0)"><span class="description-text btn btn-primary">View All</span></a>
                </div>
                <!-- /.description-block -->
                <div class="description-block">
                  <div class="" data-color="#fff">Project Teams</div>
                  <h5 class="description-header">0</h5>
                  <a href="javascript:void(0)"><span class="description-text btn btn-primary">View All</span></a>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Rated Profiles</h3>

          <div class="box-tools pull-right">
            {{-- <span class="label label-danger">8 New Members</span> --}}
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <ul class="users-list clearfix">
            <li>
              <img src="{{ asset('assets/img/user1-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Alexander Pierce</a>
              <span class="users-list-date">Available</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user8-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Norman</a>
              <span class="users-list-date">Busy</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user7-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Jane</a>
              <span class="users-list-date">Busy</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user6-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">John</a>
              <span class="users-list-date">Away</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user2-160x160.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Alexander</a>
              <span class="users-list-date">Available</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user5-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Sarah</a>
              <span class="users-list-date">Available</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user4-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Nora</a>
              <span class="users-list-date">Busy</span>
            </li>
            <li>
              <img src="{{ asset('assets/img/user3-128x128.jpg') }}" alt="User Image">
              <a class="users-list-name" href="#">Nadia</a>
              <span class="users-list-date">Available</span>
            </li>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
          <a href="javascript:void(0)" class="uppercase">View All Users</a>
        </div>
        <!-- /.box-footer -->
      </div>
    </div>
    {{-- <div class="col-md-4">

      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Inventory</span>
          <span class="info-box-number">5,200</span>

          <div class="progress">
            <div class="progress-bar" style="width: 50%"></div>
          </div>
          <span class="progress-description">
                50% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Mentions</span>
          <span class="info-box-number">92,050</span>

          <div class="progress">
            <div class="progress-bar" style="width: 20%"></div>
          </div>
          <span class="progress-description">
                20% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Downloads</span>
          <span class="info-box-number">114,381</span>

          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
                70% Increase in 30 Days
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.box -->
    </div> --}}
    <!-- /.col -->
  </div>
@endsection
@section('scripts')

@endsection
