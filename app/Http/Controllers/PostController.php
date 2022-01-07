<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display form with categories to add new post
     */
    public function create()
    {
        $categories = Category::get('name');
        return view('posts.add_post', compact('categories'));
    }
}
