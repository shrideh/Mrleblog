@extends('layouts.app')

@section('content')

<div class="container m-auto justify-center">
	<h1 class="text-4xl">Blog Posts</h1>

	<div class="mt-6">
		@foreach($posts as $post)

			<div class="flex flex-col">
				<a href="/posts/{{ $post->id }}" class="text-blue-500 text-2xl">
					{{ $post->title }}
				</a>
				<span class="text-xs font-medium text-gray-600 mt-1">
					Posted by: 
					<a href="{{ route('userProfile.show', $post->user->id) }}" class="text-blue-800 font-semibold hover:underline">
						{{ $post->user->name }}
					</a>
				</span>			
			</div>

			<p class="mt-3 text-lg mb-3 text-gray-800">
				{{ Str::limit($post->body, 350) }}
			</p>
		@endforeach
	</div>
</div>

@endsection