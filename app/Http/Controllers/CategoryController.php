<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  DB::table('categories')->get();
        return view('category.list', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->content = $request->content;
        $category->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->content = $request->content;
        $category->save();
        return redirect()->route('category.index');
    }

    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->posts()->delete();
        $category->delete();
        return redirect()->back();
    }
}
