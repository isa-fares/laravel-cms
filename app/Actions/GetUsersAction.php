<?php

namespace App\Actions;

use App\Repositories\PostRepository;

class GetUsersAction
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Execute the action
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function execute()
    {
        return $this->postRepository->getUsers();
    }
}
