@extends('layouts.admin-layout')

@section('content')

<form class="content-form" method="post" action="{{ url('/admin/users/' . $user->id ) }}">
	@csrf
	@method('PATCH')
	
	<div id="card-top">
		<h1>Editing {{ $user->username }}</h1>
	</div>
	
	<div id="card-bottom">
		
		<div id="form-group-row">
			<div class="col-6">
				<label for="title">Is admin:</label>
			</div>
			
			<div class="col-6">
				<div>
					@if($user->type == 'admin')
						<input type="radio" name="is_admin" value="admin" checked>Yes</input>
					@else
						<input type="radio" name="is_admin" value="admin">Yes</input>
					@endif
				</div>
				<div>
					@if($user->type == 'admin')
						<input type="radio" name="is_admin" value="default">No</input>
					@else
						<input type="radio" name="is_admin" value="default" checked>No</input>
					@endif
				</div>
			</div>
		</div>
		
		<div id="form-group-row">
			<input type="submit" value="Submit">
		</div>
	</div>
</form>
	
<div class="back-to-list-container">
	<a href="{{ url('/admin/users') }}" class="back-to-list-btn">Back to List</a>
</div>
	
@endsection