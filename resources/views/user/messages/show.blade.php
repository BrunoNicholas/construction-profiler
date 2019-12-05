@extends('layouts.site')

@section('title') View Message @endsection
@section('styles', '')
@section('page-tree')
	<h1> View Message <small> View message.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-primary"></i> Home</a></li>
        <li><a href="{{ route('messages.index', 'inbox') }}"><i class="fa fa-envelope text-primary"></i> Inbox </a></li>
        <li class="active"><i class="fa fa-user-plus"></i> View Message</li>
    </ol>
@endsection
@section('content')
	<div class="row">
        @include('layouts.includes.left_message')

        <div class="col-md-9">
	        <div class="box box-primary">
	            <div class="box-header with-border">
		            <h3 class="box-title">Read Message</h3>

		            <div class="box-tools pull-right">
		                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
		                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
		            </div>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body no-padding">
		            <div class="mailbox-read-info">
		                <h3>{{ $message->title }} <small> - {{ $message->status }}ed ({{ $message->folder }})</small></h3>
		                <h5>
	                        @if($message->receiver == Auth::user()->id)
	                            <h5 class="m-b-0 font-16 font-medium">
	                            	<a href="{{ route('profile') }}">
				                        <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->first())->profile_image) }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;"> ME
				                        
	                                	<small> ( {{ (App\User::where('id',$message->receiver)->get()->first())->email }} )</small>
	                            	</a>
	                            </h5>
	                        @else
	                            <h5 class="m-b-0 font-16 font-medium">
	                            	<a href="{{ route('users.show',$message->receiver) }}">
	                            		<img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->first())->profile_image) }}" alt="user" class="rounded-circle" width="45" style="border-radius: 50%;">
	                            		{{ (App\User::where('id',$message->receiver)->get()->first())->name }}
	                                	<small>
	                                		( {{ (App\User::where('id',$message->receiver)->get()->first())->email }} )
	                                	</small>
	                            	</a>
	                            </h5>
	                        @endif
	                        <span> From: 
	                            @if($message->sender == Auth::user()->id)
	                            	<img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->first())->profile_image) }}" alt="user" class="rounded-circle" width="25" style="border-radius: 50%;">
	                                <a href="{{ route('profile') }}"> <b>Me</b> </a>
	                            @else
	                            	<img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->first())->profile_image) }}" alt="user" class="rounded-circle" width="35" style="border-radius: 50%;">
	                                <a href="{{ route('users.show',$message->sender) }}"><b>{{ (App\User::where('id',$message->sender)->get()->first())->email . ' - ' . (App\User::where('id',$message->sender)->get()->first())->name  }}</b></a>
	                            @endif
	                        </span>
		                	<span class="mailbox-read-time pull-right"> {{ $message->created_at }}</span>
		                </h5>
		            </div>
		              <!-- /.mailbox-read-info -->
		              <div class="mailbox-controls with-border text-center">
		                <div class="btn-group">
		                  {{-- <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
		                    <i class="fa fa-trash-o"></i></button>
		                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
		                    <i class="fa fa-reply"></i></button>
		                  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
		                    <i class="fa fa-share"></i></button> --}}
		                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
		                        {{ csrf_field() }}
		                        {{ method_field('PATCH') }}
		                        <input type="hidden" name="sender" value="{{ $message->sender }}">
		                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
		                        <input type="hidden" name="message" value="{{ $message->message }}">
		                        <input type="hidden" name="status" value="spam">
		                        <button type="submit" class="btn btn-outline-primary font-18" title="Send to spam">
		                            <i class="fa fa-filter" title="Move to Spam"></i>
		                        </button>
		                    </form>
		                    <form action="{{ route('messages.update',[$message->id,'delete']) }}" method="post" style="margin: 2px;" class="pull-left">
		                        {{ csrf_field() }}
		                        {{ method_field('PATCH') }}
		                        <input type="hidden" name="sender" value="{{ $message->sender }}">
		                        <input type="hidden" name="receiver" value="{{ $message->receiver }}">
		                        <input type="hidden" name="message" value="{{ $message->message }}">
		                        <input type="hidden" name="status" value="trash">
		                        <button type="submit" class="btn btn-outline-primary font-18" title="Move to trash">
		                            <i class="fa fa-trash-o" title="Move to Trash"></i>
		                        </button>
		                    </form>
		                </div>
		                <!-- /.btn-group -->
		              </div>
		              <!-- /.mailbox-controls -->
		              <div class="mailbox-read-message">
		                <p>Hello {{ App\User::where('id',$message->receiver)->first()->name }},</p>

		                <textarea class="form-control" rows="8" style="overflow-y: auto;border: none; background-color: #fff; color: #001;" disabled>{{ $message->message }}</textarea>
		              </div>
		              <!-- /.mailbox-read-message -->
	            </div>
	            <div class="box-footer">
		            <div class="pull-right">
		            	@if($message->sender != Auth::user()->id)
		                	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#replyModal" data-whatever="@mdo"><i class="fa fa-reply"></i> Reply</button>
		                	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
			                    <div class="modal-dialog" role="document">
			                        <div class="modal-content">
			                            <div class="modal-header">
			                                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
			                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                            </div>
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
			                                <div class="modal-body">
			                                    <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
			                                    <input type="hidden" name="receiver" value="{{ $message->sender }}">
			                                    <input type="hidden" name="status" value="inbox">
			                                    <div class="form-group">
			                                        <div class="row">
			                                            <div class="col-md-6">
			                                                <label for="recipient-name" class="control-label">Topic:</label>
			                                                <input type="text" class="form-control" id="recipient-name1" name="title" value="{{ $message->title }}">
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
			                                <div class="modal-footer">
			                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                                    <button type="submit" class="btn btn-primary">Send message</button>
			                                </div>
			                            </form>
			                        </div>
			                    </div>
			                </div>
		                @endif
		                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#forwardModal" data-whatever="@fat"><i class="fa fa-share"></i> Forward</button>
		                <div class="modal fade" id="forwardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
		                    <div class="modal-dialog" role="document">
		                        <div class="modal-content">
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
		                                <div class="modal-header">
		                                    <h4 class="modal-title" id="exampleModalLabel1">Forward this message</h4>
		                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                                </div>
		                                <input type="hidden" name="sender" value="{{ Auth::user()->id }}">
		                                <input type="hidden" name="folder" value="{{ $message->folder }}">
		                                <input type="hidden" name="title" value="{{ $message->title }}">
		                                <input type="hidden" name="priority" value="unseen">
		                                <input type="hidden" name="status" value="inbox">
		                                <div class="modal-body">
		                                    <div class="form-group">
		                                        <label for="recipient-name" class="control-label">Recipient:</label>
		                                        <select class="custom-select form-control" name="receiver">
		                                            @foreach($users as $user)
		                                                @if($user->id != Auth::user()->id)
		                                                    <option value="{{ $user->id }}" title="{{ (App\Models\Role::where('name',$user->role)->get()->first())->display_name }}">{{ $user->name . ' - ' . $user->email }}</option>
		                                                @endif
		                                            @endforeach
		                                        </select>
		                                    </div>
		                                    <div class="form-group">
		                                        <label for="message-text" class="control-label">Message:</label>
		                                        <textarea class="form-control" id="message-text1" name="message">{{ $message->message }}

-----
Forwarded from {{ App\User::where('id',$message->sender)->get()->first()->name }}
		                                        </textarea>
		                                    </div>
		                                </div>
		                                <div class="modal-footer">
		                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                                    <button type="submit" class="btn btn-primary">Send message</button>
		                                </div>
		                            </form>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <form action="{{ route('messages.destroy',[$message->id,'delete']) }}" method="post">
	                	{{ csrf_field() }} {{ method_field('DELETE') }}
	                	<button type="submit" class="btn btn-default"onclick="return confirm('You are about to delete this message completely from all viewers!\nThis is not reversible!')" title="This lets you delete this message completely."><i class="fa fa-trash-o"></i> Delete</button>
	                </form>
	            </div>
	            <!-- /.box-footer -->
	          </div>
	          <!-- /. box -->
        </div>

    </div>
@endsection
@section('scripts')

@endsection