@extends('layouts.site')

@section('title') Departments @endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('page-tree')
	<h1> System Departments <small> Manage the system and company departments.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-home text-primary"></i> Home</a></li>
        @role(['super-admin','admin'])
        	<li>
        		<a href="{{ route('admin') }}"> <i class="fa fa-envelope text-primary"></i> Administrator </a>
        	</li> 
        @endrole
        {{-- <li><a href="{{ route('messages.index') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li> --}}
        <li class="active"><i class="fa fa-tree"></i> Departments</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <section class="col-lg-9 connectedSortable">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#urevenue-chart" data-toggle="tab"> Departments </a></li>
                    <li class="pull-left header">
                        <i class="fa fa-tree text-info"></i>
                        <a href="{{ route('departments.create') }}" class="btn btn-xs btn-info pull-left"><i class="fa-plus fa"></i> New</a>
                    </li> 
                </ul>
                <div class="tab-content padding">
                    <div class="chart tab-pane active" id="urevenue-chart" style="position: relative; height: 500px; overflow-y: auto;">
                        <div class="card">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">{{ config('app.name') }} Departments</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department Name</th>
                                                <th>Major</th>
                                                <th>Description</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody><?php $i=0; ?>
                                            @foreach($departments as $department)
                                                <tr>
                                                    <td class="text-center">{{ ++$i }}</td>
                                                    <td>{{ $department->department_name }}</td>
                                                    <td>
                                                        @if($department->parent_department)
                                                            {{ (App\Models\Department::where('id',$department->parent_department)->get()->first())->department_name }}
                                                        @endif
                                                    </td>
                                                    <td style="max-width: 150px;">{{ $department->description }}</td>
                                                    <td>{{ (App\User::where('id',$department->user_id)->get()->first())->name }}</td>
                                                    <td class="text-center">
                                                        @if($department->status == 'Active')
                                                            <span class="btn-xs btn-round label label-success">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Suspended')
                                                            <span class="btn-xs btn-round label label-warning">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Blocked')
                                                            <span class="btn-xs btn-round label label-primary">{{ $department->status }}</span>
                                                        @elseif($department->status == 'Removed')
                                                            <span class="btn-xs btn-round label label-info">{{ $department->status }}</span>
                                                        @else
                                                            <span class="btn-xs btn-round label label-default">{{ $department->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-xs btn-info" title="Department Details"><i class="fa fa-info-circle"></i></a>
                                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit" title="Edit Department Details"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
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
