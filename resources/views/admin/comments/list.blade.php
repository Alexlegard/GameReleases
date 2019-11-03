@extends('layouts.admin-layout')

@section('content')
<h1>List of Comments</h1>

<ul>
	@foreach($comments as $comment)
		<li>
			<a href="{{ url('admin/comments/' . $comment->id) }}" style="color:#00008b;">
				{{ $comment->game->title }}: "{{ str_limit($comment->content, $limit = 30, $end = '...') }}"
			</a>
		</li>
	@endforeach
</ul>
@endsection