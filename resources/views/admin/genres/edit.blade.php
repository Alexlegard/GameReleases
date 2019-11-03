@extends('layouts.admin-layout')

@section('content')

<form class="content-form" method="post" action="{{ url('/admin/genres/' . $genre->id ) }}">
	@csrf
	@method('PATCH')
	
	<div id="card-top">
		<h1>Editing {{ $genre->title }}</h1>
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
			<input type="submit" value="Edit Genre">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/genres') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection