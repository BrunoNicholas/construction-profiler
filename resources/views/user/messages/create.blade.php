@extends('layouts.site')

@section('title') Compose Message @endsection
@section('styles', '')
@section('page-tree')
	<h1> Compose Message <small> Add new message.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-primary"></i> Home</a></li>
        <li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li>
        <li class="active"><i class="fa fa-user-plus"></i> New Message</li>
    </ol>
@endsection
@section('content')
	<div class="row">
        @include('layouts.includes.left_message')

        <div class="col-md-9">
          	<div class="box box-primary">
	            <div class="box-header with-border">
	              	<h3 class="box-title"><i class="fa-envelope fa text-red"></i> Compose New Message</h3>
	              	<a href="javascript:void(0)" data-toggle="modal" data-target="#createModal" data-whatever="@mdo"> <button class="label label-danger btn"><i class="fa-users fa"></i> Send Public Email</button></a>
	            </div>
	            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('messages.storeAll','inbox') }}" method="POST">
                                @csrf
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">{{ $error }}</p>
                                @endforeach

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="modal-body">
                                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="receiver" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="status" value="inbox">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="recipient-name" class="control-label">Topic:</label>
                                                <input type="text" class="form-control" id="recipient-name1" name="title">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="priority">Priority</label>
                                                <select class="custom-select form-control" name="folder">
                                                    <option value="normal">Select priority</option>
                                                    <option value="important">Important</option>
                                                    <option value="urgent">Urgent</option>
                                                    <option value="official">Official</option>
                                                    <option value="unofficial">Unofficial</option>
                                                    <option value="normal">Normal</option>
                                                    <option value="">None</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="control-label">Message:</label>
                                        <textarea class="form-control" id="message-text1" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer" style="padding: 10px;">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin: 5px;">Close</button>
                                    <button type="submit" class="btn btn-primary" style="margin: 5px;">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
	            <!-- /.box-header -->
	            <form action="{{ route('messages.store','inbox') }}" method="POST">
	            	@csrf
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">

		            <div class="box-body">

			            <div class="form-group">
			                {{-- <input class="form-control" placeholder="To:"> --}}
			                <div class="row">
                        		<div class="col-md-6">
                                	<select class="form-control block" name="receiver" id="example-email" required>
                                    	<option value="{{ Auth::user()->id }}">Select user to send to</option>
	                                	@foreach($users as $user)
	                                        @if($user->id != Auth::user()->id)
	                                            <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . $user->email }}</option>
	                                        @endif
	                                    @endforeach
	                                </select>
	                            </div>
	                            <div class="col-md-6">
	                                <select class="form-control block" name="status" id="example-email" required>
	                                    <option value="inbox">Select to save as draft or send mail</option>
	                                    <option value="inbox">Send Mail</option>
	                                    <option value="draft">Save as Draft</option>
	                                </select>
	                            </div>
	                        </div>
			            </div>
			            <div class="form-group">
			                {{-- <input class="form-control" placeholder="Subject:"> --}}
			                <div class="row">
		                        <div class="col-md-6">
		                        	<label>Subject: </label>
		                        	<input type="text" class="form-control" name="title" placeholder="Subject.."/>
		                        </div>
		                        <div class="col-md-6">
		                        	<label>Priority: </label>
		                            <select class="form-control" name="folder">
		                                <option value="normal">Select priority</option>
		                                <option value="important">Important</option>
		                                <option value="urgent">Urgent</option>
		                                <option value="official">Official</option>
		                                <option value="unofficial">Unofficial</option>
		                                <option value="normal">Normal</option>
		                                <option value="">None</option>
		                            </select>
		                        </div>
		                    </div>
			            </div>
			            <div class="form-group">
			                <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px"></textarea>
			            </div>
			            <div class="form-group">
			            	{{--  --}}
			            </div>
		            </div>
		            <!-- /.box-body -->
		            <div class="box-footer">
		              	<div class="pull-right">
			                <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
			                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
			            </div>
			            <a href="{{ route('messages.index','inbox') }}" onclick="return confirm('Your message will be lost without saving.\nAre you sure you want to discard it?')"><button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button></a>
			        </div>
			    </form>
		        <!-- /.box-footer -->
	          </div>
	          <!-- /. box -->
        </div>


    </div>
@endsection
@section('scripts')

@endsection