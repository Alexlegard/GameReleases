@extends('layouts.admin-layout')

@section('content')

<h1>{{ $game->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<h4 id="releasedate">
			Release date: {{ $game->release_date }}
		</h4>
		
		<h4>
			Developer:
			@foreach($game->developer as $d)
				{{ $d->title }}
			@endforeach
		</h4>
		
		<h4 id="publisher">
			Publisher: {{ $publisher->title }}
		</h4>
		
		<h4 id="genre">
			Genre:
			@foreach($game->genre as $g)
				{{ $g->title }}
			@endforeach
		</h4>
		
		<div id="description">
			{{ $game->description }}
		</div>
		<div>
			<a href="{{ url('admin/games') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/games/' . $game->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this game</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/games/'. $game->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this game">
		</form>
		
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/game_boxart/'. $game->boxart) }}" alt="Default box art" width="300" height="300">
	</div>
</div>

@endsection