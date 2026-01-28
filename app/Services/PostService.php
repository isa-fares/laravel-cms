<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Get all posts ordered by latest
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllPosts()
    {
        return $this->postRepository->getAll();
    }

    /**
     * Get all users for dropdown
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return $this->postRepository->getUsers();
    }

    /**
     * Create a new post
     *
     * @param array $data
     * @return Post
     */
    public function createPost(array $data)
    {
        return $this->postRepository->create($data);
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
        return $this->postRepository->update($post, $data);
    }

    /**
     * Delete a post
     *
     * @param Post $post
     * @return bool|null
     */
    public function deletePost(Post $post)
    {
        return $this->postRepository->delete($post);
    }
}
