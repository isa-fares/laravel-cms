<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\Base\BaseRepository;

class SliderRepository extends BaseRepository
{
    public function __construct(Slider $model)
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
