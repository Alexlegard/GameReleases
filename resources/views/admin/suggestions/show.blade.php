@extends('layouts.admin-layout')

@section('content')

<h1>{{ $suggestion->title }}</h1>

<div class="row">
	<div class="col-sm-12">
		<div>
			<a href="{{ url('admin/suggestions') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/suggestions/' . $suggestion->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this suggestion">
		</form>
		
		<p>Title: {{ $suggestion->title }}</p>
		<p>Release date: {{ $suggestion->releasedate }}</p>
		<p>Developer: {{ $suggestion->developer }}</p>
		<p>Publisher: {{ $suggestion->publisher }}</p>
	</div>
	
</div>

@endsection