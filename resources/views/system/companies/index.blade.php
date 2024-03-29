@extends('layouts.site')

@section('title') Companies @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-tree')
    <h1> Registered Companies <small> Manage the registered companies!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	{{-- <li><a href="{{ route('compa.index') }}"><i class="fa fa-list text-primary"></i>User Roles</a></li> --}}
        <li class="active"><a href="javascript:void(0)"><i class="ion ion-ios-toggle-outline"></i>Companies</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
		<section class="col-lg-12 connectedSortable">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs pull-right">
					<li class="active"><a href="#urevenue-chart" data-toggle="tab"> Companies </a></li>
					<li class="pull-left header"><i class="ion ion-ios-toggle-outline text-info"></i><a href="{{ route('companies.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li>
				</ul>
				<div class="tab-content padding">
					<div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
						<div class="card">
              <div class="card-header"><h4 style="width: 100%; text-align: center;"> Current Companies </h4></div>
              <div class="card-body">
                  <div class="row">
                      @if(sizeof($companies) < 1)
                        <div class="col-12" style="padding-left: 10px; border-radius: 5px;">
                          <p class="alert alert-danger">No company found!</p>
                        </div>
                      @endif
                      
                      @foreach($companies as $company)
                          <!--<?php
                              $total_ratings  = $company->ratings->count();
                              $avg_avs     = 0;
                              if ($total_ratings > 0) {
                                      foreach ($company->ratings as $rat) {
                                      $avg_avs += $rat->rate_number;
                                  }
                                  $avg    = $avg_avs/$total_ratings;
                              } else {
                                  $avg    = $avg_avs;
                              }
                          ?>-->
                          <div class="col-md-6 pt-2">
                              <div class="row" onclick="window.location='{{ route('companies.show', $company->id) }}'" title="Click to view company details">
                                  <div class="col-md-7">
                                      <a>
                                          <div class="panel  panel-hover text-center">
                                              <img class="panel-img-top img-responsive" src="{{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('start/images/icons/favicon.png') }}" alt="Card image cap" style="height: 210px; width: auto; border-radius: 5px;">
                                              <div class="panel-body">
                                                  <div class="d-flex no-block align-items-center m-b-15">
                                                      <span class="pull-left" title="Start date"><i class="fa fa-calendar"></i> {{ explode(' ', trim($company->created_at))[0] }} </span>
                                                      <div class="ml-auto pull-right" title="End date">
                                                          <span><i class="fa fa-star"></i> {{ $company->status }} </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </a>
                                  </div>
                                  <div class="col-md-5">
                                      <table class="table table-bordered table-striped">
                                          <tbody>
                                              <tr>
                                                  <td colspan="2"><h5 class="font-normal text-center"> {{ $company->company_name }} </h5></td>
                                              </tr>
                                              <tr>
                                                  <td colspan="2">{{ $company->company_email }}</td>
                                              </tr>
                                              <tr>
                                                  <td colspan="2">{{ $company->company_bio }}</td>
                                              </tr>
                                              <tr>
                                                  <td style="" colspan="2">{{ $company->status }}</td>
                                              </tr>
                                              <tr>
                                                  @if(sizeof($company->reviews) > 0)
                                                      <td class="text-info">{{ $company->reviews->count() }} Reviews</td>
                                                  @endif
                                                  <td class="text-danger" @if(sizeof($company->reviews) < 1) colpan="2" @endif>{{ $avg }} Stars</td>
                                              </tr>
                                          </tbody>
                                      </table>
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