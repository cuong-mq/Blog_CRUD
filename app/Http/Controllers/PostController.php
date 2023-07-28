<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show()
    {
        $categories = Category::all();

        return view('post.show', ['categories' => $categories]);
    }

    public function index()
    {
        $categoryId = request()->query('category_id');
        $posts = Post::where('category_id', $categoryId)->get();
        return view('post.list', ['posts' => $posts, 'categoryId' => $categoryId]);
    }

    public function create(Request $request, $categoryId)
    {
        return view('post.add', ['categoryId' => $categoryId]);
    }

    public function store(Request $request, $categoryId)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->category_id = $request->categoryId;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.index', ['category_id' => $categoryId]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();
        $categoryId = $request->category_id;
        return redirect()->route('post.index', ['category_id' => $categoryId]);
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        $categoryId = $request->category_id;
        $post->delete();
        return redirect()->back();
    }
}
