@extends('layouts.admin-layout')

@section('content')


@if( isset($developers[0]) && isset($publishers[0]) && isset($consoles[0]) )

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
				<select name="developer[]" value="" multiple="multiple">
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

				<label for="developer">Consoles:</label>
			</div>
			
			<div class="col-6">
				<ul>
					@foreach($consoles as $console)
						<li value="{{ $console->id }}"><input type="checkbox" name="console[]" value="{{ $console->id }}"> {{ $console->title }}</li>
					@endforeach
				</ul>
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
				<input type="date" name="releasedate">
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
@else
<h1 style="color:#ff0000;">Couldn't make a new game...</h1>	

<p style="color:#ff0000;font-size:16pt;text-align:center;">
	Please make sure you have at least one <a href="{{ url('admin/developers') }}">developer</a>,
	one <a href="{{ url('admin/publishers') }}">publisher</a>,
	and one <a href="{{ url('admin/consoles') }}">console</a> before adding a new game.
</p>
@endif
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection