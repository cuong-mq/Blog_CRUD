<?php

namespace App\Http\Controllers\Api;

use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function listOption()
    {
        $categories = $this->postService->getCategory();
        if (request()->wantsJson()) {
            return response()->json($categories, Response::HTTP_OK);
        }
        return view('postbyajax.list')->with('categories');
    }

    public function index(Request $request)
    {
        $category_id = $request->input('category_id');
        $posts = $this->postService->getPostByAjax($category_id);
        return response()->json($posts, Response::HTTP_OK);
    }

    public function store(PostRequest $request)
    {
        $post = $this->postService->store($request);
        return response()->json($post, Response::HTTP_CREATED);
    }

    public function edit(string $id)
    {
        $post = $this->postService->getPostById($id);
        return response()->json($post, Response::HTTP_OK);
    }

    public function update(PostRequest $request, string $id)
    {
        $post = $this->postService->updatePost($request, $id);
        return response()->json($post, Response::HTTP_CREATED);
    }

    public function destroy(string $id)
    {
        $post = $this->postService->deletePost($id);
        return response()->json($post, Response::HTTP_NO_CONTENT);
    }
}
