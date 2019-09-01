<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Game Releases') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<style>
	h1 {
		text-align:center;
	}
	.content-form {
		width:800px;
		margin:auto;
		border:1px solid #696969;
		margin-top:1em;
		padding-bottom:1em;
		background-color:#f2f2f2;
	}
	#card-top {
		border-bottom: 1px solid #696969;
		background-color:#DCDCDC;
		padding-top:5px;
	}
	#card-bottom {
		padding-top:0.5em;
	}
	#form-group-row {
		display:flex;
		flex-direction:row;
		flex-wrap:nowrap;
		justify-content:center;
		margin-top:5px;
		margin-bottom:5px;
	}
	input[type=text] {
		width:100%;
	}
	input[type=submit] {
		width:100px;
		height:30px;
	}
	
	/*********** Below form in edit ************/
	.errors p {
		color:#ff0000;
		text-align:center;
		margin-top:20px;
	}
	
	.back-to-profile-btn { 
		text-decoration: none;
		background-color: #EEEEEE;
		color: #333333;
		padding: 2px 6px 2px 6px;
		border-top: 1px solid #CCCCCC;
		border-right: 1px solid #333333;
		border-bottom: 1px solid #333333;
		border-left: 1px solid #CCCCCC;
	}
	.back-to-profile-btn:hover {
		text-decoration:none;
		color:black;
	}
	.back-to-profile-container {
		text-align:center;
		margin-top:20px;
	}
	</style>
</head>
<body>
    <div id="app">
        <!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">-->
		<nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm text-light">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    Game Releases
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest <!-- If not logged in... -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else <!-- If logged in... -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
