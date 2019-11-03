@extends('layouts.admin-layout')

@section('content')

<h1>{{ $message->name }} {{ $message->created_at }}</h1>

<div class="row">
	<div class="col-sm-12">
		<div>
			<a href="{{ url('admin/messages') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/messages/' . $message->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this message">
		</form>
		
		<p><span style="font-weight:bold">Email address:</span> {{ $message->email }}</p>
		
		<p><span style="font-weight:bold">Message:</span> {{ $message->message }}</p>
	</div>
	
</div>

@endsection