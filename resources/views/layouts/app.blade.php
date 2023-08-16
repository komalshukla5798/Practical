<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    @if (Auth::check())
    <a class="navbar-brand" href="#">Welcome</a>
    @else
    <a class="navbar-brand" href="#">Hello</a>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::check())
                        <li><a href="{{ route('clients.index') }}">Clients</a></li>
                        @if(Auth::user()->role == 1)
                        <li><a href="{{ route('employees.index') }}">Employees</a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">><i class="fa fa-btn fa-sign-out"></i>Logout</a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                                  </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
  </nav>
  <div class="container">
    @yield('content')
  </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>

  @yield('scripts')
</div>
<style type="text/css">
  .help-block{
    color: red;
  }
</style>
</body>
</html>
