@extends('layouts.admin-layout')

@section('content')

<h1>{{ $developer->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div id="description">
			{{ $developer->description }}
		</div>
		<div>
			<a href="{{ url('admin/developers') }}" style="color:#00008b;font-size:15pt;">Back to List</a>
		</div>
		<div>
			<a href="{{ url('admin/developers/' . $developer->id . '/edit') }}" style="color:#00008b;font-size:15pt;">Edit this developer</a>
		</div>

		<form class="delete-form" method="post" action="{{ url('admin/developers/' . $developer->id) }}">
		@csrf
		@method('DELETE')

			<input type="submit" value="Delete this developer">
		</form>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/developer_logos/'. $developer->logo) }}" alt="Default company logo" width="300" height="300">
	</div>
</div>

@endsection