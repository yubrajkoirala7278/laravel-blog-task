<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index(Category $category){
        $posts = Post::with('category')->where('category_slug', $category->slug)->latest()->paginate(2);
        return view('frontend.category.index',compact('posts','category'));
    }
}
