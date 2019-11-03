@extends('layouts.admin-layout')


@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this game?"))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<h1>{{ $game->title }}</h1>

<div class="row">

	<div class="col-6">
		<h4 id="releasedate">
			Release date: {{ $game->release_date }}
		</h4>
		
		<h4 id="publisher">
			Publisher: {{ $publisher->title }}

		</h4>

		<div class="top-card">
			<div class="game_details">
				
				<p>
					Developer:
					@foreach($game->developer as $d)
						{{ $d->title }}
					@endforeach
				</p>

				<p id="publisher">
					Publisher: {{ $publisher->title }}
				</p>

				<p id="genre">
					Genres:
					@foreach($game->genres as $g)
						{{ $g->title }}
					@endforeach
				</p>
				
				<p id="releasedate">
					Release date: {{ $game->release_date }}
				</p>
				
				<p id="consoles">
					Platforms:
					@foreach($game->console as $console)
						{{ $console->title }}
					@endforeach
				</p>
			</div>
		</div>
	
		<div class="description">
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


			<input type="submit" value="Delete this game" onclick="return ConfirmDelete();">
		</form>
		
	</div>
	<div class="col-6">
		<img src="{{ asset('storage/game_boxart/'. $game->boxart) }}" alt="Default box art" width="300" height="300">
	</div>
</div>

@endsection