<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Service\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $categories = $this->categoryService->getCategoryByAjax();

        if (request()->wantsJson()) {
            return response()->json($categories, Response::HTTP_OK);
        }
        return view('categorybyajax.list')
        ->with('categories', json_encode($categories));
    }
 

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(CategoryRequest $request)
    {
        
        $category = $this->categoryService->storeCategory($request);
        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return response()->json($category, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = $this->categoryService->updateCategory($request, $id);
        return response()->json($category, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $category = $this->categoryService->deleteCategory($request, $id);
        return response()->json($category, Response::HTTP_OK);
    }
}
