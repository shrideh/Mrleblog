<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	$latestPosts = $user->posts()->latest()->get();
    	return view('profile.show', compact('user', 'latestPosts'));
    }
}
