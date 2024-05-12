<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{

    // ===========POST(Add)=================
    public function addService($request)
    {
        $request['category_id'] = $request['category'];
        unset($request['category']);
        // store single image in local storage folder
        if (isset($request['image'])) {
            $timestamp = now()->timestamp;
            $originalName = $request['image']->getClientOriginalName();
            $imageName = $timestamp . '-' . $originalName;
            $request['image']->storeAs('public/images/post', $imageName);

            // update the image name in the $request array
            $request['image'] = $imageName;
        };

        // store in database table
        Post::create($request);
    }
    // =====================================

    // ==============GET All==================
    public function fetchPost($is_news)
    {
        $posts = Post::latest()->with(['category'])->where('is_news', $is_news)->paginate(10);
        return $posts;
    }
    // =======================================

    // =========fetch single post===========
    public function view($post)
    {
        $post = Post::where('slug', $post->slug)->first();
        return $post;
    }
    // =====================================

    // ===========UPDATE POST==============
    public function updateService($request, $post)
    {
        $request['category_id'] = $request['category'];
        unset($request['category']);

        if(isset($request['image'])){
            // Delete the old image from storage folder
            Storage::delete('public/images/post/'.$post->image);
            // Store the new image
            $timestamp = now()->timestamp;
            $originalName = $request['image']->getClientOriginalName();
            $imageName = $timestamp . '-' . $originalName;
            $request['image']->storeAs('public/images/post', $imageName);
            // Update the image name in the $request array
            $request['image'] = $imageName;
        }
        $post->update($request);
    
    }
    
    // ====================================

    // =============DELETE=================
    public function deletePost($post)
    {
        // delete image from local storage
        if(isset($post->image)){
            Storage::delete('public/images/post/'.$post->image);
        }
        $post->delete();
    }
    // ====================================
}
