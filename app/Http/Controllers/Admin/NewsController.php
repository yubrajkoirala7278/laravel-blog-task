<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index');
    }
    public function create(){
        $categories = Category::all();
        return view('admin.news.create',compact('categories'));
    }
    public function store(PostRequest $request){
        $request->merge([ 'user_id' => auth()->id(),'is_news'=>true]);
    }

    public function show(Post $post){

    }

    public function edit(Post $post){

    }
    public function update(PostRequest $request, Post $post){

    }
    public function destroy(Post $post){

    }


}
