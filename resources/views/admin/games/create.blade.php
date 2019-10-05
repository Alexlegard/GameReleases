@extends('layouts.admin-layout')

@section('content')
	
<form class="content-form" method="post" action="/admin/games" enctype="multipart/form-data">
	@csrf
	
	<div id="card-top">
		<h1>Add New Game</h1>
	</div>
	
	<div id="card-bottom">
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="title">Title:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="title">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="description">Description:</label>
			</div>
			
			<div class="col-6">
				<textarea name="description" rows="5" cols="49"></textarea>
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
					@foreach($publishers as $publisher)
						<option>{{ $publisher->title }}</option>
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
						<li value="{{ $genre->id }}"><input type="checkbox" name="genre[]" value="{{ $genre->id }}"> {{ $genre->title }}</li>
					@endforeach
				</ul>
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="releasedate">Release date:</label>
			</div>
			
			<div class="col-6">
				<input type="date" name="releasedate" value="2019-10-03">
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
			<input type="submit" value="Add Game">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection