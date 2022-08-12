<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Уроки</title>
	<link rel="stylesheet" href="{{ url('assets/css/vendors_css.css') }}">

	<!-- Стили-->
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
		<!-- Лого -->
		<a href="" class="logo">
		  <!-- лого-->
		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{ url('assets/image/logo.png')}}" alt="logo"></span>
		  </div>
		</a>
	</div>
    <!-- Главная нав.бара -->
    <nav class="navbar navbar-static-top">
      <!-- Кнопка сворачивания боковой панели-->
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item d-lg-inline-flex d-none">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen" title="Full Screen">
					<i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
	      <!-- Вкладки пользователей -->
          <li class="dropdown user user-menu">
            <a href="#" class="waves-effect waves-light dropdown-toggle" data-bs-toggle="dropdown" title="User">
				<i class="icon-User"><span class="path1"></span><span class="path2"></span></i>
            </a>
            <ul class="dropdown-menu animated flipInX">
                <li class="user-body">
                    <a class="dropdown-item" href="{{ route('profile.show',Auth::user()->id) }}"><i class="ti-user text-muted me-2"></i> Профиль</a>
                    <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       {{ __('Выход') }}
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
    <!-- боковая панель-->
    <section class="sidebar position-relative">
	  	<div class="multinav">
		  <div class="multinav-scroll" style="height: 100%;">
			  <!-- боковое меню-->
			    <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Темы уроков</li>
                    <li class="treeview">
                        @foreach($records as $record)
                            @foreach ($them as $th)
                                @if ($record->course_id == $th->course_id)
                                    @if ($th->course_id == request()->route('c_id'))
                                        @if (Auth::user()->id == $record->user_id)
                                        <a href="#">
                                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>{{ $th->title }}
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                            <ul class="treeview-menu">
                                                @foreach ($les as $l)
                                                    @if ($l->theme_course_id  == $th->id)
                                                        <li><a href="/user/course/{{$th->course_id}}/theme/{{$l->theme_course_id }}/lesson/{{$l->id}}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>{{ $l->title }}</a></li>

                                                    @endif
                                                @endforeach
                                            </ul>
                                        </a>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </li>
			    </ul>
		    </div>
		</div>
    </section>
	<div class="sidebar-footer">
		<a href="javascript:void(0)" class="link" data-bs-toggle="tooltip" title="Logout"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
	</div>
  </aside>
  <div class="content-wrapper ">
	  <div class="container-full">
		<section class="content">
            @yield('content')
		</section>
	  </div>
  </div>

	<script src="{{ url('assets/js/vendors.min.js') }}"></script>
	<script src="{{ url('assets/js/pages/chat-popup.js') }}"></script>
    <script src="{{ url('assets/icons/feather-icons/feather.min.js') }}"></script>

	<script src="{{ url('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	<script src="{{ url('assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>

	<script src="{{ url('assets/js/template.js') }}"></script>
	<script src="{{ url('assets/js/pages/dashboard.js') }}"></script>
	<script src="{{ url('assets/js/pages/calendar.js') }}"></script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
