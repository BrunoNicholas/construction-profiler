@extends('layouts.site')

@section('title') System Users @endsection
@section('styles', '') 
@section('page-tree')
    <h1> System Users <small> Manage all system users</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-users"></i> Users</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-md-12 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#sales-chart" data-toggle="tab">System Users</a></li>
					<li class=""><a href="#urevenue-chart" data-toggle="tab">User Options</a></li>
					<li class="pull-left header"><i class="fa fa-users text-primary"></i><a href="{{ route('users.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane" id="urevenue-chart" style="position: relative; height: 400px;">
						<div class="col-lg-12">
							<div class="row" style="padding: 5px;">
								<div class="card">
									<div class="card-heading">
										<h4>User's Options</h4>
									</div>
									<div class="card-body" style="max-height: 390px; overflow-y: auto;">
										<a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New User </a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 400px; border: thin solid red;">
						<div class="col-lg-12">
							<div class="row" style="padding: 5px;">
								<div class="card">
									<div class="card-heading">
										<h4>System Users</h4>
									</div>
									<div class="card-body"  style="max-height: 390px; overflow-y: auto;">
										<table  id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
				                                    <th style="text-align: center;">Name</th>
				                                    <th style="text-align: center;">Email</th>
				                                    <th style="text-align: center;">Privillege</th>
				                                    <th style="text-align: center;">Status</th>
				                                    <th style="text-align: center;">Actions</th>
												</tr>
											</thead>
											<tbody><!-- {{ $i=0 }} -->
												@foreach($users as $user)
													<tr>
														<td style="text-align: center;">{{ ++$i }}</td>
														<td class="text-right;" style="min-width: 150px; text-align: right;">
			                                                {{ $user->name }} <img src="{{ asset('files/profile/images/'. $user->profile_image) }}" style="max-width: 30px; border-radius: 40%;"></td>
				                                        <td style="text-align: center;">{{ $user->email }}</td>
				                                        <td class="text-left;">{{ $user->role ? App\Models\Role::where('name',$user->role)->get()->first()->display_name : 'Hacked Account' }}</td>
				                                        <td class="text-left;" style="text-transform: capitalize;">{{ $user->status }} | {{  $user->email_verified_at ? 'Verified' : 'Not Verified'  }}</td>
				                                        <td style="min-width: 150px;">
				                                        	<div class="row text-center" style="margin-left: 3px;">
					                                            <a href="{{ route('users.show', $user->id) }}" class="col-5 btn btn-sm btn-success" title="User Details" style="margin: 2px;"><i class="fa fa-info-circle"></i></a>
					                                            <a href="{{ route('users.edit', $user->id) }}" class=" col-5 btn btn-sm btn-primary" style="margin: 2px;"><i class="fa fa-edit" title="Edit User Profile"></i></a>
					                                        </div>
				                                        </td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
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

@endsection