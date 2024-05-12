<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ReadmoreController extends Controller
{
    public function index(Post $post)
    {
        $post = Post::where('slug', $post->slug)->first();
        return view('frontend.readmore.index', compact('post'));
    }
}
