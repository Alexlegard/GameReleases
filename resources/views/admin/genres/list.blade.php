@extends('layouts.admin-layout')

@section('content')
	<h1>List of Genres</h1>

	<a href="{{ url('admin/genres/create') }}" style="color:#00008b;font-size:15pt;">Add New Genre</a>
	
	@if(!empty($genres[0]))
	<ul>
		@foreach($genres as $genre)
			<li><a href="{{ url('admin/genres/' . $genre->id) }}" style="color:#00008b;">{{ $genre->title }}</a></li>
		@endforeach
	</ul>
	@else
	<p>We didn't find any genres!</p>
	@endif
@endsection