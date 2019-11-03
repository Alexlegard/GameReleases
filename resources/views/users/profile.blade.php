@extends('layouts.profile-layout') <!-- Shorthand for layouts/app.blade.php -->

@section('content')
<div class="container">
    <div class="row">
		<div class="col-3">
			<img src="{{ asset('storage/profile_images/'. $user->profile->image)}}"></img>
		</div>
		
		<div class="col-9">
		
			<div class="row">
				<div class="col-6" id="name">
					<h1>{{ $user->name }}</h1>
				</div>
				<div class="col-6">
					@can('update', $user->profile)
						<a href="/profile/{{$user->id}}/edit">Edit Profile</a>
					@endcan
				</div>
			</div>
			
			<div class="pb-3" id="username">
				<strong>Username: {{ $user->username }}</strong>
			</div>
			
			<div class="pb-3" id="url">
				<div><a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a></div>
			</div>
			
			<div id="description">
				<p>{{$user->profile->description}}</p>
			</div>
		</div>
	</div>
</div>
@endsection
