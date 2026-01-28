<?php

namespace App\Actions;

use App\Models\Post;
use App\Repositories\PostRepository;

class DeletePostAction
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Execute the action
     *
     * @param Post $post
     * @return bool|null
     */
    public function execute(Post $post)
    {
        return $this->postRepository->delete($post);
    }
}
