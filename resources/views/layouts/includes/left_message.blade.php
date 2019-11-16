<div class="col-md-3">
	@if(route('messages.create','all') == Request::fullUrl())
	    <a href="{{ route('messages.index', 'all') }}" class="btn btn-primary btn-block margin-bottom">Inbox</a>
	@else
		<a href="{{ route('messages.create', 'all') }}" class="btn btn-primary btn-block margin-bottom">Compose</a>
	@endif
    <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title text-center">Message Sections</h3>

          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        {{-- sections --}}
        <div class="box-body no-padding">
	        <ul class="nav nav-pills nav-stacked">
	            <li @if(route('messages.index', 'inbox') == Request::fullUrl()) class="active" @endif>
	            	<a href="{{ route('messages.index', 'inbox') }}">
	            		<i class="fa fa-inbox"></i> Inbox
	            		@if($inboxCount > 0)<span class="label label-primary pull-right"> {{ $inboxCount }} </span>@endif
	            	</a>
	            </li>
	            <li @if(route('messages.index', 'sent') == Request::fullUrl()) class="active" @endif>
	            	<a href="{{ route('messages.index', 'sent') }}">
	            		<i class="fa fa-envelope-o"></i> Sent
	            		@if($spamCount > 0)<span class="label label-primary pull-right"> {{ $sentCount }} </span>@endif
	            	</a>
	            </li>
	            <li @if(route('messages.index', 'draft') == Request::fullUrl()) class="active" @endif>
	            	<a href="{{ route('messages.index', 'draft') }}">
	            		<i class="fa fa-file-text-o"></i> Drafts
	            		@if($draftCount > 0)<span class="label label-primary pull-right"> {{ $draftCount }} </span>@endif
	            	</a>
	            </li>
	            <li @if(route('messages.index','spam') == Request::fullUrl()) class="active" @endif>
	            	<a href="{{ route('messages.index','spam') }}">
	            		<i class="fa fa-filter"></i> Spam 
	            		@if($spamCount > 0)<span class="label label-warning pull-right"> {{ $spamCount }} </span>@endif
	            	</a>
	            </li>
	            <li @if(route('messages.index','trash') == Request::fullUrl()) class="active" @endif>
	            	<a href="{{ route('messages.index','trash') }}">
	            		<i class="fa fa-trash-o"></i> Trash 
	            		@if($trashCount > 0)<span class="label label-primary pull-right"> {{ $trashCount }} </span>@endif
	            	</a>
	            </li>
	        </ul>
        </div>
        <!-- /.box-body -->
    </div>
	<!-- /. box -->
    <div class="box box-solid">
        <div class="box-header with-border">
          	<h3 class="box-title">Message Categories</h3>

	        <div class="box-tools">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	            </button>
	        </div>
        </div>
        <div class="box-body no-padding">
	        <ul class="nav nav-pills nav-stacked">
	            <li>
	            	<a href="{{ route('messages.index', 'important') }}">
	            		<i class="fa fa-circle-o text-red"></i> Important
	            		@if($impCount)<span class="label label-default pull-right text-info"> {{ $impCount }} </span>@endif
	            	</a>
	            </li>
	            <li>
	            	<a href="{{ route('messages.index', 'urgent') }}">
	            		<i class="fa fa-circle-o text-yellow"></i> Urgent
	            		@if($urgCount)<span class="label label-default pull-right text-info"> {{ $urgCount }} </span>@endif
	            	</a>
	            </li>
	            <li>
	            	<a href="{{ route('messages.index', 'official') }}">
	            		<i class="fa fa-circle-o text-warning"></i> Official
	            		@if($offCount)<span class="label label-default pull-right text-info"> {{ $offCount }} </span>@endif
	            	</a>
	            </li>
	            <li>
	            	<a href="{{ route('messages.index', 'unofficial') }}">
	            		<i class="fa fa-circle-o text-info"></i> Unofficial
	            		@if($unoffCount)<span class="label label-default pull-right text-info"> {{ $unoffCount }} </span>@endif
	            	</a>
	            </li>
	            <li>
	            	<a href="{{ route('messages.index', 'normal') }}">
	            		<i class="fa fa-circle-o text-light-blue"></i> Normal
	            		@if($normalCount)<span class="label label-default float-right text-info"> {{ $normalCount }} </span>@endif
	            	</a>
	            </li>
	            <li>
	            	<a href="{{ route('messages.index', 'all') }}">
	            		<i class="fa fa-circle-o text-primary"></i> All
	            		@if($allCount)<span class="label label-default float-right text-info"> {{ $allCount }} </span>@endif
	            	</a>
	            </li>
	        </ul>
        </div>
        <!-- /.box-body -->
    </div>
  	<!-- /.box -->
</div>