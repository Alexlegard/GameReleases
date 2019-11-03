@extends('layouts.admin-layout')

@section('content')

<!-- To add a new publisher: We only need to set the title. -->

<!-- REMEMBER TO SET THE ACTION -->
<form class="content-form" method="post" action="/admin/publishers" enctype="multipart/form-data">
	@csrf
	
	<div id="card-top">
		<h1>Add New Publisher</h1>
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
				<label for="image">Company Logo:</label>
			</div>
			
			<div class="col-6">
				<input type="file" class="form-control-file" id="logo" name="logo">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="Add Publisher">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/publishers') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection