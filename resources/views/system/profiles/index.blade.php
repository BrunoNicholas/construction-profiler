@extends('layouts.site')

@section('title') Worker Profiles @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-tree')
    <h1> Worker Profiles <small> View, rate and review worker profiles.</small></h1>
    <ol class="breadcrumb">
    	<li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i>Home</a></li>
    	<li><a href="{{ route('departments.index') }}"><i class="fa fa-tree text-primary"></i>Departments</a></li>
    	<li><a href="{{ route('projects.index') }}"><i class="fa fa-list text-primary"></i>Projects</a></li>
    	{{-- <li><a href="{{ route('posts.index') }}"><i class="fa fa-home text-primary"></i>Posts</a></li> --}}
        <li class="active"><a href="javascript:void(0)"><i class="fa fa-users"></i> Worker Profiles </a></li>
    </ol>
@endsection
@section('content')
	<div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Worker Profiles </a></li>
                    <li class="pull-left header"><i class="fa fa-users text-info"></i><a href="{{ route('profiles.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a></li>
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="box-header">
                                  <h3 class="box-title">{{ config('app.name') }} Departments</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Profile Owner</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=0; ?>
                                            @foreach($profiles as $profile)
                                                <tr>
                                                    <td class="text-center" onclick="window.location='{{ route('users.show',$profile->user_id) }}'">
                                                        <div style="max-width: 450px; overflow-x: auto;">
                                                            <img src="{{ asset('files/profile/images/'. App\User::where('id',$profile->user_id)->first()->profile_image) }}" alt="image" style=" height: 200px; width: auto; border-radius: 10px;" />
                                                        </div>
                                                        <div><span class="text-primary"><i class="fa-user fa"></i> {{ App\User::where('id',$profile->user_id)->first()->name }}</span></div>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->profile_category }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        {{ $profile->profile_description }}
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        @if($profile->status == 'Active')
                                                            <span class="btn-xs btn-round label label-success">{{ $profile->status }}</span>
                                                        @elseif($profile->status == 'Pending')
                                                            <span class="btn-xs btn-round label label-warning">{{ $profile->status }}</span>
                                                        @elseif($profile->status == 'Blocked')
                                                            <span class="btn-xs btn-round label label-primary">{{ $profile->status }}</span>
                                                        @elseif($profile->status == 'Achived')
                                                            <span class="btn-xs btn-round label label-info">{{ $profile->status }}</span>
                                                        @else
                                                            <span class="btn-xs btn-round label label-default">{{ $profile->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center" style="vertical-align: middle;">
                                                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-xs btn-info" title="Profile Details"><i class="fa fa-info-circle"></i></a>
                                                        @if (Auth::user()->id == $profile->user_id || Auth::user()->hasRole(['super-admin','admin']))
                                                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit" title="Edit Depart Details"></i></a>
                                                        @endif
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