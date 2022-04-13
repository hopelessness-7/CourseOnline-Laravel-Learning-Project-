<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Admin Panel</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ url('assets/css/vendors_css.css') }}">

	<!-- Style-->
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/skin_color.css') }}">

  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
<div class="wrapper">
	<div id="loader"></div>

  <header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">
		<a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent" data-toggle="push-menu" role="button">
			<span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
		</a>
		<!-- Logo -->
		<a href="" class="logo">
		  <!-- logo-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{ url('assets/image/logo.png')}}" alt="logo"></span>
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
	      <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
              <li class="user-body">
				 <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
				 <a class="dropdown-item" href="#"><i class="ti-wallet text-muted me-2"></i> My Wallet</a>
				 <a class="dropdown-item" href="#"><i class="ti-settings text-muted me-2"></i> Settings</a>
				 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- sidebar menu-->
			  <ul class="sidebar-menu" data-widget="tree">
				<li class="header">Управление курсами</li>
				<li class="treeview">
				<a href="#">
					<i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
					<span>Обучение</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ route('categories.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Категории</a></li>
					<li><a href="{{ route('courses.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Курсы</a></li>
					<li><a href="{{ route('theme_courses.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Темы курсов</a></li>
					<li><a href="{{ route('lessons.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Уроки</a></li>
				  </ul>
				</li>
				<li class="header">Пользователи</li>
                <li class="treeview">
                    <a href="#">
                      <i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
                      <span>Пользователи</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="{{ route('users.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Пользователи</a></li>
                    </ul>
                  </li>
                <li class="treeview">
				  <a href="#">
					<i class="icon-Library"><span class="path1"></span><span class="path2"></span></i>
					<span>Роли</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
					<li><a href="{{ route('roles.index') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Роли</a></li>
				  </ul>
				</li>
			  </ul>
		  </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<!-- <a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Settings"><span class="icon-Settings-2"></span></a>
		<a href="mailbox.html" class="link" data-bs-toggle="tooltip" title="Email"><span class="icon-Mail"></span></a> -->
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
            @yield('content')
		</section>
		<!-- /.content -->
	  </div>
  </div>

	<!-- Vendor JS -->
	<script src="{{ url('assets/js/vendors.min.js') }}"></script>
	<script src="{{ url('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ url('assets/icons/feather-icons/feather.min.js') }}"></script>

	<script src="{{ url('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ url('assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

	<!-- EduAdmin App -->
	<script src="{{ url('assets/js/template.js') }}"></script>
	<script src="{{ url('assets/js/pages/dashboard.js') }}"></script>
	<script src="{{ url('assets/js/pages/calendar.js') }}"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
