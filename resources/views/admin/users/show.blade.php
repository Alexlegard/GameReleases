@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this user for good?"))
		event.preventDefault();
	}
	function ConfirmAdmin(){
		if(!confirm("Are you sure you want to set this user as an admin? They will be able to delete ANY game or ANY user or set any user as admin."))
		event.preventDefault();
	}
	function ConfirmBan(){
		if(!confirm("Do you really want to slam the banhammer?"))
			event.preventDefault();
	}
</script>
@endsection

@section('content')

<div class="row">
	<div class="col-sm-6">
	
		<p style="margin-top:2.3em;"><span style="font-weight:bold;">Name:</span> {{ $user->name }}</p>
		
		<p><span style="font-weight:bold;">Username:</span> {{ $user->username }}</p>
		
		<p><span style="font-weight:bold;">Account type:</span> {{ $user->type }}</p>
		
		<p><span style="font-weight:bold;">Strikes:</span> {{ $user->strikes }}</p>
		
		<p><span style="font-weight:bold;">Account created:</span> {{ $user->created_at }}</p>
		
		@if($user->banned_until == null)
			<p><span style="font-weight:bold;">Banned:</span> No</p>
		@else
			<p><span style="font-weight:bold;">Banned until:</span> {{ $user->banned_until }}</p>
		@endif
		
		<!-- Delete this user -->
		<form class="delete-form" method="post" action="{{ url('admin/users/' . $user->id) }}">
		@csrf
		@method('DELETE')
			<div>
				<input type="submit" value="Delete this user" onclick="return ConfirmDelete();">
			</div>
		</form>
		
		<!-- Set this user as an admin -->
		<div>
			<a href="{{ url('admin/users/' . $user->id) . '/edit_admin' }}" style="color:#00008b;font-size:15pt;" onclick="return ConfirmAdmin();">
				Set as Admin
			</a>
		</div>
		
		<div>
			<a href="{{ url('admin/users') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
	</div>
</div>

@endsection