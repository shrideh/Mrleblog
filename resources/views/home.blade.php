@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    Dashboard
                </div>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        @if(auth()->check())
                            <h1 class="mb-5 text-3xl">Welcome, {{ auth()->user()->name }}</h1>

                            <div class="flex flex-row">
                                <a href="/posts/create" class="mt-4 text-blue-700 mr-4">Create New Post</a>
                                <a href="/posts" class="mt-4 text-blue-700 ">Show All Posts</a>
                            </div>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection














