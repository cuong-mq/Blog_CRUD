<?php

namespace App\Service;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use function PHPUnit\Framework\returnSelf;

class PostService
{
    protected $request;
    protected $post;

    public function __construct(Request $request, Post $post)
    {
        $this->request = $request;
        $this->post = $post;
    }

    public function getPost($category_id = null)
    {
        $query = Post::query();
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
        return $query->paginate(5);
    }

    public function getCategory()
    {
        return Category::all();
    }
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();
        return $post;
    }

    public function updatePost(Request $request, $id)
    {

        $post = Post::find($id);
        $post->name = $request->name;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->save();

        return $post;
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return $post;
    }
}
