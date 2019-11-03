@extends('layouts.admin-layout')

@section('content')
	<h1>List of Developers</h1>

	<a href="{{ url('admin/developers/create') }}" style="color:#00008b;font-size:15pt;">Add New Developer</a>

	@if(!empty($developers[0]))
	<ul>
		@foreach($developers as $developer)
			<li><a href="{{ url('admin/developers/' . $developer->id) }}" style="color:#00008b;">{{ $developer->title }}</a></li>
		@endforeach
	</ul>
	@else
	</p>We didn't find any developers!</p>
	@endif
@endsection