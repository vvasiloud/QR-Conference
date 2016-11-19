@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
		  <li class="treeview">
			<a href="#"><i class="fa fa-file-o"></i> <span>Content</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{ url('admin/menu-item') }}"><i class="fa fa-list"></i> <span>Menu</span></a></li>	
				<li><a href="{{ url('admin/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
			</ul>
		  </li>	  	
		  <li class="treeview">
			<a href="#"><i class="fa fa-globe"></i> <span>Conferences</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-flag-checkered"></i> <span>Attendees</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/attendees') }}"><i class="fa fa-flag-checkered"></i> List</a></li>
						<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/attendees-activity') }}"><i class="fa fa-language"></i> Activity</a></li>
						<li><a href="{{ url('/masscheckout/1') }}"><i class="fa fa-language"></i> Mass checkout</a></li>
					</ul>
				</li>
				<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/venues') }}"><i class="fa fa-language"></i> Venues</a></li>
				<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/auditoriums') }}"><i class="fa fa-language"></i> Auditoriums</a></li>
			</ul>
		  </li>		  
		  <li class="treeview">
			<a href="#"><i class="fa fa-terminal"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{ url('admin/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
				<li><a href="{{ url('admin/backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
				<li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
			</ul>
		  </li>	
		  <li class="treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Configuration</span> <i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li><a href="{{ url('admin/setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
				  <li class="treeview">
					<a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
						<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
					</ul>
				  </li>
				  <li class="treeview">
					<a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
					  <li><a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
					  <li><a href="{{ url('admin/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
					  <li><a href="{{ url('admin/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
					</ul>
				  </li>	
			</ul>
		  </li>		  




          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
