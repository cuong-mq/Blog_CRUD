<?php

namespace App\Service;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function getCategory()
    {
        return Category::all();
    }
    public function storeCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->content = $request->content;
        $category->save();
        return $category;
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->content = $request->content;
        $category->save();
        return $category;
    }
    public function deleteCategory(Request $request, $id){
        $category = Category::find($id);
        $category->posts()->delete();
        $category->delete();
        return $category;
    }
    
}
