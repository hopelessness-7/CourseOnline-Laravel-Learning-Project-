<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">


    <meta name="description" content="">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap') }}">
    <link rel="stylesheet" id="css-main" href="{{ url('assets/css/codebase.min.css') }}">

  </head>
    <body>
      <header id="page-header">
        <div class="content-header">
          <div class="content-header-section">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user d-sm-none"></i>
                <span class="d-none d-sm-inline-block">Сергеев Максим</span>
              </button>
              <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Пользователь
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="op_auth_signin.html">
                  <i class="si si-logout mr-5"></i> Профиль
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                  <i class="si si-wrench mr-5"></i> Мои курсы
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Выход') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
              </div>
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($website_name as $key)
                    <li>
                        <a href="/user/categories/index/{{ $key->id }}">{{ $key->title }}</a>
                    </li>
                    </a>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

      <main id="main-container">
        <div class="content">
          <div class="row row-deck items-push">
            @yield('content')
        </div>
      </main>
      <footer id="page-footer">
      </footer>
    </div>

    <script src="{{ url('assets/js/codebase.core.min.js') }}"></script>
    <script src="{{ url('assets/js/codebase.app.min.js') }}"></script>

  </body>
</html>
