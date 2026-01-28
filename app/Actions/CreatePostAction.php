<?php

namespace App\Actions;

use App\Repositories\PostRepository;

class CreatePostAction
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Execute the action
     *
     * @param array $data
     * @return \App\Models\Post
     */
    public function execute(array $data)
    {
        return $this->postRepository->create($data);
    }
}
