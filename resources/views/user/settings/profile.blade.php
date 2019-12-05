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
                  <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <input type="file" class="btn btn-sm" name="profile_image" accept=".jpg, .png, .jpeg" class="pull-left">
                        </li>
                    </ul>
                    
                    <button type="submit" class="btn btn-primary btn-block" ><i class="fa fa-done"></i> UPDATE IMAGE</button>
                  </form>
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
                  <strong><i class="fa fa-book margin-r-5"></i> Account Type </strong>

                  <p class="text-muted"><u>{{ App\Models\Role::where('name',Auth::user()->role)->first()->display_name }}</u> - <i>{{ App\Models\Role::where('name',Auth::user()->role)->first()->description }}</i></p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Projects</strong>
                  <p class="text-muted"></p>
                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Timeline Skills</strong>
                  <p>
                      <span class="label label-danger"></span>
                      <span class="label label-success"></span>
                      <span class="label label-info"></span>
                      <span class="label label-warning"></span>
                      <span class="label label-primary"></span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> My Bio </strong>

                  <p>{{ Auth::user()->bio }}</p>
              </div>
          </div>
		  </div>
      <div class="col-md-9">
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="#urevenue-chart" data-toggle="tab"> My Settings </a></li>
                  <li><a href="#changepass" data-toggle="tab"> Change Password </a></li>
                  <li><a href="#accinfo" data-toggle="tab"> Account Information </a></li>
                  <li class="pull-left header">
                      <i class="fa fa-tree text-info"></i>
                      <a href="{{ route('home') }}" class="btn btn-xs btn-info pull-left"><i class="fa-home fa"></i> Home </a>
                  </li> 
              </ul>
              <div class="tab-content padding">
                  <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                      <div class="card">
                          <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">{{ Auth::user()->name }} Settings</h3>
                              </div>
                              <div class="box-body">
                                  <form class="form-horizontal form-material" action="{{ route('users.update', $user->id) }}" method="POST">
                                      @csrf
                                      {{ method_field('PATCH') }}
                                      @foreach ($errors->all() as $error)
                                          <p class="alert alert-danger">{{ $error }}</p>
                                      @endforeach

                                      @if (session('success'))
                                          <div class="alert alert-success">
                                              {{ session('success') }}
                                          </div>
                                      @endif
                                      <div class="form-group">
                                          <label class="col-md-12">Full Name <span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                              <input type="text" placeholder="Full names" name="name" class="form-control form-control-line" value="{{ $user->name }}" required>
                                          </div>
                                      </div>
                                      <input type="hidden" name="email" value="{{ $user->email }}">
                                      <div class="form-group">
                                          <label for="example-email" class="col-md-12">Email</label>
                                          <div class="col-md-12">
                                              <input type="email" placeholder="Working Email" class="form-control form-control-line" value="{{ $user->email }}" id="example-email" disabled title="Email can not be changed while logged in.">
                                          </div>
                                      </div>
                                      <input type="hidden" name="router" value="profile">
                                      <div class="form-group">
                                          <label class="col-md-12">Gender</label>
                                          <div class="col-md-12">
                                              <input type="radio" value="Male" name="gender" @if ($user->gender == 'Male')
                                                  checked="checked" 
                                              @endif>   Male <br>
                                              <input type="radio" value="Female" name="gender" @if ($user->gender == 'Female')
                                                  checked="checked" 
                                              @endif> Female
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-12">Phone Number <span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                              <input type="text" name="telephone" placeholder="Working phone number" class="form-control form-control-line" value="{{ $user->telephone }}" required>
                                          </div>
                                      </div>
                                      {{-- <div class="form-group">
                                          <label class="col-md-12"> Marriage Status </label>
                                          <div class="col-md-12">
                                              <select name="maritual_status" class="form-control form-control-line" id="location5">
                                              <option value="{{ $user->maritual_status }}">Select marital status</option>
                                              <option value="Sinage">Sinage</option>
                                              <option value="Courting">Courting</option>
                                              <option value="Married">Married</option>
                                              <option value="Devorced">Devorced</option>
                                              <option value="Confidential">Confidential</option>
                                          </select>
                                          </div>
                                      </div> --}}
                                      <div class="form-group">
                                          <label class="col-md-12">Work Address </label>
                                          <div class="col-md-12">
                                              <input type="text" placeholder="where you stay Currently" name="work_address" class="form-control form-control-line" value="{{ $user->work_address }}">
                                          </div>
                                      </div><div class="form-group">
                                          <label class="col-md-12"> Home Address </label>
                                          <div class="col-md-12">
                                              <input type="date" placeholder="Your home address, where you currently live" name="home_address" class="form-control form-control-line" value="{{ $user->home_address }}">
                                          </div>
                                      </div>
                                      <input type="hidden" name="role" value="{{ $user->role }}">
                                      <div class="form-group">
                                          <label class="col-md-12">Nationality </label>
                                          <div class="col-md-12">
                                              <input type="text" placeholder="The country where you're from" name="nationality" class="form-control form-control-line" value="{{ $user->nationality }}">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-12">Occupation </label>
                                          <div class="col-md-12">
                                              <input type="text" placeholder="What you do for a living" name="occupation" class="form-control form-control-line" value="{{ $user->occupation }}">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-12">Your Description (Bio)</label>
                                          <div class="col-md-12">
                                              <textarea rows="5" class="form-control form-control-line" name="bio">{{ $user->bio }}</textarea>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-12">Account Status </label>
                                          <div class="col-md-12">
                                              <input type="radio" name="status" value="Active" @if (strtolower($user->status) == strtolower('Active'))
                                                  checked 
                                              @endif> Active
                                              <input type="radio" name="status" value="Busy" @if (strtolower($user->status) == strtolower('Busy'))
                                                  checked 
                                              @endif> Busy
                                              <input type="radio" name="status" value="Inactive" @if (strtolower($user->status) == strtolower('Inactive'))
                                                  checked 
                                              @endif> Inactive
                                              <input type="radio" name="status" value="Blocked" @if (strtolower($user->status) == strtolower('Blocked'))
                                                  checked 
                                              @endif> Blocked
                                              <input type="radio" name="status" value="Not Active" @if (strtolower($user->status) == strtolower('Not Active'))
                                                  checked 
                                              @endif> Not Active
                                              <input type="radio" name="status" value="Available" @if (strtolower($user->status) == strtolower('Available'))
                                                  checked 
                                              @endif> Available
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                              <button type="submit" class="btn btn-success"><i class="fa-check fa"></i> Update Profile</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </div>
                  </div>
                  <div class="chart tab-pane" id="changepass" style="position: relative; height: 500px; overflow-y: auto;">
                      <div class="card">
                          <div class="box">
                              <div class="box-header">
                                <h3 class="box-title"> Change My Password </h3>
                              </div>
                              <div class="box-body">
                                  <form class="form-horizontal form-material" action="{{ route('password.update') }}" method="POST">
                                      @csrf
                                      {{-- method_field('PATCH') --}}
                                      @foreach ($errors->all() as $error)
                                          <p class="alert alert-danger">{{ $error }}</p>
                                      @endforeach

                                      @if (session('success'))
                                          <div class="alert alert-success">
                                              {{ session('success') }}
                                          </div>
                                      @endif
                                      <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                      <div class="form-group">
                                          <label class="col-md-12">Previous Password <span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                              <input type="password" placeholder="Previously used password" name="previous_password" class="form-control form-control-line" required>
                                          </div>
                                      </div>
                                      <hr>
                                      <div class="form-group">
                                          <label class="col-md-12">New Password <span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                              <input type="password" placeholder="Enter new password" name="password" class="form-control form-control-line" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-md-12">Confirm Password <span class="text-danger">*</span></label>
                                          <div class="col-md-12">
                                              <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control form-control-line" required>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-12">
                                              <button type="submit" class="btn btn-danger"><i class="fa-warning fa"></i> Update Account Password</button>
                                          </div>
                                      </div>
                                  </form>                                  
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="chart tab-pane" id="accinfo" style="position: relative; height: 500px; overflow-y: auto;">
                      <div class="card">
                          <div class="box">
                              <div class="box-header">
                                <h3 class="box-title"> My Account Information </h3>
                              </div>
                              <div class="box-body">

                                  
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
	</div>
@endsection