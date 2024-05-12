<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Service\PostService;

class HomeController extends Controller
{
    private $postService;
    public function __construct() {
        $this->postService = new PostService();
    }
    public function index()
    {
        try {
            $posts = $this->postService->fetchPost(0);
            $news=$this->postService->fetchPost(1);
            $categories = Category::latest()->withCount('posts')->get();
            return view('frontend.home.index', compact('posts', 'news', 'categories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function show(Post $post){
        try {
            $post = $this->postService->view($post);
            return view('frontend.home.view', compact('post'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
