@extends('layouts.master')

@section('content')

<h1>{{ $game->title }}</h1>

<div class="row">
	<div class="col-sm-6">
		<div class="top-card">
			<div class="game_details">
				<p>
					Developer:
					@foreach($game->developer as $d)
						{{ $d->title }}
					@endforeach
				</p>

				<p id="publisher">
					Publisher: {{ $publisher->title }}
				</p>

				<p id="genre">
					Genre:
					@foreach($game->genre as $g)
						{{ $g->title }}
					@endforeach
				</p>
				<p id="releasedate">
					Release date: {{ $game->release_date }}
				</p>
				<p id="consoles">
					Platforms:
					@foreach($game->console as $console)
						{{ $console->title }}
					@endforeach
				</p>
			</div>
		</div>
	
		<div class="description">
			{{ $game->description }}
		</div>
	</div>
	<div class="col-sm-6">
		<img src="{{ asset('storage/game_boxart/'. $game->boxart) }}" alt="Default box art" width="300" height="300">
	</div>
</div>

<h2>0 comments</h2>

	@auth <!-- User is signed in. -->
		<form class="comment-form" method="post" action="{{ url('games/' . auth()->user()->id . '/comment') }}" enctype="multipart/form-data">
		@csrf
		
			<div>
				<textarea name="comment" placeholder="Make a Comment..." cols="45"></textarea>
			</div>
			<div>
				<input type="submit" value="Post Comment">
			</div>
		</form>
	@else
		<h4 style="text-align:center;">Sign in or register to comment.</h4>
		<div class="signin-container">
			<a class="signin-prompt" href="{{ url('login') }}">Login</a>
		</div>
	@endauth
	
	<!-- Display comments -->
	@foreach($game->comment as $c)
		<div class="comment-card">
			<h5 class="comment-header">{{ $c->user->name }} - {{ $c->time_submitted }}</h5>
		
			<p class="comment-content">{{ $c->content }}</p>
		</div>
	@endforeach
@endsection