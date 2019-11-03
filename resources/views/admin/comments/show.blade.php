@extends('layouts.admin-layout')

@section('scripts')
<script>
	function ConfirmDelete(){
		if(!confirm("Are you sure to delete this comment?"))
		event.preventDefault();
	}
</script>
@endsection

@section('content')

<div class="row">
	<div class="col-sm-6">
	
		<p style="margin-top:2.3em;"><span style="font-weight:bold;">User:</span> {{ $comment->user->name }}</p>
		
		<p><span style="font-weight:bold;">User strikes:</span> {{ $comment->user->strikes }}</p>
		
		<p><span style="font-weight:bold;">Time submitted:</span> {{ $comment->created_at }}</p>
		
		<p><span style="font-weight:bold;">Comment:</span> {{ $comment->content }}</p>

		<form class="delete-form" method="post" action="{{ url('admin/comments/' . $comment->id) }}">
		@csrf
		@method('DELETE')
			<div>
				<input type="submit" value="Delete this comment" onclick="return ConfirmDelete();">
			</div>
			<p style="font-size:10pt;">User will be given one strike.</p>
		</form>
		
		<div>
			<a href="{{ url('admin/comments') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
	</div>
</div>

@endsection