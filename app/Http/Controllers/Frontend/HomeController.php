<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['category'])->paginate(10);
        $categories = Category::latest()->withCount('posts')->get();
        return view('frontend.home.index', compact('posts',  'categories'));
    }
}
