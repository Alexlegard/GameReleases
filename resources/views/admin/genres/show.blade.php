@extends('layouts.admin-layout')

@section('content')

<h1>{{ $genre->title }}</h1>

<div>
	<a href="{{ url('admin/genres') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
</div>
<div>
	<a href="{{ url('admin/genres/' . $genre->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this Genre</a>
</div>

<form class="delete-form" method="post" action="{{ url('admin/genres/' . $genre->id) }}">
@csrf
@method('DELETE')

	<input type="submit" value="Delete this genre">
</form>

@endsection