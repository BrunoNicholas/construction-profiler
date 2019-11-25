@extends('layouts.site')

@section('title') View User @endsection
@section('styles', '') 
@section('page-tree')
    <h1> View User <small> View an existing user profile!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
    	<li><a href="{{ route('users.index') }}"><i class="fa fa-users text-primary"></i>Users</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-user-o"></i>View User</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> User Details </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('users.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                	<table class="table m-b-0 text-left">
	                                	<thead>
			                                <tr>
			                                    <th style="text-align: center;" scope="col">#</th>
			                                    <th style="text-align: center;" scope="col">Attribute</th>
			                                    <th style="text-align: center;" scope="col">Value</th>
			                                    <th style="text-align: center;" scope="col">Relevance</th>
			                                </tr>
			                            </thead>
			                            <?php $i=0; ?>
			                            <tbody>
			                                @if($user->name)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Full Names</td>
			                                        <td style="text-align: center;">{{ $user->name }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->email)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Email</td>
			                                        <td style="text-align: center;">{{ $user->email }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->telephone)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Telephone</td>
			                                        <td style="text-align: center;">{{ $user->telephone }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->date_of_birth)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Date Of Birth</td>
			                                        <td style="text-align: center;">{{ $user->date_of_birth }}</td>
			                                        <td>Not Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->place_of_work)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Place of Work</td>
			                                        <td style="text-align: center;">{{ $user->place_of_work }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->church)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Ministry (Church)</td>
			                                        <td style="text-align: center;">{{ $user->church }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->nationality)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Nationality</td>
			                                        <td style="text-align: center;">{{ $user->nationality }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->occupation)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Occupation</td>
			                                        <td style="text-align: center;">{{ $user->occupation }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->work_address)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left"> Address of Work </td>
			                                        <td style="text-align: center;">{{ $user->work_address }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->home_address)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left"> Address of Home </td>
			                                        <td style="text-align: center;">{{ $user->home_address }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->gender)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Gender</td>
			                                        <td style="text-align: center;">{{ $user->gender }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->year_enrolled)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Year Enrolled</td>
			                                        <td style="text-align: center;">{{ $user->year_enrolled }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->unenrollment_year)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Graduation Year</td>
			                                        <td>{{ $user->unenrollment_year }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->role)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">System Role</td>
			                                        <td style="text-align: center">{{ App\Models\Role::where('name',$user->role)->get()->first()->display_name }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->bio)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left;">User Bio</td>
			                                        <td style="text-align: left;">{{ $user->bio }}</td>
			                                        <td>Required</td>
			                                    </tr>
			                                @endif
			                                @if($user->status)
			                                    <tr>
			                                        <th scope="row">{{ ++$i }}</th>
			                                        <td style="text-align: left">Account Status</td>
			                                        <td style="text-align: center;">
			                                            @if($user->status == 'Active')
			                                                <span class="btn-xs btn-rounded label label-success">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @elseif($user->status == 'Away')
			                                                <span class="btn-xs btn-rounded label label-primary">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @elseif($user->status == 'Busy')
			                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @elseif($user->status == 'Blocked')
			                                                <span class="btn-xs btn-rounded label label-danger">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @elseif($user->status == 'Inactive')
			                                                <span class="btn-xs btn-rounded label label-info">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @else
			                                                <span class="btn-xs btn-rounded label label-warning">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</span>
			                                            @endif
			                                        </td>
			                                        <td>Required</td>
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
                        <img src="{{ Auth::user()->profile_image ? asset('files/profile/images/' . Auth::user()->profile_image) : asset('start/images/icons/favicon.png') }}" style="max-width: 30px; border-radius: 50%;"> 
                        
                        Options | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                    	<div class="row text-center">
                            <div class="col-md-12">
                                <img src="{{ asset('files/profile/images/'.$user->profile_image) }}" alt="user image" style="max-width: 98%; border-radius: 3px;">
                            </div>
                            @role(['super-admin','admin'])
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-block"> Back </a>
                                    </div>
                                    <div class="col-6">
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <div class="tools">
                                                <button type="submit" class="btn btn-danger btn-block"
                                                    @if($user->id == Auth::user()->id) disabled @elseif($user->role == 'super-admin') disabled @endif onclick="return confirm('You are about to delete!\nThis is not reversible!')" title="You can not delete your profile"> Delete </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')

@endsection