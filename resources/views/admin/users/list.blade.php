@extends('layouts.admin-layout')

@section('content')
<h1>List of Users</h1>

<ul>
	@foreach($users as $user)
		<li>
			<a href="{{ url('admin/users/' . $user->id) }}" style="color:#00008b;">{{ $user->username }}</a>
		</li>
	@endforeach
</ul>
@endsection