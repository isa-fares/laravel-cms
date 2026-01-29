<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Base\BaseRepository;

class ServiceRepository extends BaseRepository
{
    public function __construct(Service $model)
    {
        parent::__construct($model);
    }

    /**
     * Override getAll to order by 'order' field
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model->orderBy('order')->get();
    }
}
