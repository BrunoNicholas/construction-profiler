@extends('layouts.site')

@section('title') {{ $type }} Messages @endsection
@section('styles', '')
@section('page-tree')
	  <h1 style="text-transform: capitalize"> {{ $type }} Messages <small>Send messages to anyone registered with {{ config('app.name') }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('userhome') }}"><i class="fa fa-dashboard text-center"></i> Home</a></li>
        <li class="active" style="text-transform: capitalize"><i class="fa fa-envelope-open-o"></i> {{ $type }} Messages </li>
    </ol>
@endsection
@section('content')
	  <div class="row">
        @include('layouts.includes.left_message')
        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        @if($type == 'inbox')
                            <i class="fa fa-envelope text-info"></i> Inboxed Messages 
                        @elseif($type == 'draft')
                            <i class="fa fa-envelope text-primary"></i> Drafted Messages
                        @elseif($type == 'trash')
                            <i class="fa fa-envelope text-danger"></i> Trashed Messages
                        @elseif($type == 'spam')
                            <i class="fa fa-envelope text-warning"></i> Spamed Messages
                        @elseif($type == 'sent')
                            <i class="fa fa-envelope text-success"></i> Sent Messages
                        @elseif($type == 'important')
                            <i class="fa fa-envelope text-danger"></i> Important Messages
                        @elseif($type == 'urgent')
                            <i class="fa fa-envelope text-success"></i> Urgent Messages
                        @elseif($type == 'official')
                            <i class="fa fa-envelope text-warning"></i> Official Messages
                        @elseif($type == 'unofficial')
                            <i class="fa fa-envelope text-info"></i> Unofficial Messages
                        @elseif($type == 'normal')
                            <i class="fa fa-envelope text-dark"></i> Normal Messages
                        @elseif($type == 'all')
                            <i class="fa fa-envelope text-primary"></i> All Messages
                        @elseif($type == 'all')
                            All Messages
                        @else
                            Messagess
                        @endif
                    </h3>
                    {{-- <span style="visibility: hidden;"> | - | </span><a href=""><span class="fa fa-refresh"></span></a> --}}
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'trash') }}'"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'important') }}'"><i class="fa fa-star"></i></button>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'spam') }}'"><i class="fa fa-fire"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                      <div class="pull-right">
                          {{-- {{ $messages->links() }} --}}
                      </div>
                      <!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                          @if(sizeof($messages) < 1)
                              <tr>
                                  <td class="chb text-center" colspan="6"> <i> No {{ $type }} email found! </i> </td>
                              </tr>
                          @endif
                          @foreach ($messages as $message)
                              @if(is_null($message->sender))
                                  <tr class="@if($message->priority == 'seen') unread @else read @endif" @if ($message->priority == 'seen') style="background-color: #e9f9f9;" @endif>
                                      <td colspan="7"> The of this mail is either deleted or is missing.</td>
                                  </tr>
                              @elseif(is_null($message->receiver))
                                  <tr class="@if($message->priority == 'seen') unread @else read @endif" @if ($message->priority == 'seen') style="background-color: #e9f9f9;" @endif>
                                      <td colspan="7"> The of this mail is either deleted or is missing.</td>
                                  </tr>
                              @else
                                  <tr class="@if($message->priority == 'seen') unread @else read @endif" @if ($message->priority == 'seen') style="background-color: #e9f9f9;" @endif>
                                      <td class="check chb">
                                        {{-- <input type="checkbox" class="icheck" name="checkbox1" /> --}}
                                        <div class="custom-control custom-checkbox">
                                                  <input type="checkbox" name="checker" class="custom-control-input" id="cst{{ $message->id }}">
                                                  <label class="custom-control-label" for="cst{{ $message->id }}">&nbsp;</label>
                                              </div>
                                      </td>

                                            @if($message->sender == Auth::user()->id)
                                                <td class="user-image">
                                                    <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->receiver)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
                                                </td>
                                                <td class="user-name">
                                                    <h6 class="m-b-0">{{ (App\User::where('id',$message->receiver)->get()->first())->name }}</h6>
                                                </td>
                                            @else
                                                <td class="user-image">
                                                    <img src="{{ asset('/files/profile/images/'. (App\User::where('id',$message->sender)->get()->first())->profile_image) }}" alt="user" class="rounded-circle" width="30">
                                                </td>
                                                <td class="user-name">
                                                    <h6 class="m-b-0">{{ (App\User::where('id',$message->sender)->get()->first())->name }}</h6>
                                                </td>
                                            @endif
                                      <td class="contact pull-left">
                                          <a class="link pull-left" href="{{ route('messages.show',[$message->id,'details']) }}">
                                                    @if($message->folder == 'important')
                                                        <span class="label label-danger m-r-10">{{ $message->folder }}</span>
                                                    @elseif($message->folder == 'urgent')
                                                        <span class="label label-success m-r-10">{{ $message->folder }}</span>
                                                    @elseif($message->folder == 'official')
                                                        <span class="label label-warning m-r-10">{{ $message->folder }}</span>
                                                    @elseif($message->folder == 'unofficial')
                                                        <span class="label label-info m-r-10">{{ $message->folder }}</span>
                                                    @elseif($message->folder == 'normal')
                                                        <span class="label btn-default m-r-10">{{ $message->folder }}</span>
                                                    @else
                                                        <span class="label label-primary m-r-10 text-primary">{{ $message->folder }}</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="contact">
                                              <a  href="{{ route('messages.show',[$message->id,'details']) }}">
                                                    <span class="blue-grey-text text-darken-4">
                                                        <b>{{ $message->title }}</b>
                                                    </span> 
                                                    {{ $message->message }}
                                                </a>
                                      </td>
                                      @if($message->attachment) 
                                                <td class="clip" title="This is a public (group) message sent to all!"><i class="fa fa-users"></i></td> <!-- fa fa-paperclip -->
                                                <td class="time" title="This is a public (group) message sent to all!"> {{ $message->created_at }} </td>
                                            @else
                                                <td colspan="2" class="time" title="{{ $message->created_at }}"> {{ $message->created_at }} </td>
                                            @endif
                                  </tr>
                              @endif
                          @endforeach
                        </tbody>
                    </table>
                    <!-- /.table -->
                  </div>
                  <!-- /.mail-box-messages -->
                  <br>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                        <i class="fa fa-square-o"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'trash') }}'"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'important') }}'"><i class="fa fa-star"></i></button>
                        <button type="button" class="btn btn-default btn-sm" onclick="window.location='{{ route('messages.index', 'spam') }}'"><i class="fa fa-fire"></i></button>
                    </div>
                    <!-- /.btn-group -->
                    <a href=""><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
                    <div class="pull-right">
                        {{ $messages->links() }}
                    </div>
                </div>
                <br style="visibility: hidden;">
              </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@section('scripts')

@endsection