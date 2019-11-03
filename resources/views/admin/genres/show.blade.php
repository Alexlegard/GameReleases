@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this genre? All games with this genre will have them removed."))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<h1>{{ $genre->title }}</h1>

<div>
	<a href="{{ url('admin/genres') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
</div>
<div>
	<a href="{{ url('admin/genres/' . $genre->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this Genre</a>
</div>

<form class="delete-form" method="post" action="{{ url('admin/genres/' . $genre->id) }}">
@csrf
@method('DELETE')

	<input type="submit" value="Delete this genre" onclick="return ConfirmDelete();">
</form>

<h4 class="genre_games_header">{{ $genre->title }} games:</h4>

<ul>
	@foreach($genre->game as $game)
		<li><a href="{{ url('admin/games/'. $game->id) }}">{{ $game->title }}</a></li>
	@endforeach
</ul>

@endsection