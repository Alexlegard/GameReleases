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
		margin-top:1em;
	}
	#sidebar {
		border-right:2px solid black;
		padding-top:1.5em;
	}
	#sidebar ul li a {
		color:white;
		font-size:15pt;
		text-align:right;
	}
	
	/********* Form *********/
	h1 {
		text-align:center;
		margin-bottom:1.5em;
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
		width:auto;
		height:30px;
	}
	
	/*********** Below form in edit ************/
	.errors p {
		color:#ff0000;
		text-align:center;
		margin-top:20px;
	}
	
	.back-to-list-btn { 
		text-decoration: none;
		background-color: #EEEEEE;
		color: #333333;
		padding: 2px 6px 2px 6px;
		border-top: 1px solid #CCCCCC;
		border-right: 1px solid #333333;
		border-bottom: 1px solid #333333;
		border-left: 1px solid #CCCCCC;
	}
	.back-to-list-btn:hover {
		text-decoration:none;
		color:black;
	}
	.back-to-list-container {
		text-align:center;
		margin-top:20px;
	}
	
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-sm-2" id="sidebar" style="background-color:#606060; height:100vh;">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('admin/games') }}">Games</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('admin/developers') }}">Developers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('admin/publishers') }}">Publishers</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('admin/genres') }}">Genres</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('') }}">Visit Website</a>
					</li>
				</ul>
			</div>
			
			<!-- Main content -->
			<div class="col-sm-10">
				@yield('content')
			</div>
		</div>
	</div>
</body>