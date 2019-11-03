@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this developer? All games with this developer will have them removed."))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<h1>{{ $developer->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div>
			<a href="{{ url('admin/developers') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/developers/' . $developer->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this developer</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/developers/' . $developer->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this developer" onclick="return ConfirmDelete();">
		</form>
		
		<div class="description">
			{{ $developer->description }}
		</div>
		
		<h4 class="developer_games_header">
			Games developed by {{ $developer->title }}:
		</h4>
		
		<ul>
			@foreach($developer->game as $game)
				<li><a href="{{ url('admin/games/'. $game->id) }}">{{ $game->title }}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/developer_logos/'. $developer->logo) }}" alt="Default company logo" width="300" height="300">
	</div>
</div>

@endsection