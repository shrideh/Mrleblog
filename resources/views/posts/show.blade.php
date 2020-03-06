@extends('layouts.app')

@section('content')

<div class="container m-auto justify-center">
	<div class="mt-6">
		<h1 class="text-3xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h1>
		<span class="text-xs text-gray-700 mr-3">Published at: {{ $post->created_at->diffForHumans() }}</span>
		<span class="text-xs text-gray-700">
		by: 
		<a href="{{ route('userProfile.show', $post->user->id) }}" class="text-blue-800 font-semibold hover:underline">
			{{ $post->user->name }}
		</a>
		</span>
		
		@if(auth()->check() && $post->user_id == auth()->user()->id)
			<div class="mt-4">
				<div class="flex flex-row">
					<a href="{{ route('post.edit', $post->id) }}" class="p-2  bg-blue-600 text-sm text-white font-semibold rounded">Edit</a>

					<form method="post" action="{{ route('post.destroy', $post->id) }}">
						@csrf
						@method('delete')
						<button type="submit" class="p-2 ml-3 bg-red-600 text-sm text-white font-semibold rounded">
							Delete
						</button>
					</form>					
				</div>
			</div>
		@endif

		<p class="mt-5 text-2xl">
			{{ $post->body }}
		</p>


		<p class="mt-4">
			<a href="/posts" class="text-sm text-blue-700">Go Back</a>
		</p>

	{{-- Comments section --}}


			@if(count($post->comments))
				@foreach($post->comments as $comment)
			<div class="mt-6 mb-4 bg-gray-100 p-3 rounded">
					<h1 class="text-blue-400 text-lg">
						<div class="mb-3">
						<a href="{{ route('userProfile.show', $comment->user->id) }}">
							{{ $comment->user->name }}
						</a>
						<span class="text-xs text-gray-600">
							{{$comment->created_at->diffForHumans()}}
						</span>	
						</div>

					</h1>
					<p>{{ $comment->comment }}</p>
					</div>
				@endforeach
			@endif


		@if(auth()->check())
	

		<div class="mt-4 mb-10">
			<h1 class="text-xl font-semibold text-gray-800">Comments</h1>

			<div class="mt-6">
				<form action="{{ route('comments.store', $post->id) }}" method="POST">
					@csrf
					<div>
					<textarea name="comment" placeholder="Leave a comment" rows="4" cols="50" class="focus:outline-none border border-gray-100 p-2"></textarea>
					<div>
						<button type="submit" class="bg-blue-500 text-white font-medium mt-3 p-2">Submit</button>
					</div>					
					</div>
				</form>
			</div>
		</div>
	@endif

	</div>
</div>

@endsection






















