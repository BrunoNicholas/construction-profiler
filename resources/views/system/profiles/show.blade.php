@extends('layouts.site')

@section('title') View Worker Profile @endsection
@section('styles')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- above is the rating --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endsection 
@section('page-tree')
    <h1> View Worker Profile <small> View, worker profile.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
    	<li><a href="{{ route('profiles.index') }}"><i class="fa fa-home text-primary"></i>Worker Profiles</a></li>
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-user-plus"></i> View Profiles </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-8 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> View Profile </a></li>
                    <li class="pull-left header"><i class="fa fa-user-plus text-info"></i><a href="{{ route('profiles.index') }}" class="btn btn-xs btn-info pull-left"><i class="fa-angle-left fa"></i> Back</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="card-header"><h4 style="width: 100%; text-align: center;"> View Profile </h4></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table m-b-0 text-left">
                                        <?php $i=0; ?>
                                        <tbody>
                                            @if($profile->profile_name)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Profile Name: </th>
                                                    <td style="text-align: left;">{{ $profile->profile_name }}</td>
                                                </tr>
                                            @endif
                                            @if($profile->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Worker Email: </th>
                                                    <td style="text-align: left;">{{ $profile->user_id }}</td>
                                                </tr>
                                            @endif
                                            @if($profile->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Telephone Number: </th>
                                                    <td style="text-align: left;">{{ $profile->user_id }}</td>
                                                </tr>
                                            @endif
                                            @if($profile->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Location: </th>
                                                    <td style="text-align: left;">{{ $profile->user_id }}</td>
                                                </tr>
                                            @endif
                                            @if($profile->user_id)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Account Holder: </th>
                                                    <td style="text-align: left;">
                                                        <a href="{{ route('users.show',$profile->user_id) }}" target="_blank">
                                                            <img src="{{ asset('files/profile/images/' . App\User::where('id',$profile->user_id)->first()->profile_image) }}" style="width: 30px; border-radius: 50%;" alt="author"> 
                                                            {{ App\User::where('id',$profile->user_id)->first()->name }}
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($profile->status)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;"> profile Status: </th>
                                                    <td style="text-align: left; text-transform: capitalize;">{{ $profile->status }}</td>
                                                </tr>
                                            @endif
                                            @if($profile->profile_description)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Description: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $profile->profile_description }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($profile->profile_category)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Category: </th>
                                                    <td style="text-align: left;">
                                                        <textarea class="form-control" disabled style="background-color: #fff; border: thin solid transparent;">{{ $profile->profile_category }}</textarea>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if($profile->ratings)
                                                <tr>
                                                    <th style="text-align: right; max-width: 100px;">Rating</th>
                                                    <td style="text-align: left; font-size: 10px;">
                                                        <input name="rate_number" class="rating" data-min="0" data-max="5" data-step="0.1" value="{{ $avg }}" disabled>
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
                                            <div class="col-md-6" style="border-bottom: thin solid #e6e6e6;">
                                                {{ $profile->reviews->count() }} Reviews
                                            </div>
                                            <div class="col-md-6" style="border-bottom: thin solid #e6e6e6;">
                                                Rating: {{ $avg }} Stars
                                            </div>
                                            <div class="col-md-12 text-left">
                                                <ul class="list-unstyled m-t-40">
                                                    <?php $i=0; ?>
                                                    @foreach($profile->reviews as $review)
                                                        @if($review->status == 'Approved' || $review->user_id == Auth::user()->id)
                                                            @if($i != 0) <hr> @endif
                                                            <!-- {{ ++$i }} -->
                                                            <li class="media">
                                                                <img class="m-r-15" @if($review->user_id) src="{{ asset('files/profile/images/' . (App\User::where('id',$review->user_id)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                                                <div class="media-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5 class="mt-0 mb-1">@if($review->user_id) {{ (App\User::where('id',$review->user_id)->get()->first())->name }} @else Anonymous @endif </h5> 
                                                                            <b>Date:</b> {{ explode(' ', trim($review->created_at))[0] }}, <b>Time:</b> {{ explode(' ', trim($review->created_at))[1] }}
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            {{ $review->review_message }}
                                                                        </div>
                                                                    </div>

                                                                    @if($review->user_id == Auth::user()->id)
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
                                                            @if($review->status != 'Approved' && $review->user_id != Auth::user()->id)
                                                                @if($i != 0) <hr> @endif
                                                                <!-- {{ ++$i }} -->
                                                                <li class="media">
                                                                    <img class="m-r-15" @if($review->user_id) src="{{ asset('files/profile/images/' . (App\User::where('id',$review->user_id)->get()->first())->profile_image) }}" @else src="{{ asset('files/profile/images/profile.jpg') }}" @endif width="60" alt="Generic placeholder image">
                                                                    <div class="media-body">
                                                                        <h5 class="mt-0 mb-1">@if($review->user_id) {{ (App\User::where('id',$review->user_id)->get()->first())->name }} @else Anonymous @endif </h5> 
                                                                        {{ $review->review_message }} <br>
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
                                                    @if(sizeof($profile->reviews) < 1) <i class="text-danger text-center">No Reviews Yet!</i> @endif
                                                </ul>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="box">
                                                    <div class="box-header text-center"> Make Review & Rating </div>
                                                    <div class="box-body">
                                                        <form method="post" action="{{ route('reviews.store', ['profile',$profile->id]) }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6" style="padding-top: 20px;">
                                                                    <div class="form-group">
                                                                        <input id="input-3" name="rate_number" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="2.5">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                                        <input type="hidden" name="worker_profile_id" value="{{ $profile->id }}">
                                                                        <input type="hidden" name="status" value="Approved">
                                                                        <textarea id="mymce" name="review_message" class="form-control" required></textarea>
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
        <section class="col-md-4 connectedSortable">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <img src="{{ asset('start/images/icons/favicon.png') }}" style="max-width: 30px; border-radius: 50%;"> 
                        
                        Worker Profile Details | {{ config('app.name') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <img src="{{ asset('start/images/icons/favicon.png') }}" alt="profile image" style="border-radius: 3px; width: 100%;">
                        </div>
                        <div class="col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
                            <div class="form-control">
                                Account Holder: <a href="{{ route('users.show',$profile->user_id) }}"> {{ App\User::where('id',$profile->user_id)->get()->first()->name }} </a>
                            </div>
                        </div>
                        @role(['super-admin','admin','company-admin','company-worker'])
                            <div class="col-md-6">
                                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info btn-sm btn-xs btn-block"><i class="fa fa-edit"></i> Edit profile</a>
                            </div>
                            @role(['super-admin','admin','company-admin','company-worker'])
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('profiles.destroy', $profile->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <div class="tools">
                                            <button type="submit" class="btn btn-danger btn-xs btn-block"
                                                onclick="return confirm('You are about to delete this profile!\nThis is not reversible!')" title="This will delete this entire profile"><i class="fa fa-trash"></i> Delete </button>
                                        </div>
                                    </form>
                                </div>
                                @endrole
                        @endrole
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('assets/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <script src="{{ asset('assets/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
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