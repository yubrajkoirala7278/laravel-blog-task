<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $postCount=Post::count();
        $categoryCount=Category::count();
        $userCount=User::count();
        return view('admin.dashboard.index',compact('postCount','categoryCount','userCount'));
    }
}
