<?php

namespace App\Services;

use App\Repositories\CounterRepository;
use App\Services\Base\BaseService;

class CounterService extends BaseService
{
    public function __construct(CounterRepository $counterRepository)
    {
        parent::__construct($counterRepository);
    }

    // Business logic example: increment
    public function increment(string $key, int $delta = 1)
    {
        return $this->repository->incrementByKey($key, $delta);
    }
}

