<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getCategory(5);
        return view('category.list', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->storeCategory($request);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {

        $category = $this->categoryService->getCategoryById($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryService->updateCategory($request, $id);
        return redirect()->route('category.index');
    }

    public function delete(Request $request, $id)
    {
        $category = $this->categoryService->deleteCategory($request, $id);
        return redirect()->back();
    }
}
