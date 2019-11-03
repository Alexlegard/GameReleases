@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this publisher? All games with this publisher will have them removed."))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<h1>{{ $publisher->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div>
			<a href="{{ url('admin/publishers') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/publishers/' . $publisher->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this Publisher</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/publishers/' . $publisher->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this publisher" onclick="return ConfirmDelete();">
		</form>
		
		<div class="description">
			{{ $publisher->description }}
		</div>
		
		<h4 class="publisher_games_header">
			Games published by {{ $publisher->title }}:
		</h4>
		
		<ul>
			@foreach($games as $game)
				<li><a href="{{ url('admin/games/'. $game->id) }}">{{ $game->title }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/publisher_logos/'. $publisher->logo) }}" alt="Default company logo" width="300" height="300">
	</div>
</div>

@endsection