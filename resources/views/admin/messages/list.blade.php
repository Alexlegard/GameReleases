@extends('layouts.admin-layout')

@section('content')
	<h1>List of Messages</h1>
	
	@if(!empty($messages[0]))
	<ul>
		@foreach($messages as $message)
			<li>
				<a href="{{ url('admin/messages/' . $message->id) }}" style="color:#00008b;">
					{{ $message->name }} {{ $message->created_at }}
				</a>
			</li>
		@endforeach
	</ul>
	@else
	<p>We didn't find any messages!</p>
	@endif
@endsection