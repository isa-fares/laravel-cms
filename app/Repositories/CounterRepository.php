<?php

namespace App\Repositories;

use App\Models\Counter;
use App\Repositories\Base\BaseRepository;

class CounterRepository extends BaseRepository
{
    public function __construct(Counter $model)
    {
        parent::__construct($model);
    }

    // Example custom method
    public function incrementByKey(string $key, int $delta = 1)
    {
        $counter = $this->model->firstOrCreate(['key' => $key], ['value' => 0]);
        $counter->increment('value', $delta);
        return $counter;
    }
}

