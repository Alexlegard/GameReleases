@extends('layouts.master')
	
@section('content')

<form class="content-form" method="post" action="contact">
@csrf
	
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
				<label for="message">Email address:</label>
			</div>
			<div class="col-6">
				<input type="text" name="email">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="OK">
		</div>
	</div>
</form>

@endsection