@extends('layouts.admin-layout')

@section('content')
	<h1>Hello {{ $user->name }}</h1>

	
	<p>{{ $nogames }} games</p>
	<p>{{ $nodevelopers }} developers</p>
	<p>{{ $nopublishers }} publishers</p>
	<p>{{ $noconsoles }} consoles</p>
	<p>{{ $nogenres }} genres</p>

@endsection