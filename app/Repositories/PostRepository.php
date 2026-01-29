<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Repositories\Base\BaseRepository;

class PostRepository extends BaseRepository
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all users (specific to Post)
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsers()
    {
        return User::all();
    }
}
