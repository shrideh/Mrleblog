@extends('layouts.app')

@section('content')

<div class="container m-auto justify-center bg-white rounded-lg p-5">
	<h1 class="text-3xl mb-3">Create new Post</h1>
	<form method="POST" action="{{ route('post.update', $post->id) }}">
		@csrf
		<div class="w-2/4">
			<div class="md:w-1/2 mb-6 md:mb-0 mb-5">
		      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
		        Post Title
		      </label>
		      <input class="@error('title') border border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Post title" name="title" value="{{ $post->title }}">

		      @error('title')
		      <p class="text-xs text-red-500 italic">{{ $message }}</p>
		      @enderror

		    </div>

		    <div class="mt-4 mb-6">
			    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
			        Post Body
			     </label>
			      <textarea class="@error('body') border border-red-500  @enderror appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Post Contnet is here .." id="grid-first-name" type="text"name="body">{{ $post->body }}</textarea>

			 @error('body')
		      <p class="text-xs text-red-500 italic">{{ $message }}</p>
		      @enderror
		    </div>

		    <div>
		    	<button type="submit" class="bg-blue-400 text-white py-2 px-3">Update</button>
		    </div>
		</div>
	
	</form>
</div>

@endsection