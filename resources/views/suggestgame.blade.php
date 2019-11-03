@extends('layouts.master')

@section('content')

<form class="content-form" method="post" action="suggestgame">
@csrf
	<div id="card-top">
		<h1>Suggest a Game</h1>
	</div>
	
	<div id="card-bottom">
	
		<div id="form-group-row">
			<div class="col-6">
				<label>Title:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="title">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label>Release date:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="releasedate">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label>Developer:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="developer">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label>Publisher:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="publisher">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="OK">
		</div>
	</div>
</form>

@endsection