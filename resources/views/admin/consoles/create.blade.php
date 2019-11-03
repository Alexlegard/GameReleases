@extends('layouts.admin-layout')

@section('content')

<!-- To add a new genre: We only need to set the title. -->

<form class="content-form" method="post" action="/admin/consoles" enctype="multipart/form-data">
	@csrf
	
	<div id="card-top">
		<h1>Add New Console</h1>
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
				<label for="logo">Console Logo:</label>
			</div>
			
			<div class="col-6">
				<input type="file" class="form-control-file" id="logo" name="logo">
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="Add Console">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection