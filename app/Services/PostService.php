<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class PostService
{
    /**
     * Get all posts ordered by latest
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts()
    {
        return Post::latest()->get();
    }

    /**
     * Get all users for dropdown
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return User::all();
    }

    /**
     * Create a new post
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    /**
     * Update an existing post
     *
     * @param Post $post
     * @param array $data
     * @return bool
     */
    public function updatePost(Post $post, array $data)
    {
        return $post->update($data);
    }

    /**
     * Delete a post
     *
     * @param Post $post
     * @return bool|null
     */
    public function deletePost(Post $post)
    {
        return $post->delete();
    }
}
