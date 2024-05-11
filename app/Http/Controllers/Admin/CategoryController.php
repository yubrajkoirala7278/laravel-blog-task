<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Service\CategoryService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $categories = $this->categoryService->fetchCategory();
                return DataTables::of($categories)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return '<a href="javascript:void(0)" class="btn btn-info editButton" data-slug="' . $row->slug . '">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger delButton" data-slug="' . $row->slug . '">Delete</a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.category.index');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $this->categoryService->addService($request->validated());
            return response()->json([
                'success' => 'Category added successfully'
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
            // return response()->json(['error' =>'Something went wrong'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        try {
            $category = $this->categoryService->fetchSingleCategory($slug);
            if (!$category) {
                abort(404);
            }
            return $category;
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        try {
            $category = Category::where('slug', $request->category_slug)->first();
            if (!$category) {
                abort(404);
            }
            $this->categoryService->updateCategory($request->except('_method', 'category_slug'), $category);
            return response()->json([
                'success' => 'Category Updated Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        try {
            $category = Category::where('slug', $slug)->first();
            if (!$category) {
                abort(404);
            }
            $this->categoryService->delete($category);
            return response()->json([
                'success' => 'Category Deleted Successfully'
            ], 201);
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
