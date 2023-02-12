<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->

    @yield('scripts')
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-lg sticky-top" style="background-color: rgb(47, 125, 235)">
            <div class="container">
                <b><a class="navbar-brand" href="{{ url('/') }}">
                    WhitePaper
                </a></b>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <form action="{{route('search')}}" id="search-form" class="d-flex p-2" method="GET">
                            <input class="form-control me-2" type="text" placeholder="Search" id="search" name="search">
                            <button class="btn btn-warning" style="color:white" type="submit">Search</button>
                          </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item p-2">
                            <a class="nav-link" href="{{route('home') }}">Home</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link" href="{{route('our_story') }}">Our story</a>
                        </li>
                        <li class="nav-item p-2">
                            <a class="nav-link" href="{{route('contact_us') }}">Contact Us</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown p-2">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div  data-bs-spy="scroll" class="dropdown-menu dropdown-menu-end" style="background-color:rgb(105, 156, 228)" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('user.dashbord', ['user'=> auth()->user()->id]) }}">
                                        dashbord
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.show_profile') }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.create_article') }}">
                                        Create article
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.show_myarticles') }}">
                                        My Articles
                                    </a>
                                    <a class="dropdown-item" href="{{ route('user.show_savedlist')}}">Saved articles</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @if (auth()->user()->type === 'admin')
                                <li class="nav-item p-2">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Admin Panel</a>
                                </li>
                            @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @include('sweetalert::alert')
            @yield('content')

        </main>
    </div>
</body>
</html>
