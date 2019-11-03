@extends('layouts.master')

@section('scripts')

@endsection

@section('content')
<div class="container">

	@if( !isset($genres[0]->game[0]) )
		<p class="no-games-msg">Oops! We didn't find any games!</p>
	@endif
	
	@foreach($genres as $genre)
		<div class="row">
			<h2 class="genre_header">{{ $genre->title }} Games:</h2>
		</div>
		
		<div id="carousel" class="carousel slide" data-interval="false" data-ride="carousel">
			<div class="carousel-inner">
		
			@foreach($genre->game->chunk(4) as $chunk)
				@if($loop->first)
				<div class="carousel-item active">
				@else
				<div class="carousel-item">
				@endif
					<div class="row">
						@foreach($chunk as $item)
						<div class="col-3">
							<a href="{{ url('games/' . $item->id) }}">
								<img src="{{ asset('storage/game_boxart/'. $item->boxart) }}" alt="$item->title" width="250" height="250">
							</a>
						</div>
						@endforeach
					</div>
				</div>
				
				<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			@endforeach
		
			</div>
		</div>
	@endforeach
</div>
	
@endsection