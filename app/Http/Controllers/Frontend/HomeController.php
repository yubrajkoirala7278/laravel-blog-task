<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Service\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $postService;
    public function __construct() {
        $this->postService = new PostService();
    }
    public function index(Request $request)
    {        
        try {
            $query = Post::query()->with(['category'])->where('is_news', 0)->latest();
            if ($request->ajax()) {
                $blogs = $query->where('title', 'LIKE', '%' . $request->search . '%')
                               ->get();
                return response()->json(['blogs' => $blogs]);
            } else {
                $blogs = $query->paginate(10);
                $categories = Category::latest()->withCount('posts')->get();
                return view('frontend.home.index', compact('blogs','categories'));
            }
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
    public function news()
    {        
        try {
            $posts=$this->postService->fetchPost(1);
            return view('frontend.news.index', compact('posts'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
        
    }
}
