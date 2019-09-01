@extends('layouts.master') <!-- Shorthand for layouts/master.blade.php -->
	
@section('content')

<form class="content-form" method="post">
	
	<div id="card-top">
		<h1>Contact Me</h1>
	</div>
	
	<div id="card-bottom">
		<div id="form-group-row">
			<div class="col-6">
				<label for="name">Name:</label>
			</div>
			
			<div class="col-6">
				<input type="text" name="name">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="message">Message:</label>
			</div>
			<div class="col-6">
				<input type="text" name="message">
			</div>
		</div>
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="security-answer">What is 2 + 3?</label>
			</div>
			<div class="col-6">
				<input type="text" name="security-answer">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="OK">
		</div>
	</div>
</form>

@endsection