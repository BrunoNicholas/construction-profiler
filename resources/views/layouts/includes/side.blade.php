<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      	<!-- Sidebar user panel -->
	    <div class="user-panel">
	        <div class="pull-left image">
	          	<img src="{{ asset('files/profile/images/' . Auth::user()->profile_image) }}" class="img-circle" alt="User Image">
	        </div>
	        <div class="pull-left info">
	          	<p>{{ Auth::user()->name }}</p>
	          	<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	        </div>
	    </div>
      	<!-- search form -->
	    <form action="#" method="get" class="sidebar-form">
	        <div class="input-group">
	          	<input type="text" name="q" class="form-control" placeholder="Search...">
	          	<span class="input-group-btn">
	                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
	                  	<i class="fa fa-search"></i>
	                </button>
	            </span>
	        </div>
	    </form>
	    <!-- /.search form -->
	    <!-- sidebar menu: : style can be found in sidebar.less -->
	    <ul class="sidebar-menu" data-widget="tree">
	        <li class="header text-center">MAIN MENU</li>
	        <li class="active treeview menu-open">
		        <a href="#">
		            <i class="fa fa-dashboard"></i> <span>START</span>
		            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
		        </a>
		        <ul class="treeview-menu">
		            <li class="active"><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home </a></li>
		            @role(['super-admin','admin'])<li><a href="{{ route('userhome') }}"><i class="fa fa-user"></i> User Home </a></li>@endrole
			        <li>
			          <a href="{{ route('messages.index', 'inbox') }}">
			            <i class="fa fa-envelope"></i> <span>Messages</span>
			            <span class="pull-right-container">
			              	<small class="label pull-right bg-green" title="Inbox">0</small>
			            </span>
			          </a>
			        </li>
		        </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-pie-chart"></i>
	            <span>Companies</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('companies.index') }}"><i class="fa fa-circle-o"></i> View All Companiews </a></li>
	            <li><a href="{{ route('companies.index') }}"><i class="fa fa-circle-o"></i> My Companies </a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-files-o"></i>
	            <span>Projects</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> View Projects </a></li>
	            <li><a href="{{ route('projects.index') }}"><i class="fa fa-circle-o"></i> My Projects </a></li>
	            <li><a href="{{ route('projects.create') }}"><i class="fa fa-circle-o"></i> Add Projects </a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-table"></i> <span>Worker Profiles</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('profiles.index') }}"><i class="fa fa-circle-o"></i> View Worker Profiles</a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-folder"></i> <span>My Gallery</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('galleries.index') }}"><i class="fa fa-circle-o"></i> My Galleries</a></li>
	            <li><a href="{{ route('images.index') }}"><i class="fa fa-circle-o"></i> My Images </a></li>
	            <li><a href="javascript:void(0)"><i class="fa fa-circle-o"></i> Attachments</a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-edit"></i> <span>Posts & Questions</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i> View Posts</a></li>
	            <li><a href="{{ route('questions.index') }}"><i class="fa fa-circle-o"></i> Questions </a></li>
	            <li><a href="{{ route('questions.create') }}"><i class="fa fa-circle-o"></i> Ask Question</a></li>
	          </ul>
	        </li>
	        <li class="treeview">
	          <a href="#">
	            <i class="fa fa-share"></i> <span> Shortcuts</span>
	            <span class="pull-right-container">
	              <i class="fa fa-angle-left pull-right"></i>
	            </span>
	          </a>
	          <ul class="treeview-menu">
	            <li><a href="{{ route('questions.create') }}"><i class="fa fa-circle-o"></i> Ask A Question</a></li>
	            <li><a href="{{ route('posts.create') }}"><i class="fa fa-circle-o"></i> Add Post</a></li>
	            <li><a href="{{ route('projects.create') }}"><i class="fa fa-circle-o"></i> Add Project</a></li>
	          </ul>
	        </li>
	        <li class="header text-center">Operations</li>
	        <li class="text-center"><a href="{{ route('profile') }}"><i class="fa fa-gear text-yellow"></i><span>My Settings</span> </a> </li>
	        <li class="text-center"><a href="#"><i class="fa fa-user-o text-aqua"></i><span>My Worker Profile </span> </a> </li>
	        <li class="text-left"><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off text-red"></i> 
	        	<span>Logout </span> </a> 
		        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
		    </li>
	    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>