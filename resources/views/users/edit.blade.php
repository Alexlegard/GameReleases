@extends('layouts.profile-layout')

@section('content')

<form class="content-form" method="post" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
	@csrf
	@method('PATCH')
	
	<div id="card-top">
		<h1>Edit Profile</h1>
	</div>
	
	<div id="card-bottom">
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="description">Description:</label>
			</div>
			
			<div class="col-6">
				<textarea name="description" rows="5" cols="49">{{ Auth::user()->profile->description }}</textarea>
			</div>
			
			
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="url">URL:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="url" value="{{ Auth::user()->profile->url }}">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="image">Profile image:</label>
			</div>
			
			<div class="col-6">
				<input type="file" class="form-control-file" id="image" name="image">
			</div>
		</div>
		
		
		<div id="form-group-row">
			<input type="submit" value="Save Profile">
		</div>
	</div>
</form>

<div class="errors">
	@if ($errors->has('description'))
		<p>{{ $errors->first('description') }}</p>
	@endif

	@if ($errors->has('url'))
		<p>{{ $errors->first('url') }}</p>
	@endif
	
	@if ($errors->has('image'))
		<p>{{ $errors->first('image') }}</p>
	@endif
</div>

<div class="back-to-profile-container">
	<a href="{{URL::to('profile/'. $user->id .'')}}" class="back-to-profile-btn">Back to Profile</a>
</div>

@endsection