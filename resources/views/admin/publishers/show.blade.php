@extends('layouts.admin-layout')

@section('content')

<h1>{{ $publisher->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div id="description">
			{{ $publisher->description }}
		</div>
		<div>
			<a href="{{ url('admin/publishers') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/publishers/' . $publisher->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this Publisher</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/publishers/' . $publisher->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this publisher">
		</form>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/publisher_logos/'. $publisher->logo) }}" alt="Default company logo" width="300" height="300">
	</div>
</div>

@endsection