<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Create new post.
     */
    public function add($data)
    {
        $post = new Post();
        $post->title = $data->title;
        $post->content = $data->content;
        $post->user_id = auth()->user()->id;
        $post->save();

        $post->categories()->attach($data->category);

        return $post;
    }
}
