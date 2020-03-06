@extends('layouts.app')

@section('content')

<div class="container m-auto justify-center">
	<div class="mb-3">
		<h1 class="text-4xl text-gray-800">
			{{ $user->name }}
		</h1>
		<span class="mt-4 text-gray-600 text-sm">
			{{ $user->created_at->diffForHumans() }}
		</span>		
	</div>

	<hr>

	<div class="mt-4">
		<h1 class="text-2xl font-semibold text-gray-800">Latest Posts</h1>
		@if(count($latestPosts))
			@foreach($latestPosts as $post)
				<div class="bg-gray-100 rounded p-3 mt-3">
					<h1 class="text-lg text-blue-500 font-semibold mb-3">
						<a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
					</h1>
					<p>
						{{ $post->body }}
					</p>
				</div>
			@endforeach
		@endif
	</div>

</div>

@endsection