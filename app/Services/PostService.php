<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Services\Base\BaseService;

class PostService extends BaseService
{
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct($postRepository);
    }

    /**
     * Get all users for dropdown (specific to Post)
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return $this->repository->getUsers();
    }
}
