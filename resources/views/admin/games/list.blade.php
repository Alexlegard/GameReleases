@extends('layouts.admin-layout')

@section('content')
	<h1>List of Games</h1>
	
	<a href="{{ url('admin/games/create') }}" style="color:#00008b;font-size:15pt;">Add New Game</a>
	@if(!empty($games[0]))
	<ul>
		@foreach($games as $game)
			<li><a href="{{ url('admin/games/' . $game->id) }}" style="color:#00008b;">{{ $game->title }}</a></li>
		@endforeach
	</ul>
	@else
	<p>We didn't find any games!</p>
	@endif
@endsection