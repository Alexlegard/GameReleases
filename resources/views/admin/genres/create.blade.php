@extends('layouts.admin-layout')

@section('content')

<!-- To add a new genre: We only need to set the title. -->


<form class="content-form" method="post" action="/admin/genres" enctype="multipart/form-data">
	@csrf
	
	<div id="card-top">
		<h1>Add New Genre</h1>
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
			<input type="submit" value="Add Genre">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/games') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection