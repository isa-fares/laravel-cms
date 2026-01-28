<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;

class PostRepository
{
    /**
     * Get all posts ordered by latest
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Post::latest()->get();
    }

    /**
     * Get all users
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
    public function create(array $data)
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
    public function update(Post $post, array $data)
    {
        return $post->update($data);
    }

    /**
     * Delete a post
     *
     * @param Post $post
     * @return bool|null
     */
    public function delete(Post $post)
    {
        return $post->delete();
    }
}
