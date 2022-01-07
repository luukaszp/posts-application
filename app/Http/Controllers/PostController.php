<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
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

    /**
     * Display post by id
     */
    public function showPost($id)
    {
        $post = Post::with('categories')->where('id', $id)->first();
        $categories = Category::select('id', 'name')->get();
        return view('posts/edit_post', compact('post', 'categories'));
    }

    /**
     * Show all posts as JSON Response.
     */
    public function get()
    {
        $posts = Post::with('categories')->get();
        return response()->json([$posts]);
    }

    /**
     * Edit specific post
     */
    public function edit(Request $request, $id)
    {
        $post = Post::with('categories')->find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $post->categories()->sync($request->category);

        return redirect('/api/posts');
    }
}
