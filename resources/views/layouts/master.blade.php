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
		
		<style>
			html, body {
				margin:0;
				font-family: 'Nunito', sans-serif;
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
        </style>
	</head>
	<body> <!-- Header-top -->
		@section('header')
		<div id="header-top">
			@if (Route::has('login'))
				<div id="top-nav">
					@auth <!-- If user is signed in -->
						<a href="profile/{{Auth::User()->id}}">Profile</a>
					@else <!-- If user is not signed in -->
						<a href="{{ route('login') }}">Login</a>
						
						@if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
					@endauth
					
					<a href="suggestgame">Suggest a Game</a>
					<a href="contact">Contact Me</a>
				</div>
				<div class="clear"></div>
			@endif
		</div>
		
		<!-- Header-bottom -->
		<div id="header-bottom">
			<div id="logo">
				<a href="/">
					<img class="rounded mx-auto d-block" src="images/GameReleasesLogo.jpg"
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
