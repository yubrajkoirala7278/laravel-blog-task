<?php

namespace App\Service;

use App\Models\Category;

class CategoryService
{

    public function addService($request)
    {
        Category::create($request);
    }

    public function fetchCategory()
    {
        $categories = Category::latest();
        return $categories;
    }

    public function delete($category)
    {
        $category->delete();
    }
    public function fetchSingleCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return $category;
    }
    public function updateCategory($request, $category)
    {
        $category->update($request);
    }
}
