<!-- Master layout for the welcome page, search results, and game info page. -->

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
		

		@yield('scripts')
		
		<style>
			html, body {
				margin:0;
				font-family: 'Nunito', sans-serif;
			}

			.content {
				padding-left:8px;
				padding-right:8px;
			}

			/************** Header-top styles **************/
            #header-top { /* The outer element */
				background-color:#660000;
				padding-top:5px;
				padding-bottom:5px;
				border-bottom:2px solid #191919;
				
			}
			#top-nav { /* The inner element */
				float:right;
			}
			
			.clear { clear:both; }
			
			#top-nav a {
				color:white;
				text-decoration:none;
				margin-left:5px;
				margin-right:5px;
			}
			
			/*************** Header-bottom styles *************/
			#header-bottom {
				background-color:#990000;
				color:white;
				
				display:flex;
				flex-direction:row;
				flex-wrap:nowrap;
				justify-content:space-evenly;
			}
			#search-game {
				padding-top:5px;
			}
			#search-game h3, #search-game__query, #search-game__submit, #search-game__advanced {
				text-align:center;
				margin-top:5px;
				margin-bottom:5px;
			}
			#search-game__advanced a {
				color:white;
			}
			
			/*************** Content styles *******************/
			h1 {
				text-align:center;
				margin-top:1em;
				margin-bottom:1em;
			}
			.content-form {
				width:800px;
				margin:auto;
				border:1px solid #696969;
				margin-top:1em;
				padding-bottom:1em;
				background-color:#f2f2f2;
			}

			.genre_header {
				margin-top:1em;
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

			.no-games-msg {
				font-size:16pt;
				margin-top:1em;
			}
			/***************** Game details (show) ***************/
			.top-card {
				background-color:#C0C0C0;
				padding-top:2em;
				padding-bottom:2em;
				border:1px solid black;
			}
			.game_details p {
				margin-top:0px;
				margin-bottom:0px;
				margin-left:1em;
				color:black;
			}
			.description {
				margin-top:2em;
				margin-bottom:2em;
			}
			/* Signin prompt if not signed in */
			
			.signin-prompt {
				font-size:16pt;
				text-decoration: none;
				background-color: #EEEEEE;
				color: #333333;
				padding: 2px 6px 2px 6px;
				border-top: 1px solid #CCCCCC;
				border-right: 1px solid #333333;
				border-bottom: 1px solid #333333;
				border-left: 1px solid #CCCCCC;
			}
			.signin-prompt:hover {
				color:black;
				text-decoration:none;
			}
			.signin-container {
				text-align:center;
			}
			/********************** Comment styles ***********************/
			.comment-header {
				margin-top:2em;
				font-weight:bold;
			}
			.comment-content {
				text-indent:30px;
			}
			
        </style>
	</head>
	<body> <!-- Header-top -->
		
		
		@section('header')
		<div id="header-top">
			@if (Route::has('login'))
				<div id="top-nav">
					@auth <!-- If user is signed in -->

						<a href="{{ url('profile/' . Auth::User()->id) }}">Profile</a>
					@else <!-- If user is not signed in -->
						<a href="{{ url('login') }}">Login</a>
						
						@if (Route::has('register'))
                            <a href="{{ url('register') }}">Register</a>
                        @endif
					@endauth
					
					<a href="{{ url('suggestgame') }}">Suggest a Game</a>
					<a href="{{ url('contact') }}">Contact Me</a>

				</div>
				<div class="clear"></div>
			@endif
		</div>
		
		<!-- Header-bottom -->
		<div id="header-bottom">
			<div id="logo">
				<a href="/">

					<img class="rounded mx-auto d-block" src="{{ asset('images/GameReleasesLogo.jpg') }}"

					alt="Curious pixel face" width="280px" height="140px">
				</a>
			</div>
			
			<div id="search-game">
				
				<form method="post" action="">
					<div id="search-game__header">
						<h3>Search for a game...</h3>
					</div>
					<div id="search-game__query">
						<input type="text" name="query" value="Search...">
					</div>
					<div id="search-game__submit">
						<input type="submit" value="GO">
					</div>
					<div id="search-game__advanced">
						<a href="advanced">Advanced</a>
					</div>
				</form>
			</div>
		</div>
		@show
		
		<div class="content">
			@yield('content')
		</div>
		
	</body>
</html>
