@extends('layouts.admin-layout')

@section('content')
<h1>List of Publishers</h1>

<a href="{{ url('admin/publishers/create') }}" style="color:#00008b;font-size:15pt;">Add New Publisher</a>

<ul>
	@foreach($publishers as $publisher)
		<li><a href="{{ url('admin/publishers/' . $publisher->id) }}" style="color:#00008b;">{{ $publisher->title }}</a></li>
	@endforeach
</ul>
@endsection