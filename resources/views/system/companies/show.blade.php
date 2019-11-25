@extends('layouts.site')

@section('title') View Company @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endsection 
@section('page-tree')
    <h1> View Company <small> Manage the registered companies!</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('companies.index') }}"><i class="ion ion-ios-toggle-outline text-primary"></i>Companies</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-tree"></i>View Company</a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Company </a></li>
                    <li class="pull-left header"><i class="fa fa-plus text-info"></i><a href="{{ route('companies.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                        	<div class="card-header"></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table m-b-0 text-left">
                                        <?php $i=0; ?>
                                        <tbody>
                                            @if($company->company_name)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Company Name: </th>
                                                    <td style="text-align: left;">{{ $company->company_name }}</td>
                                                </tr>
                                            @endif
                                            @if($company->company_email)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Company Email: </th>
                                                    <td style="text-align: left;">{{ $company->company_email }}</td>
                                                </tr>
                                            @endif
                                            @if($company->company_telephone)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Telephone Number: </th>
                                                    <td style="text-align: left;">{{ $company->company_telephone }}</td>
                                                </tr>
                                            @endif
                                            @if($company->company_location)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Location: </th>
                                                    <td style="text-align: left;">{{ $company->company_location }}</td>
                                                </tr>
                                            @endif
                                            @if($company->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Administrator: </th>
                                                    <td style="text-align: left;">
                                                        <a href="{{ route('users.show',$company->user_id) }}" target="_blank">
                                                            <img src="{{ asset('files/profile/images/' . App\User::where('id',$company->user_id)->first()->profile_image) }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                            {{ App\User::where('id',$company->user_id)->first()->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($company->status)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;"> company Status: </th>
                                                    <td style="text-align: left; text-transform: capitalize;">{{ $company->status }}</td>
                                                </tr>
                                            @endif
                                            @if($company->company_description)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Description: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $company->company_description }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($company->company_bio)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Bio: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $company->company_bio }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box">
                                    <div class="box-header">
                                        <span class="box-header text-center" style="font-size: 20px;"> <i class="fa-list fa text-info"></i> Reviews & Ratings <i class="fa-star fa text-success"></i> </span>
                                    </div>
                                    <div class="box-body">
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                {{ $company->reviews->count() }} Reviews
                                            </div>
                                            <div class="col-md-6">
                                                Rating: {{ $company->ratings->count() }} Start
                                            </div>
                                            <div class="col-md-12">
                                                <ul class="list-unstyled m-t-40">
                                                    <?php $i=0; ?>
                                                    @foreach($company->reviews as $review)
                                                        @if($review->status == 'Approved' || $review->responder == Auth::user()->id)
                                                            @if($i != 0) <hr> @endif
                                                            <!-- {{ ++$i }} -->
                                                            <li class="media">
                                                                <img class="m-r-15" @if($review->responder) src="{{ asset('files/profile/images/' . (App\User::where('id',$review->responder)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <h5 class="mt-0 mb-1">@if($review->responder) {{ (App\User::where('id',$review->responder)->get()->first())->name }} @else Anonymous @endif </h5> 
                                                                    {{ $review->review }} <br>
                                                                    {{ $review->created_at }}
                                                                    @if($review->responder == Auth::user()->id)
                                                                        @if($review->status == 'Approved')
                                                                            <span class="label label-success btn-xs btn-rounded">{{ $review->status }}</span>
                                                                        @elseif($review->status == 'Pending')
                                                                            <span class="label label-primary btn-xs btn-rounded">{{ $review->status }}</span>
                                                                        @elseif($review->status == 'Rejected')
                                                                            <span class="label label-danger btn-xs btn-rounded">{{ $review->status }}</span>
                                                                        @else
                                                                            <span class="label label-warning btn-xs btn-rounded">{{ $review->status }}</span>
                                                                        @endif
                                                                    @else
                                                                        @role(['super-admin','admin']) - 
                                                                            @if($review->status == 'Approved')
                                                                                <span class="label label-success btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @elseif($review->status == 'Pending')
                                                                                <span class="label label-primary btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @elseif($review->status == 'Rejected')
                                                                                <span class="label label-danger btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @else
                                                                                <span class="label label-warning btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @endif 
                                                                        @endrole
                                                                    @endif
                                                                </div>
                                                            </li>                                
                                                        @endif
                                                        @role(['super-admin','admin'])
                                                            @if($review->status != 'Approved' && $review->responder != Auth::user()->id)
                                                                @if($i != 0) <hr> @endif
                                                                <!-- {{ ++$i }} -->
                                                                <li class="media">
                                                                    <img class="m-r-15" @if($review->responder) src="{{ asset('files/profile/images/' . (App\User::where('id',$review->responder)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0 mb-1">@if($review->responder) {{ (App\User::where('id',$review->responder)->get()->first())->name }} @else Anonymous @endif </h5> 
                                                                        {{ $review->review }} <br>
                                                                        {{ $review->created_at }} 
                                                                        @role(['super-admin','admin']) - 
                                                                            @if($review->status == 'Approved')
                                                                                <span class="label label-success btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @elseif($review->status == 'Pending')
                                                                                <span class="label label-primary btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @elseif($review->status == 'Rejected')
                                                                                <span class="label label-danger btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @else
                                                                                <span class="label label-warning btn-xs btn-rounded">{{ $review->status }}</span>
                                                                            @endif 
                                                                        @endrole
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endrole
                                                    @endforeach
                                                    @if(sizeof($company->reviews) < 1) No Reviews Yet! @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="box">
                                                    <div class="box-body">
                                                        <form method="post" action="{{ route('reviews.store', ['company',$company->id]) }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6" style="padding-top: 20px;">
                                                                    <div class="form-group">
                                                                        <label>
                                                                            0 Stars
                                                                            <input type="radio" name="rate_number" class="flat-red" value="0" title="No star, not interested">
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rate_number" class="flat-red" value="1" title="1 Star, not satisfied">
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rate_number" class="flat-red" value="2" title="2 Stars, fairly satisfied" checked>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rate_number" class="flat-red" value="3" title="3 Stars, moderately satisfied">
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rate_number" class="flat-red" value="4" title="4 Stars, satisfied!">
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rate_number" class="flat-red" value="5" title="5 Stars, Very Satsfied!"> 5 Stars
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                                                                        <input type="hidden" name="status" value="Approved">
                                                                        <textarea id="mymce" name="review_message" class="form-control" autofocus required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12" style="padding: 5px; padding-right: 15px;">
                                                                    <button type="submit" class="btn waves-effect waves-light btn-success pull-right"><i class="fa-check fa"></i> Make Review</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="col-md-4 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <img src="{{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('start/images/icons/favicon.png') }}" style="max-width: 30px; border-radius: 50%;"> 
                        
                        company Details | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ $company->company_logo ? asset('files/companies/images/' . $company->company_logo) : asset('start/images/icons/favicon.png') }}" alt="company image" style="border-radius: 3px; width: 100%;">
                        </div>
                        <div class="col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="form-control">
                                Administrator: <a href="{{ route('users.show',$company->user_id) }}"> {{ App\User::where('id',$company->user_id)->get()->first()->name }} </a>
                            </div>
                        </div>
                        @role(['super-admin','admin','company-admin','company-worker'])
                            <div class="col-md-6">
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-info btn-sm btn-xs btn-block"><i class="fa fa-edit"></i> Edit company</a>
                            </div>
                            @role(['super-admin','admin','company-admin','company-worker'])
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('companies.destroy', $company->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="tools">
                                            <button type="submit" class="btn btn-danger btn-xs btn-block"
                                                onclick="return confirm('You are about to delete this company!\nThis is not reversible!')" title="This will delete this entire company"><i class="fa fa-trash"></i> Delete </button>
                                        </div>
                                    </form>
                                </div>
                                @endrole
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
    </script>
@endsection