@extends('layouts.admin-layout')

@section('content')

<form class="content-form" method="post" action="{{ url('/admin/games/'. $game->id) }}" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	
	<div id="card-top">
		<h1>Editing {{ $game->title }}</h1>
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
						<option value="{{ $developer->id }}">{{ $developer->title }}</option>
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
						<li value="{{ $genre->id }}"><input value="{{ $genre->id }}" type="checkbox" name="genre[]"> {{ $genre->title }}</li>
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

<div class="errors">
	@if($errors->has('title'))
		<p>Title is required.</p>
	@endif
	
	@if($errors->has('description'))
		<p>Description is required.</p>
	@endif
	
	@if($errors->has('developer'))
		<p>Developer is required.</p>
	@endif
	
	@if($errors->has('publisher'))
		<p>Publisher is required.</p>
	@endif
	
	@if($errors->has('genre'))
		<p>Genre is required.</p>
	@endif
	
	@if($errors->has('releasedate'))
		<p>Release date must be a date.</p>
	@endif
	
	@if($errors->has('boxart'))
		<p>Box art must be an image.</p>
	@endif
</div>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games/'. $game->id) }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection