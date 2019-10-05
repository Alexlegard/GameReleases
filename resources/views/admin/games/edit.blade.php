@extends('layouts.admin-layout')

@section('content')

<form class="content-form" method="post" action="url('/admin/games/'. $game->id)" enctype="multipart/form-data">
	@csrf
	
	<div id="card-top">
		<h1>Edit {{ $game->title }}</h1>
	</div>
	
	<div id="card-bottom">
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="title">Title:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="title" value="{{ $game->title }}">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="description">Description:</label>
			</div>
			
			<div class="col-6">
				<textarea name="description" rows="5" cols="49">{{ $game->description }}</textarea>
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="developer">Developer:</label>
			</div>
			
			<div class="col-6">
				<select name="developer[]" multiple="multiple">
					@foreach($developers as $developer)
						<option>{{ $developer->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="publisher">Publisher:</label>
			</div>
			
			<div class="col-6">
				<select name="publisher">
					@foreach($publishers as $p)
						<option<?php if($p->id==$publisher->id){ echo ' selected'; } ?>>{{ $p->title }}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="genres">Genres:</label>
			</div>
			
			<div class="col-6">
				<ul>
					@foreach($genres as $genre)
						<li><input type="checkbox" name="genre[]" value="{{ $genre->title }}"> {{ $genre->title }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="releasedate">Release date:</label>
			</div>
			
			<div class="col-6">
				<input type="date" name="releasedate" value="{{ $game->release_date }}">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="boxart">Box Art:</label>
			</div>
			
			<div class="col-6">
				<input type="file" class="form-control-file" id="boxart" name="boxart">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="Edit Game">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games/'. $game->id) }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection