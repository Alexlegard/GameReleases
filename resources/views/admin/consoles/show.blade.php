@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this console? All games with this console will have them removed."))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<h1>{{ $console->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div>
			<a href="{{ url('admin/consoles') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/consoles/' . $console->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this console</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/consoles/' . $console->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this console" onclick="return ConfirmDelete();">
		</form>
		
		<div class="description">
			{{ $console->description }}
		</div>
		
		<h4 class="console_games_header">
			{{ $console->title }} games:
		</h4>
		
		<ul>
			@foreach($console->game as $game)
				<li><a href="{{ url('admin/games/'. $game->id) }}">{{ $game->title }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/console_logos/'. $console->logo) }}" alt="Default console logo" width="300" height="300">
	</div>
</div>

@endsection