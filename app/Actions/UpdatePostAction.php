<?php

namespace App\Actions;

use App\Models\Post;
use App\Repositories\PostRepository;

class UpdatePostAction
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
     * @param array $data
     * @return bool
     */
    public function execute(Post $post, array $data)
    {
        return $this->postRepository->update($post, $data);
    }
}
