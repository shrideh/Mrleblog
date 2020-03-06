<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}  

    public function index()
    {
    	$posts = Post::latest()->get();

    	return view('posts.index', compact('posts'));
    }

	public function create()
	{
		return view('posts.create');
	}  

	public function edit($id)
	{
		$post = Post::findOrFail($id);
		return view('posts.edit', compact('post'));
	}    

	public function store()
	{

		request()->validate([
			'title' => 'required',
			'body' => 'required'
		]);

		\Session::flash('flash_message', 'Your post has been published!');

		Post::create([
			'title' => request()->title,
			'body' => request()->body,
			'user_id' => auth()->user()->id,
		]);

		return redirect('/posts');
	}


	public function update($id)
	{
		request()->validate([
			'title' => 'required',
			'body' => 'required'
		]);


		Post::where('id', $id)
		->update(request()->except(['_token']));
		
		\Session::flash('flash_message', 'Your post has been published!');

		return redirect()->route('post.show', $id);
	}  


	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	public function destroy($id)
	{
		Post::where('id', $id)
		->delete();

		return redirect()->route('post.index');
	}
	
}













