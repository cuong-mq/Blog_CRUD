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

    public function index()
    {
        $categories = $this->categoryService->getCategoryByAjax();
        if (request()->wantsJson()) {
            return response()->json($categories, Response::HTTP_OK);
        }
        return view('categorybyajax.list')->with('categories');
    }
 
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->storeCategory($request);
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return response()->json($category, Response::HTTP_OK);
    }

    public function update(CategoryRequest $request, string $id)
    {
        $category = $this->categoryService->updateCategory($request, $id);
        return response()->json($category, Response::HTTP_CREATED);
    }


    public function destroy(Request $request, string $id)
    {
        $category = $this->categoryService->deleteCategory($request, $id);
        return response()->json($category, Response::HTTP_OK);
    }
}
