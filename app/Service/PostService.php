<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService
{
    private $imageService;
    public function __construct()
    {
        $this->imageService = new ImageService();
    }

    // ===========POST(Add)=================
    public function addService($request)
    {
        DB::transaction(function () use ($request) {   //->roll back if not inserted in relationship table
            // adding data in parent table
            $post = Post::create([
                'user_id' => auth()->id(),
                'category_id' => $request['category'],
                'title' => $request['title'],
                'slug'=>$request['slug'],
                'description' => $request['description'],
                'status' => $request['status'],
            ]);
            // if image exist
            if (isset($request['image'])) {
                $this->imageService->saveImage($post, $request['image'], 'post');
            }
        });
    }
    // =====================================

    // ==============GET All==================
    public function fetchPost()
    {
        $posts = Post::latest()->with(['category', 'image'])->paginate(10);
        return $posts;
    }
    // =======================================

    // =========fetch single post===========
    public function view($post)
    {
        $post = Post::where('slug', $post->slug)->with('image')->first();
        return $post;
    }
    // =====================================

    // ===========UPDATE POST==============
    public function updateService($request, $post)
    {
        // update image
        if (!empty($request['filename'])) {
            $this->imageService->updateImage($post, $request['filename'], 'post', true);
        }
        // updating data in parent table
        $post->update([
            'user_id' => auth()->id(),
            'category_id' => $request['category'],
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
        ]);
    }
    // ====================================

    // =============DELETE=================
    public function deletePost($post)
    {
        if (!empty($post['image'])) {
            $this->imageService->deleteImage($post['image']);
        }
        $post->delete();
    }
    // ====================================
}
