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
      {{-- users section --}}
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" onclick="window.location='{{ route('users.index') }}'">
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
      {{-- comanies section --}}
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" onclick="window.location='{{ route('companies.index') }}'">
          <span class="info-box-icon bg-red"><i class="ion ion-ios-toggle-outline"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Company Profiles</span>
            <span class="info-box-number">{{ App\Models\Company::where('status','active')->get()->count() }} Active<br><small>Total {{ $companies->count() }}</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      {{-- for worker profiles --}}
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" onclick="window.location='{{ route('profiles.index') }}'">
          <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Worker Profiles</span>
            <span class="info-box-number">{{ App\Models\WorkerProfile::where('status','active')->get()->count() }} Active<br><small>Total {{ $workers->count() }}</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box" onclick="window.location='{{ route('projects.index') }}'">
          <span class="info-box-icon bg-yellow"><i class="ion ion-clipboard"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Projects</span>
            <span class="info-box-number">{{ App\Models\Project::where('status','active')->get()->count() }} Active<br><small>Total {{ $projects->count() }}</small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <section class="col-lg-9 connectedSortable">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#urevenue-chart" data-toggle="tab"> System Users</a></li>
            <li><a href="#sales-chart" data-toggle="tab">System Roles</a></li>
            <li class="pull-left header"><i class="fa fa-tree"></i></li>
          </ul>
          <div class="tab-content no-padding">

            <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 400px;">
              <div class="col-lg-12">
                <div class="row" style="padding: 5px;">
                  <div class="card" style="max-height: 340px; overflow-y: auto;">
                    <div class="card-heading">
                      <h4>System Users</h4>
                    </div>
                    <div class="card-body">
                      <table  id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>System Role</th>
                            <th>Telephone</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody><!-- {{ $i=0 }} -->
                          @foreach($users as $user)
                            <tr>
                              <th>{{ ++$i }}</th>
                              <td class="text-left" style="min-width: 150px;"><img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 25px; border-radius: 40%;">
                                                  {{ $user->name }}</td>
                              <td class="text-left">{{ $user->email }}</td>
                              <td class="text-left">{{ $user->role ? App\Models\Role::where('name',$user->role)->first()->display_name: 'Hacker' }}</td>
                              <td class="text-left">{{ $user->telephone }}</td>
                              <td class="text-center" style="text-transform: capitalize;">
                                @if($user->status == 'active')
                                    <span class="btn-xs btn-rounded label label-success">{{ $user->status }}</span>
                                @elseif($user->status == 'away')
                                    <span class="btn-xs btn-rounded label label-warning">{{ $user->status }}</span>
                                @elseif($user->status == 'busy')
                                    <span class="btn-xs btn-rounded label label-danger">{{ $user->status }}</span>
                                @elseif($user->status == 'blocked')
                                    <span class="btn-xs btn-rounded label label-primary">{{ $user->status }}</span>
                                @elseif($user->status == 'inactive')
                                    <span class="btn-xs btn-rounded label label-info">{{ $user->status }}</span>
                                @else
                                    <span class="btn-xs btn-rounded label label-default">{{ $user->status }}</span>
                                @endif
                              </td>
                              <td class="row text-center">
                                  <a href="{{ route('users.show', $user->id) }}" class="col-5 btn btn-sm btn-info" style="font-size: 13px; margin: 2px;" title="User Details"><i class="fa fa-info-circle"></i></a>
                                  <a href="{{ route('users.edit', $user->id) }}" class="col-5 btn btn-sm btn-primary" style="font-size: 13px; margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>                    
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body" style="padding: 8px;">
                      <a href="{{ route('users.index') }}"><button class="btn btn-info btn-sm pull-right" style="min-width: 130px; margin: 2px;"><i class="fa fa-list"></i> Details</button></a>
                      <a href="{{ route('users.create') }}"><button class="btn btn-primary btn-sm pull-right" style="min-width: 130px; margin: 2px;"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 400px;">
              <div class="col-lg-12">
                <div class="row" style="padding: 5px;">
                  <div class="card" style="max-height: 340px; overflow-y: auto;">
                    <div class="card-heading">
                      <h4>System Roles</h4>
                    </div>
                    <div class="card-body">
                      <table  id="example2" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th class="text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody><!--{{ $a=0 }} -->
                          @foreach($roles as $role)
                          <tr>
                            <th>{{ ++$a }}</th>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->display_name }}</td>
                            <td style="max-width: 150px;">{{ $role->description }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-md text-info" title="Role Details"><i class="fa fa-info-circle"></i></a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-md text-primary"><i class="fa fa-edit" title="Edit Role Details"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body" style="padding: 8px;">
                      <a href="{{ route('roles.index') }}"><button class="btn btn-info btn-sm pull-right" style="min-width: 130px; margin: 2px;"><i class="fa fa-list"></i> Details</button></a>
                      <a href="{{ route('roles.create') }}"><button class="btn btn-primary btn-sm pull-right" style="min-width: 130px; margin: 2px;"><i class="fa fa-plus"></i> Add New</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <section class="col-lg-3 connectedSortable">

        <div class="box box-solid bg-light-blue-gradient">
          <div class="box-header">
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
              title="Date range">
                <i class="fa fa-calendar"></i>
              </button>
              <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
              data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                <i class="fa fa-minus"></i>
              </button>
            </div>
            <!-- /. tools -->

            <i class="fa fa-map-marker"></i>

            <h3 class="box-title">
            Questions
            </h3>
          </div>
          <div class="box-body">
            <div id="world-map" style="height: 250px; width: 100%;"></div>
          </div>

          <div class="box-footer no-border">
            <div class="row">
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <div id="sparkline-1"></div>
                <div class="knob-label">Visitors</div>
              </div>
              
              <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <div id="sparkline-2"></div>
                <div class="knob-label">Online</div>
              </div>
              
              <div class="col-xs-4 text-center">
                <div id="sparkline-3"></div>
                <div class="knob-label">View All</div>
              </div>
            <!-- ./col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
      </section>
    </div>
      
@endsection
