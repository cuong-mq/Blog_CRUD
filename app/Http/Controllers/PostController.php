<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\PostService;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index(Request $request)
    {
        $categories = $this->postService->getCategory();
        $category_id = $request->input('category_id');
        $posts = $this->postService->getPost();
        return view('post.show', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = $this->postService->getCategory();
        return view('post.add', ['categories' => $categories,]);
    }

    public function store(Request $request)
    {
        $post = $this->postService->store($request);
        $categoryId = $request->category_id;
        return redirect()->route('post.index', ['category_id' => $categoryId,]);
    }

    public function edit($id)
    {
        $categories = $this->postService->getCategory();
        $post = Post::find($id);
        return view('post.edit', ['post' => $post, 'categories' => $categories,]);
    }

    public function update(Request $request, $id)
    {
        $post = $this->postService->updatePost($request, $id);
        return redirect()->route('post.index',);
    }

    public function delete($id)
    {
        $post = $this->postService->deletePost($id);
        return redirect()->back();
    }
}
