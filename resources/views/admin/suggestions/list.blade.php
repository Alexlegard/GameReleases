@extends('layouts.admin-layout')

@section('content')
	<h1>List of Suggestions</h1>
	
	<ul>
		@foreach($suggestions as $suggestion)
			<li><a href="{{ url('admin/suggestions/' . $suggestion->id) }}" style="color:#00008b;">{{ $suggestion->title }}</a></li>
		@endforeach
	</ul>
@endsection