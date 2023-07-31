<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->input('category_id');
        $query = Post::query();
        if ($category_id) {
            $query->where('category_id', $category_id);
            $posts = $query->get();
        } else {
            $posts = Post::all();
        };
        return view('post.show', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.add', ['categories' => $categories,]);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();
        $categoryId = $request->category_id;
        return redirect()->route('post.index', ['category_id' => $categoryId,]);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('post.edit', ['post' => $post, 'categories' => $categories,]);
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

        return redirect()->route('post.index',);
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
