<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\PostService;
use App\Http\Requests\CreatePost;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display form with categories to add new post
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('posts.add_post', compact('categories'));
    }

    /**
     * Create a new post.
     */
    public function store(CreatePost $request)
    {
        if ($request->validated()) {
            $result = $this->postService->add($request);
            return redirect('/posts/create');
        }
    }
}
