<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Icono -->
    <link rel="shortcut icon" href="{{ asset('images/ninosICO.ico')}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <!--No se necesita registro
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        -->

                        @else
                        <li class="nav-item">
                            <a  class="nav-link" href="{{route('posts.index')}}">
                                Posts
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a  class="nav-link" href="{{route('groups.index')}}">
                                Groups
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('units.index')}}">
                                Units
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($errors))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('popper.js/dist/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('scripts')
</body>

</html>
