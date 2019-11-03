@extends('layouts.admin-layout')

@section('content')
<h1>List of Consoles</h1>

<a href="{{ url('admin/consoles/create') }}" style="color:#00008b;font-size:15pt;">Add New Console</a>

<ul>
	@foreach($consoles as $console)
		<li><a href="{{ url('admin/consoles/' . $console->id) }}" style="color:#00008b;">{{ $console->title }}</a></li>
	@endforeach
</ul>
@endsection