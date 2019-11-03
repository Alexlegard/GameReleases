@extends('layouts.admin-layout')

@section('content')
<h1>List of Genres</h1>

<a href="{{ url('admin/genres/create') }}" style="color:#00008b;font-size:15pt;">Add New Genre</a>

<ul>
	@foreach($genres as $genre)
		<li><a href="{{ url('admin/genres/' . $genre->id) }}" style="color:#00008b;">{{ $genre->title }}</a></li>
	@endforeach
</ul>
@endsection