@extends('layouts.site')

@section('title') System Roles @endsection
@section('styles', '') 
@section('page-tree')
    <h1> System User Roles <small> Manage the user categories and previleges!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('admin') }}"><i class="fa fa-dashboard text-primary"></i>Administrator</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-list"></i>System Roles</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> User Roles </a></li>
                    <li class="pull-left header"><i class="fa fa-list text-info"></i></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                        	<div class="card-heading">
								<h4>System Roles</h4>
							</div>
							<div class="card-body"  style="overflow-y: auto;">
								<table  id="example1" class="table table-bordered table-striped">

										@if($message = Session::get('success'))
                                            <div class="alert alert-success">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @endif
                                        
									<thead>
										<tr style="text-align: center;">
											<th>#</th>
											<th>Name</th>
											<th>Display Name</th>
											<th>Description</th>
											<th>Date Creted</th>
											<th>Action</th>  
										</tr>
									</thead>
									<tbody><!-- {{ $i=0 }} -->
										@foreach($roles as $role)
											<tr>
												<td>{{ ++$i }}</td>
												<td>{{ $role->name }}</td>
												<td>{{ $role->display_name }}</td>
												<td>{{ $role->description }}</td>
												<td>{{ $role->created_at }}</td>
												<td style="min-width: 115px; text-align: center;">
													<a href="{{ route('roles.show', $role->id) }}" class="btn-xs btn-info text-center" title="Show {{ $role->name }} role details" style="border-radius: 3px; margin:2px; padding: 5px;">
														<i class="fa fa-info-circle"></i>
													</a>
													@role('super-admin') 
													<a href="{{ route('roles.edit', $role->id) }}" class="btn-xs btn-primary text-center" title="Edit {{ $role->name }} role " style="border-radius: 3px; margin:2px; padding: 5px;">
														<i class="fa fa-recycle"></i>
													</a>
													@endrole
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
        </section>
    </div>
@endsection
@section('scripts')

@endsection