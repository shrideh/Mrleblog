<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {
    	Comment::create([
    		'comment' => request()->comment,
    		'post_id' => $id,
    		'user_id' => auth()->user()->id
    	]);

    	return redirect()->back();
    }  
}
