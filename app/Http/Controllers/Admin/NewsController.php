<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Service\PostService;

class NewsController extends Controller
{
    private $postService;
    public function __construct()
    {
        $this->postService = new PostService();
    }


    public function index()
    {
        try {
            $posts = $this->postService->fetchPost(1);
            return view('admin.news.index', compact('posts'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function create()
    {
        try {
            $categories = Category::all();
            return view('admin.news.create', compact('categories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function store(PostRequest $request)
    {
        try {
            $request->merge(['user_id' => auth()->id(), 'is_news' => true]);
            $this->postService->addService($request->except('_token'));
            return redirect()->route('news.index')->with('success', 'News added successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show(Post $post)
    {
        try {
            $post = $this->postService->view($post);
            return view('admin.news.show', compact('post'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit(Post $post)
    {
        try {
            $categories = Category::all();
            $post = $this->postService->view($post);
            return view('admin.news.edit', compact('post', 'categories'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function update(PostRequest $request, Post $post)
    {
        try {
            $request->merge(['user_id' => auth()->id(), 'is_news' => true]);
            $this->postService->updateService($request->except('_token', '_method'), $post);
            return redirect()->route('news.index')->with('success', 'News updated successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
    public function destroy(Post $post)
    {
        try {
            $this->postService->deletePost($post);
            return back()->with('success', 'News deleted successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
